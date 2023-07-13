<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class user_information extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];

    protected $primaryKey = 'users_id';

    protected $casts = [
        'user_favorites_books' => 'array',
        'user_wish_books' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'users_id');
    }
}
