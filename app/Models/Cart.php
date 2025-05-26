<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'cart'];

    protected $casts = ['cart' => 'array'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
