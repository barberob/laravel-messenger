<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    protected $fillable = [
        'content',
        'sender_id',
        'receiver_id'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
