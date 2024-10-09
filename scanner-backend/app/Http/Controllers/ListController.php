<?php

namespace App\Http\Controllers;

use App\Models\GroceryListProducts;
use Illuminate\Http\Request;

/**
 * Controller for handling requests connected to the grocery list itself (e.g. deleting items)
 */
class ListController
{
    public function getProducts($listId) {
        $allProducts = GroceryListProducts::where('grocery_list_id', $listId)
            ->select('product_name', 'product_barcode', 'product_quantity', 'product_image')
                ->get();
        return $allProducts;
    }
    public function deleteProduct($productName, $listId) {
        $productToDelete = GroceryListProducts::where('grocery_list_id', $listId)
            ->where('product_name', $productName)
            ->first();
        if($productToDelete === null) {
            return response()->json(['message' => 'Product not found.'], 400);
        }
        $productToDelete->delete();
        return response()->json(['message' => 'Product deleted from grocery list.'], 201);
    }
}
