<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }
    public function ratingall()
    {
        return $this->hasMany(Rating::class, 'product_id', 'id');
    }
    public function getImagesUrlAttribute()
    {
        // Cek apakah ada gambar produk
        if ($this->images) {
            // Jika ada, kembalikan URL gambar produk
            return asset('storage/products/' . $this->images);
        }
    
        // Jika tidak ada gambar, kembalikan URL gambar default
        return asset('storage/products/images.png');
    }

    public function rating()
    {
        // return Rating::where('product_id', $this->id)->avg('rating');
        $cacheKey = 'ratings_for_product_t' . $this->id;
        return  Cache::remember($cacheKey, now()->addMinutes(30), function () {
            return DB::table('ratings')
                ->join('users', 'ratings.user_id', '=', 'users.id')
                ->where('ratings.product_id', $this->id)
                ->select('ratings.*', 'users.*')
                ->get();
        });
        // $total = $this->rating()->sum('total');
        // $avg = $this->rating()->reduce(function ($carry, $item) {
        //     return $carry + $item->total * $item->rating;
        // }) / $total;

        // return $avg;
    }
    public function sumReviews()
    {
        // return Rating::where('product_id', $this->id)->sum('rating');
        // return $this->rating()->sum('total');
    }
    public function ratings()
    {
        return Rating::where('product_id', $this->id)->select(DB::raw('count(1) as total'), 'rating', 'comment')->groupBy('comment')->groupBy('rating')->get();
    }
}
