<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.events.index');
    }

    public function create()
    {
        return view('admin.events.edit')
            ->with('event', new Event);
    }

    public function store(StoreEventRequest $request)
    {
        $event = new Event();
        $event->fill([
            'title'             => $request['title'],
            'speaker'           => $request['speaker'],
            'starts_at'         => Carbon::parse($request['starts_at']),
            'ends_at'           => Carbon::parse($request['ends_at']),
            'short_description' => $request['short_description'],
            'long_description'  => $request['long_description'],
            'slots'             => $request['slots'],
        ]);
        $event->save();

        if ($request->has('image')) {
            $event->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return redirect()
            ->route('events.index')
            ->with('message', 'Event created!');
    }

    public function show($id)
    {
        //
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit')
            ->with('event', $event);
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update([
            'title'             => $request['title'],
            'speaker'           => $request['speaker'],
            'starts_at'         => Carbon::parse($request['starts_at']),
            'ends_at'           => Carbon::parse($request['ends_at']),
            'short_description' => $request['short_description'],
            'long_description'  => $request['long_description'],
            'slots'             => $request['slots'],
        ]);
        $event->save();

        if ($request->has('image')) {
            $event->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return redirect()
            ->route('events.index')
            ->with('message', 'Event updated!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()
            ->route('events.index')
            ->with('message', 'Event deleted!');
    }

    public function enroll(Event $event)
    {
        $event->users()->attach(Auth::user());
        return redirect()->back();
    }

    public function cancel(Event $event)
    {
        $event->users()->detach(Auth::user());
        return redirect()->back();
    }

    public function comment(Request $request, Event $event)
    {
        $comment = new Comment();
        $comment->fill([
            'user_id'        => auth()->id(),
            'body'           => $request['body'],
        ]);

        $event->comments()->save($comment);
        return redirect()->back();
    }
}
