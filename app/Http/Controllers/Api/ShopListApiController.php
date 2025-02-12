<?php

namespace App\Http\Controllers\Api;

use App\Models\ShopList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopListApiController extends Controller
{
    
    public function index()
    {
        $shopList = ShopList::all();
        return response()->json($shopList);
    }
   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string'
        ]);

        $Product = Shoplist::find($validated['product_name']);
        if ($Product) {
            return response()->json(['message' => 'Product already exists in ShopList'], 400);
        }

        $shopList = ShopList::create($validated);
        return response()->json($shopList, 201);
    }

    
    public function show(string $id)
    {
        $shopList = ShopList::find($id);
        if (!$shopList) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($shopList);
    }

   
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'product_name' => 'sometimes|required|string'
        ]);

        $shopList = ShopList::find($id);
        if (!$shopList) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $shopList->update($validated);
        return response()->json($shopList,200);
    }

   
    public function destroy(string $id)
    {
        $shopList = ShopList::find($id);
        if (!$shopList) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $shopList->delete();
        return response()->json([]);
    }
}
