<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class complete extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'book_id',
        'stop_id',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}