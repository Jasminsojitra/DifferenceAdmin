<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Level;
use App\Models\Point;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = Level::where('category_id', '!=', 0)->get();
        return view('admin.level.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Category::all();

        return view('admin.level.create', compact('cats'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $level = new Level();
        $level->name = $request->name;
        $level->image = $request->image;
        $level->image2 = $request->image2;
        $level->category_id = $request->category_id;
        $level->save();

        return redirect()->route('level.edit', $level->id)->with('success', 'Level created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cats = Category::all();
        $level = Level::find($id);

        return view('admin.level.edit', compact('level', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $level = Level::find($id);
        $level->name = $request->name;
        $level->image = $request->image;
        $level->image2 = $request->image2;
        $level->category_id = $request->category_id;
        $level->save();

        if ($request->points) {

            foreach ($request->points as $point) {

                $p = Point::updateOrCreate(
                    [
                        'level_id' => $id,
                        'x' => $point['x'],
                        'y' => $point['y']
                    ],
                    [
                        'level_id' => $id,
                        'x' => $point['x'],
                        'y' => $point['y']
                    ]);

            }
        }

        return redirect()->route('level.edit', $id)->with('success', 'Level updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $level = Level::find($id);
        $level->delete();

        return redirect()->route('level.index')->with('success', 'level deleted successfully');
    }

    public function destroyPoint(string $id)
    {
        $point = Point::find($id);
        $level_id = $point->level_id;
        $point->delete();

        return redirect()->route('level.edit', $level_id)->with('success', 'Point deleted successfully');

    }
}
