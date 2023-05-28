<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Models\Event\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $teams = Team::select(['id', 'name', 'created_at'])->orderByDesc('created_at');

        return response()->json([
            'columns' => ['Название', 'Создано'],
            'rows' => $teams->get()->toArray(),
        ]);
    }

    public function show(Team $team)
    {
        return Inertia::render('Events/Team/Team', ['team' => $team]);
    }
}
