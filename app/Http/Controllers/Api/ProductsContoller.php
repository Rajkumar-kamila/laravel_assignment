<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Products;

class ProductsContoller extends Controller
{
    // protected $products;
    // public function __construct(){
    //     $this->products = new Products();
    // }
    public function index(){
        $products = Products::all();

        if($products->count() > 0){
            $data = [
                'status' => 200,
                'product' => $products
            ];
            return response()->json($data, 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No Data Found'
            ], 404);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status' => 400, 'message' => $validator->errors()->toArray()]);
        }else{
            $products = Products::create([
                'title' => $request->title,
                'price' => $request->price,
                'description' => $request->description
            ]);

            if($products) {
                return response()->json(['status' => 200, 'message' => 'Product created successfully', 'data' => $products]);
            } else {
                return response()->json(['status' => 400, 'message' => 'Failed to create product']);
            }

        }
    }

    public function show($id){
        $products = Products::find($id);
        if($products) {
            return response()->json(['status' => 200, 'message' => 'Product fetch successfully', 'data' => $products]);
        } else {
            return response()->json(['status' => 400, 'message' => 'No record found']);
        }
    }

    public function edit($id){
        $products = Products::find($id);
        if($products) {
            return response()->json(['status' => 200, 'message' => 'Product fetch successfully', 'data' => $products]);
        } else {
            return response()->json(['status' => 400, 'message' => 'No record found']);
        }
    }

    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status' => 400, 'message' => $validator->errors()->toArray()]);
        }else{
            $products = Products::find($id);
            if($products) {
                
                $products->title = $request->title;
                $products->price = $request->price;
                $products->description = $request->description;

                $products->save();
                return response()->json(['status' => 200, 'message' => 'Product update successfully', 'data' => $products]);
            } else {
                return response()->json(['status' => 400, 'message' => 'Failed to update product']);
            }

        }
    }


    public function delete($id){
        $products = Products::find($id);
        if($products) {
            $products->delete();
            return response()->json(['status' => 200, 'message' => 'Product delete successfully']);
        } else {
            return response()->json(['status' => 400, 'message' => 'No Id found']);
        }
    }
}
