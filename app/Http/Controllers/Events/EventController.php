<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Models\Event\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::select(['id', 'name', 'event_start', 'event_end', 'participation_type', 'stage'])->orderByDesc('event_start');

        $events = $events->get()->transform(function ($event) {
            $event->participation_type = ($event->participation_type == '0') ? ('Одиночное') : ('Командное');
            return $event;
        });

        return response()->json([
            'columns' => ['Название', 'Начало', 'Конец', 'Тип участия', 'Этап'],
            'rows' => $events,
        ]);
    }

    public function show(Event $event)
    {
        return Inertia::render('Events/Event/Event', ['event' => $event]);
    }

    public function edit(Event $event)
    {
        //
    }

    public function update(Request $request, Event $event)
    {
        //
    }

    public function destroy(Event $event)
    {
        //
    }
}
