<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.subscribers.index');
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()
            ->route('subscribers.index')
            ->with('message', 'Subscriber deleted!');
    }
}
