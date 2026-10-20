<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminCommand extends Command
{
    protected $signature = 'admin:create {email} {name}';

    protected $description = 'Create the initial website administrator account';

    public function handle(): int
    {
        $email = strtolower((string) $this->argument('email'));

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Masukkan alamat email yang valid.');

            return self::FAILURE;
        }

        if (User::query()->where('email', $email)->exists()) {
            $this->error('Email sudah digunakan. Gunakan email lain untuk membuat admin baru.');

            return self::FAILURE;
        }

        $password = $this->secret('Kata sandi admin (minimal 12 karakter)');

        if (! is_string($password) || strlen($password) < 12) {
            $this->error('Kata sandi harus terdiri dari minimal 12 karakter.');

            return self::FAILURE;
        }

        $confirmation = $this->secret('Ulangi kata sandi admin');

        if (! hash_equals($password, (string) $confirmation)) {
            $this->error('Konfirmasi kata sandi tidak cocok.');

            return self::FAILURE;
        }

        User::create([
            'name' => (string) $this->argument('name'),
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => true,
        ]);

        $this->info("Admin {$email} berhasil dibuat.");

        return self::SUCCESS;
    }
}
