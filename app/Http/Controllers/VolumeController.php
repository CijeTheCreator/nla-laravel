<?php

namespace App\Http\Controllers;

use App\Models\Volume;
use Illuminate\Http\Request;

class VolumeController extends Controller
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
        if (! auth()->guard()->check()) {
            abort(403, 'Unauthorized');
        }

        return view('volumes.create');
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
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'isCurrent' => 'boolean',
        ]);

        $validated['isCurrent'] = $request->boolean('isCurrent');

        Volume::query()->create($validated);

        return redirect('/archive')->with('success', 'Volume created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Volume $volume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Volume $volume)
    {
        if (! auth()->guard()->check()) {
            abort(403, 'Unauthorized');
        }

        return view('volumes.edit', compact('volume'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Volume $volume)
    {

        if (! auth()->guard()->check()) {
            abort(403, 'Unauthorized');
        }
        // Validate
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update
        $volume->update($validated);

        return redirect('/archive')->with('success', 'Volume updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Volume $volume)
    {
        if (! auth()->guard()->check()) {
            abort(403, 'Unauthorized');
        }

        $volume->delete();

        return redirect('/archive')->with('success', 'Volume Deleted!');
    }
}
