<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product', 'brand', 'quantity', 'price'];

    protected $casts = [
        'quantity' => 'integer',
        'price' => 'decimal:2'
    ];

    public function getPriceAttribute($value)
    {
        return number_format($value, 0, ',', '.');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = now();
            $model->updated_at = now();
        });

        static::updating(function ($model) {
            $model->updated_at = now();
        });
    }
}
