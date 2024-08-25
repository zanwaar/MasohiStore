<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'owner_nama_lengkap', 'owner_no_hp', 'owner_alamat_lengkap',
        'owner_no_ktp', 'owner_ktp_file_url', 'merchant_nama', 'slug',
        'merchant_alamat', 'merchant_lokasi', 'merchant_foto', 'merchant_banner'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
