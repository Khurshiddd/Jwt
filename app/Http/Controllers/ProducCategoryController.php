<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProducCategoryResource;
use App\Models\ProducCategory;
// use Illuminate\Http\Client\Request;
use Illuminate\Http\Request;

class ProducCategoryController extends Controller
{
    public function index()
    {
        return ProducCategoryResource:: collection(ProducCategory::all());
    }

    public function show(Request $request)
    {
        //dd($request->all());
         return ProducCategory::find($request->id)->products()->get();

    }
}
