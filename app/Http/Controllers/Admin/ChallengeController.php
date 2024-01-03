<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\Level;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = Challenge::all();

        return view('admin.challenge.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.challenge.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $level = new Level();
        $level->name = $request->name ;
        $level->image = $request->image ;
        $level->image2 = $request->image2 ;
        $level->prize = $request->prize ;
        $level->category_id = 0;
        $level->save();

        $challenge = new Challenge();
        $challenge->name = $request->name ;
        $challenge->image = $request->main_image ;
        $challenge->prize = $request->prize ;
        $challenge->level_id = $level->id ;
        $challenge->save();

        return redirect()->route('level.edit',$level->id)->with('success', 'Level created successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $challenge = Challenge::find($id);

        return view('admin.challenge.edit', compact('challenge'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Challenge = Challenge::find($id);
        $Challenge->name = $request->name ;
        $Challenge->image = $request->main_image ;
        $Challenge->prize = $request->prize ;
        $Challenge->save();

        return redirect()->route('challenge.index')->with('success', 'Challenge updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Challenge = Challenge::find($id);
        $Challenge->delete();

        return redirect()->route('challenge.index')->with('success', 'Challenge deleted successfully');
    }
}
