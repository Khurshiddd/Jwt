<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Http\Requests\StoreAttributesRequest;
use App\Http\Requests\UpdateAttributesRequest;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function store(StoreAttributesRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Attributes $attributes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attributes $attributes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttributesRequest $request, Attributes $attributes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attributes $attributes)
    {
        //
    }
}
