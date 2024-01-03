<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChallengeResource;
use App\Models\Challenge;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    use ResponseTrait;
    public function paginate(){
        
        return $this->data('success', 'challenges',  ChallengeResource::collection( Challenge::all() ));
    }
}
