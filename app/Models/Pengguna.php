<?php

namespace App\Models;

// 1. TAMBAHKAN 'USE' STATEMENT INI
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// 2. TAMBAHKAN 'implements FilamentUser'
class Pengguna extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    /**
     * Tentukan nama tabel secara eksplisit
     */
    protected $table = 'penggunas';

    /**
     * Izinkan Mass Assignment (untuk seeder Anda)
     */
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 3. INI ADALAH PERBAIKANNYA
    // Method ini memberi tahu Filament cara mendapatkan nama user
    public function getFilamentName(): string
    {
        // Ini akan mencoba 'nama', lalu 'username', lalu 'User'
        // Ini akan memperbaiki error 'null returned' Anda
        return $this->nama ?? $this->username ?? 'User';
    }

    // 4. INI PENTING UNTUK MULTI-PANEL
    // Method ini memeriksa 'role_id' untuk izin akses panel
    public function canAccessPanel(Panel $panel): bool
    {
        // ID dari RoleSeeder Anda:
        // 1 = 'admin'
        // 2 = 'Bagian Desain'
        // 3 = 'Produksi'
        // 4 = 'Manajemen'

        if ($panel->getId() === 'admin') {
            return $this->role_id === 1;
        }

        if ($panel->getId() === 'desain') {
            return $this->role_id === 2;
        }

        if ($panel->getId() === 'produksi') {
            return $this->role_id === 3;
        }

        if ($panel->getId() === 'manajemen') {
            return $this->role_id === 4;
        }

        // (Opsional: Izinkan admin mengakses semua panel)
        if ($this->role_id === 1) {
            return true;
        }

        return false;
    }

    // --- Relasi ---
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}

