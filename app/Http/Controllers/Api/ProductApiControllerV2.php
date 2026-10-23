<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductApiControllerV2 extends Controller
{
    public function index(): JsonResponse
    {
        $products = ProductResource::collection(Product::all());

        return response()->json($products, 200);
    }

    public function show(string $id): JsonResponse
    {
        $product = new ProductResource(Product::findOrFail($id));

        return response()->json($product, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|integer|gt:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::create($request->only(['name', 'price']));

        return response()->json(new ProductResource($product), 201);
    }
}
