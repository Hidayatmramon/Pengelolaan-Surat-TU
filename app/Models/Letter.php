<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    // use HasFactory;
    protected $fillable = [
        'letter_type_id',
        'letter_perihal',
        'receipients',
        'content',
        'notulis',
        'attachment',
    ];

    public function letter_type()
    {
        return $this->belongsTo(LetterType::class, 'letter_type_id');
    }


public function users()
{
    return $this->belongsToMany(User::class, 'letter_recipients', 'letter_id', 'user_id');
}
}
