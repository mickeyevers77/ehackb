<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\News;
use App\Subscriber;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('home');
    }

    public function show(News $news)
    {
        return view('news.show')
            ->with('news', $news);
    }

    public function subscribe(StoreSubscriberRequest $storeSubscriberRequest)
    {
        $subscriber = new Subscriber();
        $subscriber->fill([
            'first_name' => $storeSubscriberRequest['first_name'],
            'last_name'  => $storeSubscriberRequest['last_name'],
            'email'      => $storeSubscriberRequest['email'],
        ]);
        $subscriber->save();

        return redirect()->back();
    }
}
