<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'event_start' => 'datetime:d.m.Y H:i',
        'event_end' => 'datetime:d.m.Y H:i',
        'register_start' => 'datetime:d.m.Y H:i',
        'register_end' => 'datetime:d.m.Y H:i',
    ];
}
