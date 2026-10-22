<?php

namespace App\Support;

use DOMDocument;
use DOMElement;
use DOMNode;

/** Cleans editor HTML before it is stored or displayed. */
class RichText
{
    private const ALLOWED_TAGS = ['p', 'h2', 'h3', 'br', 'strong', 'b', 'em', 'i', 'u', 'ul', 'ol', 'li', 'div'];

    public static function sanitize(string $html): string
    {
        // Skip parsing empty content and turn plain text into paragraphs.
        if (trim($html) === '') {
            return '';
        }

        if ($html === strip_tags($html)) {
            $paragraphs = preg_split('/(?:\r\n?|\n){2,}/', trim($html)) ?: [];

            return implode('', array_map(
                fn (string $paragraph): string => '<p>'.nl2br(e(trim($paragraph))).'</p>',
                $paragraphs
            ));
        }

        $document = new DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);
        $document->loadHTML(
            '<?xml encoding="UTF-8"><div id="richtext-root">'.$html.'</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NONET,
        );
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        $root = $document->getElementById('richtext-root');

        if (! $root) {
            return e($html);
        }

        $output = '';
        foreach ($root->childNodes as $child) {
            $output .= self::cleanNode($child, $document);
        }

        return $output;
    }

    private static function cleanNode(DOMNode $node, DOMDocument $document): string
    {
        if ($node->nodeType === XML_TEXT_NODE) {
            return e($node->nodeValue ?? '');
        }

        if (! $node instanceof DOMElement) {
            return '';
        }

        $tag = strtolower($node->tagName);
        if (in_array($tag, ['script', 'style', 'iframe', 'object', 'svg', 'math'], true)) {
            return '';
        }

        $children = '';
        foreach ($node->childNodes as $child) {
            $children .= self::cleanNode($child, $document);
        }

        if (! in_array($tag, self::ALLOWED_TAGS, true)) {
            return $children;
        }

        $style = '';
        $hasAllowedAlignment = in_array($tag, ['p', 'div'], true)
            && preg_match(
                '/text-align\s*:\s*(left|center|right|justify)\s*;?/i',
                $node->getAttribute('style'),
                $match,
            );

        if ($hasAllowedAlignment) {
            $style = ' style="text-align:'.strtolower($match[1]).'"';
        }

        return $tag === 'br' ? '<br>' : '<'.$tag.$style.'>'.$children.'</'.$tag.'>';
    }
}
