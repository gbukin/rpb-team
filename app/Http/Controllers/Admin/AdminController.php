<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event\Event;
use App\Models\User;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function menu()
    {
        return Inertia::render('Admin/Menu');
    }

    public function users()
    {
        $users = User::all();

        return Inertia::render('Admin/Users/Users')->with(['users' => $users, 'supa' => $users]);
    }

    public function events()
    {
        $events = Event::all();
    }
}
