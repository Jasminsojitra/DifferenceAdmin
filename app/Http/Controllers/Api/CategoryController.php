<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Models\Category;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ResponseTrait;
    public function paginate(){
        
        return $this->data('success', 'categories', new CategoryCollection( Category::paginate() ));
    }
}
