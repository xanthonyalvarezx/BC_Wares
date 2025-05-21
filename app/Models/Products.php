<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'image_url',
        'description',
        'short_desc',
        'quantity',
        'price',
        'type'
    ];

    public function userProducts()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
