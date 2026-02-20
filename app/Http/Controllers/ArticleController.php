<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Volume;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $volumes = Volume::all();

        return view('articles.create', compact('volumes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! auth()->guard()->check()) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'volume_id' => ['required', 'exists:volumes,id'],
            'name' => ['required', 'string', 'max:255'],
            'authors' => ['required', 'string'],
            'pages' => ['required', 'string', 'max:50'],
            'publishDate' => ['required', 'date'],
            'pdfUrl' => ['nullable', 'url', 'max:2048'],
        ]);

        Article::query()->create([
            'volume_id' => $validated['volume_id'],
            'name' => $validated['name'],
            'authors' => array_values(array_filter(array_map('trim', explode("\n", $validated['authors'])))),
            'pages' => $validated['pages'],
            'publishDate' => $validated['publishDate'],
            'pdfUrl' => $validated['pdfUrl'] ?? null,
        ]);

        return redirect('/archive')->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if (! auth()->guard()->check()) {
            abort(403, 'Unauthorized');
        }

        $volumes = Volume::all();

        return view('articles.edit', compact('article', 'volumes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        if (! auth()->guard()->check()) {
            abort(403, 'unauthorized');
        }

        $validated = $request->validate([
            'volume_id' => ['required', 'exists:volumes,id'],
            'name' => ['required', 'string', 'max:255'],
            'authors' => ['required', 'string'],
            'pages' => ['required', 'string', 'max:50'],
            'publishDate' => ['required', 'date'],
            'pdfUrl' => ['nullable', 'url', 'max:2048'],
        ]);

        $article->update([
            'volume_id' => $validated['volume_id'],
            'name' => $validated['name'],
            'authors' => array_values(array_filter(array_map('trim', explode("\n", $validated['authors'])))),
            'pages' => $validated['pages'],
            'publishDate' => $validated['publishDate'],
            'pdfUrl' => $validated['pdfUrl'] ?? null,
        ]);

        return redirect('/archive')->with('success', 'article updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if (! auth()->guard()->check()) {
            abort(403, 'Unauthorized');
        }
        $article->delete();

        return redirect('/archive');
    }
}
