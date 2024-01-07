<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterType extends Model
{
    // use HasFactory;
    protected $fillable = [
        'letter_code',
        'name_type',
        'recipients',
        'content',
        'attachment',
    ];

    public function letters()
    {
        return $this->hasMany(Letter::class, 'letter_type_id');
    }



public function users()
{
    return $this->belongsToMany(User::class, 'letter_recipients', 'letter_id', 'user_id');
}
}
