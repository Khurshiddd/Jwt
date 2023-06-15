<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductdetailsRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductItemResource;
use App\Http\Resources\ProductShowResource;
use App\Models\Product;
use App\Models\ProductItems;

class ProductController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $userProducts = Product::where('user_id', auth()->id())->get();

        return response()->json($userProducts);
    }

    public function store(ProductStoreRequest $request)
    {

        $d = $request->validated()['deteils'];

        $product = Product::create($request->validated());
        $product->save();

        $id = $product->id;

        foreach($d as $value)
        {

            ProductItems::updateOrCreate(
                [
                    'product_id' => $id,
                    'color_id' => $value['color_id'],
                    'size_id' => $value['size_id']
                    ]
                );

            }

            return response()->json([
                'success'=>true
            ]);
        }

        public function show()
        {
            $id = auth()->user()->id;
            $user = Product::query()->find(1)->first();
            $result = ProductShowResource::collection($user);
            return response()->json($result);
        }


        public function update(UpdateProductRequest $request,$id)
        {
            $product=Product::find($id);
            $product->update([
                'title'=>$request->title,
                'body'=>$request->body,
                'price'=>$request->price,
            ]);
            $product->save();
            return response()->json([
                'success' => true
            ]);
        }

        public function deteils()
        {
            $res = Product::whereHas('sizes')->orWhereHas('colors')->get();

            $javob = ProductItemResource::collection($res);

            return response()->json($javob, 200);

        }


        public function destroy($id)
        {
            $product=Product::find($id);
            $product->users()->detach();
            return response()->json([
                'success' => true,
                'message'=>'delete'
            ]);
        }
        public function deteilsId(ProductdetailsRequest $request){
            $res = Product::find($request);

            $javob = ProductItemResource::collection($res);

            return response()->json($javob, 200);
        }
    }
