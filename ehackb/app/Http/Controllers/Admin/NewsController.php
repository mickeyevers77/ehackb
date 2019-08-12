<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.news.index');
    }

    public function create()
    {
        return view('admin.news.edit')
            ->with('news', new News);
    }

    public function store(StoreNewsRequest $request)
    {
        $news = News::create([
            'title'             => $request['title'],
            'image'             => '',
            'short_description' => $request['short_description'],
            'long_description'  => $request['long_description'],
        ]);
        $news->save();

        return redirect()->route('news.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(News $news)
    {
        return view('admin.news.edit')
            ->with('news', $news);
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        $news->update([
            'title'             => $request['title'],
            'image'             => '',
            'short_description' => $request['short_description'],
            'long_description'  => $request['long_description'],
        ]);
        $news->save();

        return redirect()->route('news.index');
    }

    public function destroy($id)
    {
        //
    }
}
