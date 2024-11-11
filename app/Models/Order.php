<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;
    /**
     * The "booting" function of model
     *
     * @return void
     */
    // protected static function boot()
    // {
    //     static::creating(function ($model) {
    //         if (!$model->getKey()) {
    //             $model->{$model->getKeyName()} = (string) Str::uuid();
    //         }
    //     });
    // }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
    protected $fillable = [
        'user_id',
        'grand_total',
        'payment_method',
        'payment_status',
        'status',
        'shipping_amont',
        'shipping_method',
        'shipping_resi',
        'note',
        'merchant_id',
    ];
    // Konstanta dalam bahasa Indonesia
    const BARU = 'baru';
    const DIPROSES = 'diproses';
    const DIKIRIM = 'dikirim';
    const DITERIMA = 'diterima';
    const SELESAI = 'selesai';
    const DIBATALKAN = 'dibatalkan';
    const MENUNGGU = 'menunggu';
    const DIBAYAR = 'dibayar';
    const GAGAL = 'gagal';
    const CANCELLED = 'cancelled';

    // Mengubah fungsi untuk menggunakan konstanta baru dalam bahasa Indonesia
    public function getPaymentStatusColorAttribute()
    {
        $badges = [
            self::MENUNGGU => 'bg-red-500',
            self::DIBAYAR => 'teal',
            self::GAGAL => 'red',
            self::CANCELLED => 'bg-red-500',
            self::DIBATALKAN => 'bg-red-500',
        ];
        return $badges[$this->payment_status];
    }

    public function getStatusColorAttribute()
    {
        $badges = [
            self::BARU => 'bg-blue-500',
            self::DIPROSES => 'bg-blue-500',
            self::DIKIRIM => 'bg-yellow-500',
            self::DITERIMA => 'bg-blue-500',
            self::DIBATALKAN => 'bg-red-500',
            self::SELESAI => 'bg-blue-500',
        ];

        return $badges[$this->status];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function address()
    {
        return $this->hasOne(ShippingAddress::class);
    }
}
