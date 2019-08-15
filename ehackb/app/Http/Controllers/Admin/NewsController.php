<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\News;
use Carbon\Carbon;

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
        $news = new News();
        $news->fill([
            'title'             => $request['title'],
            'published_at'      => $request['published_at'] ? Carbon::parse($request['published_at']) : null,
            'short_description' => $request['short_description'],
            'long_description'  => $request['long_description'],
        ]);
        $news->save();

        if ($request->has('image')) {
            $news->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return redirect()
            ->route('news.index')
            ->with('message', 'News created!');
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
            'published_at'      => $request['published_at'] ? Carbon::parse($request['published_at']) : null,
            'short_description' => $request['short_description'],
            'long_description'  => $request['long_description'],
        ]);
        $news->save();

        if ($request->has('image')) {
            $news->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return redirect()
            ->route('news.index')
            ->with('message', 'News updated!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()
            ->route('news.index')
            ->with('message', 'News deleted!');
    }
}
