<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        // return Rating::where('product_id', $this->id)->avg('rating');
        return User::where('id', $this->user_id)->get();

        // $total = $this->rating()->sum('total');
        // $avg = $this->rating()->reduce(function ($carry, $item) {
        //     return $carry + $item->total * $item->rating;
        // }) / $total;

        // return $avg;
    }
}
