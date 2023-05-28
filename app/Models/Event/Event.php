<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'event_start' => 'datetime:d.m.Y H:i',
        'event_end' => 'datetime:d.m.Y H:i',
        'register_start' => 'datetime:d.m.Y H:i',
        'register_end' => 'datetime:d.m.Y H:i',
    ];
}
