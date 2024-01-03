<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryLevelsResource;
use App\Http\Resources\LevelCollection;
use App\Http\Resources\SingleLevelResource;
use App\Models\Category;
use App\Models\Level;
use App\Models\UserLevel;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Auth;

class LevelController extends Controller
{
    use ResponseTrait;
    public function paginate()
    {

        return $this->data('success', 'levels', new LevelCollection(Level::paginate()));
    }

    public function levelsByCategory($category_id)
    {
        return $this->data('success', 'category', new CategoryLevelsResource(Category::find($category_id)));

    }

    public function levelById($id)
    {

        $level = Level::find($id);

        UserLevel::updateOrCreate([
            'user_id' => Auth::user()->id,
            'level_id' => $id,
            'status' => 1,
        ]);


        if ($level) {

            return $this->data('success', 'level', SingleLevelResource::make($level));
        }

        return $this->error('not found');


    }

    public function solved(Request $request, $id)
    {
        $level = Level::find($id);

        $user = Auth::user();
        $user->coins = $request->coins + $level->prize;

        $user->solved = $user->solved + 1;
        $user->save();

        UserLevel::updateOrCreate([
            'user_id' => Auth::user()->id,
            'level_id' => $level->id,

        ], [
            'status' => 2,
        ]);

        $next_id = Level::where('id', '>', $level->id)->where('category_id', $level->category_id)->min('id');

        if ($next_id) {
            UserLevel::updateOrCreate([
                'user_id' => Auth::user()->id,
                'level_id' => $next_id,
                'status' => 1,
            ]);
        }




        return $this->data('success', 'level', SingleLevelResource::make($level));


    }
}
