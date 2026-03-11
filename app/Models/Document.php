<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'title',
        'path',
        'status',
        'user_id',
        'recipient_email',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}