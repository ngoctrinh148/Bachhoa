<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function addEvent(Request $request)
    {
        $event = new Event;
        $event->title = $request->input('title');
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        $event->className = $request->input('className');
        $event->save();

        return response()->json(['message' => 'Event saved successfully']);
    }
}
