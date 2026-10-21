document.addEventListener('DOMContentLoaded', () => {
    // Perbarui jam dashboard mengikuti waktu Indonesia bagian barat.
    const adminClock = document.querySelector('[data-admin-clock]');
    const adminDate = document.querySelector('[data-admin-date]');
    if (adminClock && adminDate) {
        const updateAdminClock = () => {
            const now = new Date();
            adminClock.textContent = new Intl.DateTimeFormat('id-ID', {
                timeZone: 'Asia/Jakarta',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hourCycle: 'h23',
            }).format(now);
            adminDate.textContent = new Intl.DateTimeFormat('id-ID', {
                timeZone: 'Asia/Jakarta',
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric',
            }).format(now);
        };

        updateAdminClock();
        window.setInterval(updateAdminClock, 1000);
    }

    // Gunakan dialog yang tampil di halaman untuk konfirmasi penghapusan artikel.
    const deleteDialog = document.querySelector('[data-confirm-dialog]');
    if (deleteDialog) {
        let pendingDeleteForm = null;
        const message = deleteDialog.querySelector('[data-confirm-message]');

        document.querySelectorAll('[data-delete-form]').forEach((form) => {
            form.addEventListener('submit', (event) => {
                if (form.dataset.confirmed === 'true') {
                    delete form.dataset.confirmed;
                    return;
                }

                event.preventDefault();
                pendingDeleteForm = form;
                const title = form.dataset.articleTitle;
                message.textContent = title
                    ? `Artikel “${title}” akan dihapus dan tidak dapat dipulihkan.`
                    : 'Artikel yang dihapus tidak dapat dipulihkan.';
                deleteDialog.showModal();
            });
        });

        const clearPendingForm = () => {
            pendingDeleteForm = null;
        };

        deleteDialog.querySelector('[data-confirm-cancel]').addEventListener('click', () => {
            deleteDialog.close();
            clearPendingForm();
        });

        deleteDialog.addEventListener('cancel', clearPendingForm);
        deleteDialog.querySelector('[data-confirm-accept]').addEventListener('click', () => {
            if (!pendingDeleteForm) return;

            const form = pendingDeleteForm;
            clearPendingForm();
            form.dataset.confirmed = 'true';
            deleteDialog.close();
            form.requestSubmit();
        });
    }

    // Tampilkan nama berkas yang dipilih pengguna.
    document.querySelectorAll('[data-file-input]').forEach((input) => {
        const fileName = input.closest('.admin-upload')?.querySelector('[data-file-name]');

        input.addEventListener('change', () => {
            fileName.textContent = input.files?.[0]?.name || 'Belum ada file dipilih';
        });
    });

    document.querySelectorAll('[data-richtext-editor]').forEach((editor) => {
        const surface = editor.querySelector('[data-editor-surface]');
        const value = editor.querySelector('[data-editor-value]');
        let savedRange = null;

        // Simpan dan pulihkan seleksi agar toolbar tidak menghilangkan pilihan teks.
        const saveSelection = () => {
            const selection = window.getSelection();
            if (!selection?.rangeCount) return;

            const range = selection.getRangeAt(0);
            const isInside = (node) => node === surface || surface.contains(node);
            if (isInside(range.startContainer) && isInside(range.endContainer)) {
                savedRange = range.cloneRange();
            }
        };

        const restoreSelection = () => {
            surface.focus({ preventScroll: true });
            if (!savedRange) return;

            const selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(savedRange);
        };

        const applyNormalFormatting = () => {
            const selection = window.getSelection();
            const range = selection?.rangeCount ? selection.getRangeAt(0) : null;
            if (!range) return;

            const blockFor = (node) => {
                const element = node.nodeType === Node.TEXT_NODE ? node.parentElement : node;
                return element?.closest('p, h2, h3, li, div') || surface;
            };

            if (!range.collapsed && blockFor(range.startContainer) === blockFor(range.endContainer)) {
                const fragment = range.extractContents();
                const formattingNodes = fragment.querySelectorAll(
                    'b, strong, i, em, u, span, font, s, strike, mark, sub, sup'
                );
                formattingNodes.forEach((node) => {
                    const parent = node.parentNode;
                    while (node.firstChild) parent.insertBefore(node.firstChild, node);
                    parent.removeChild(node);
                });

                const first = fragment.firstChild;
                const last = fragment.lastChild;
                range.insertNode(fragment);
                if (first && last) {
                    range.setStartBefore(first);
                    range.setEndAfter(last);
                    selection.removeAllRanges();
                    selection.addRange(range);
                }
                return;
            }

            if (range.collapsed) {
                document.execCommand('formatBlock', false, 'P');
                document.execCommand('justifyLeft', false, null);
            }
            document.execCommand('removeFormat', false, null);
        };

        // Tampilkan gaya yang sedang aktif pada posisi kursor atau teks terpilih.
        const updateToolbarState = () => {
            const selection = window.getSelection();
            const anchor = selection?.anchorNode;
            const selectionInside = anchor && (anchor === surface || surface.contains(anchor));
            if (document.activeElement !== surface && !selectionInside) return;

            let block = anchor?.nodeType === Node.TEXT_NODE ? anchor.parentElement : anchor;
            if (!block || !surface.contains(block)) block = surface;
            else block = block.closest('p, h2, h3, div') || surface;

            const blockTag = ['H2', 'H3'].includes(block.tagName) ? block.tagName : 'P';
            if (format) {
                format.value = blockTag;
                format.classList.toggle('is-active', blockTag !== 'P');
            }

            const alignment = block === surface ? 'left' : getComputedStyle(block).textAlign;
            const isNormal = blockTag === 'P'
                && !document.queryCommandState('bold')
                && !document.queryCommandState('italic')
                && !document.queryCommandState('underline')
                && (!alignment || alignment === 'left' || alignment === 'start');
            editor.querySelectorAll('[data-command]').forEach((button) => {
                const command = button.dataset.command;
                let active = false;
                try {
                    if (command === 'normal') active = isNormal;
                    else if (command === 'justifyLeft') {
                        active = !alignment || alignment === 'left' || alignment === 'start';
                    }
                    else if (command === 'justifyCenter') active = alignment === 'center';
                    else if (command === 'justifyRight') active = alignment === 'right' || alignment === 'end';
                    else active = document.queryCommandState(command);
                } catch (_) {
                    active = false;
                }
                button.classList.toggle('is-active', active);
                button.setAttribute('aria-pressed', String(active));
            });
        };

        ['keyup', 'mouseup', 'input', 'focus'].forEach((eventName) => {
            surface.addEventListener(eventName, () => {
                saveSelection();
                updateToolbarState();
            });
        });
        document.addEventListener('selectionchange', updateToolbarState);

        // Jalankan tombol toolbar dan simpan hasil edit ke input form.
        editor.querySelectorAll('[data-command]').forEach((button) => {
            button.addEventListener('mousedown', (event) => {
                saveSelection();
                event.preventDefault();
            });
            button.addEventListener('click', () => {
                restoreSelection();
                if (button.dataset.command === 'normal') {
                    applyNormalFormatting();
                } else {
                    document.execCommand(button.dataset.command, false, null);
                }
                value.value = surface.innerHTML;
                saveSelection();
                updateToolbarState();
            });
        });

        const format = editor.querySelector('[data-editor-format]');
        format?.addEventListener('mousedown', saveSelection);
        format?.addEventListener('change', (event) => {
            restoreSelection();
            document.execCommand('formatBlock', false, event.target.value);
            value.value = surface.innerHTML;
            saveSelection();
            updateToolbarState();
        });

        surface.addEventListener('input', () => { value.value = surface.innerHTML; });
        surface.closest('form').addEventListener('submit', (event) => {
            value.value = surface.innerHTML;
            if (!surface.textContent.trim()) {
                event.preventDefault();
                surface.focus();
            }
        });
    });

    // Perlihatkan nilai heksadesimal di samping pemilih warna.
    document.querySelectorAll('.admin-color-input input[type="color"]').forEach((input) => {
        const code = input.parentElement.querySelector('code');
        input.addEventListener('input', () => { code.textContent = input.value.toUpperCase(); });
    });

    // Filter isian CMS berdasarkan nama labelnya.
    const search = document.querySelector('[data-field-search]');
    if (search) {
        const fields = [...document.querySelectorAll('[data-content-field]')];
        const count = document.querySelector('[data-field-count]');
        search.addEventListener('input', () => {
            const query = search.value.trim().toLocaleLowerCase();
            let visible = 0;

            fields.forEach((field) => {
                const matches = field.dataset.searchLabel.includes(query);
                field.hidden = !matches;
                if (matches) visible += 1;
            });

            document.querySelectorAll('[data-content-group]').forEach((group) => {
                group.hidden = !group.querySelector('[data-content-field]:not([hidden])');
            });
            if (count) count.textContent = `${visible} isian`;
        });
    }

    document.querySelectorAll('[data-group-link]').forEach((link) => {
        link.addEventListener('click', () => {
            const target = document.querySelector(link.getAttribute('href'));
            if (target?.hidden && search) {
                search.value = '';
                search.dispatchEvent(new Event('input'));
            }
        });
    });
});
// Buka dan tutup menu admin pada layar kecil.
const adminMenuToggle = document.querySelector('.admin-menu-toggle');
const adminShell = document.querySelector('.admin-shell');
const adminSidebar = document.querySelector('.admin-sidebar');

if (adminMenuToggle && adminShell && adminSidebar) {
    const setAdminMenuOpen = (isOpen) => {
        adminShell.classList.toggle('is-menu-open', isOpen);
        adminMenuToggle.setAttribute('aria-expanded', String(isOpen));
        adminMenuToggle.setAttribute('aria-label', isOpen ? 'Tutup menu admin' : 'Buka menu admin');
    };

    adminMenuToggle.addEventListener('click', () => {
        setAdminMenuOpen(!adminShell.classList.contains('is-menu-open'));
    });

    adminSidebar.addEventListener('click', (event) => {
        if (event.target.closest('a')) {
            setAdminMenuOpen(false);
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && adminShell.classList.contains('is-menu-open')) {
            setAdminMenuOpen(false);
            adminMenuToggle.focus();
        }
    });
}

