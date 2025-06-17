<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable,  HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

        /**
     * Mendefinisikan relasi one-to-one:
     * Jika user ini adalah seorang pegawai, maka ia memiliki satu data profil.
     * Foreign key 'user_id' ada di tabel 'pegawai'.
     */
    public function profilPegawai(): HasOne
    {
        return $this->hasOne(Pegawai::class, 'user_id');
    }

    /**
     * Mendefinisikan relasi one-to-many:
     * Jika user ini adalah seorang mitra, ia bisa memiliki/mengelola banyak data pegawai.
     * Foreign key 'mitra_id' ada di tabel 'pegawai'.
     */
    public function daftarPegawaiDibuat(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'mitra_id');
    }


}
