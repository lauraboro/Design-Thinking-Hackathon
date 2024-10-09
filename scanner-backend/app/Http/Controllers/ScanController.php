<?php

namespace App\Http\Controllers;

use App\Models\GroceryList;
use App\Models\GroceryListProducts;
use App\Models\ScannerUser;
use Illuminate\Support\Facades\Http;


/**
 * Controller for handling the scanned product and putting in on the grocery list.
 */
class ScanController
{
    public function scanBarcode($barcode, $scannerId) {
        $scannedProduct = Http::get('https://world.openfoodfacts.org/api/v2/product/' . $barcode . '?fields=product_name');
        if(!$scannedProduct->successful()) {
            return response()->json(['message' => 'Product not found'], 400);
        }

        $scanUserId = ScannerUser::where('scanner_id', $scannerId)->pluck('user_id')->first();
        $listToAdd = GroceryList::where('user_id', $scanUserId)->pluck('id')->first();
        $existingProduct = GroceryListProducts::where('grocery_list_id', $listToAdd)
            ->where('product_barcode', $barcode)
            ->first();

        if($existingProduct != null) {
            $existingProduct->product_quantity += 1;
            $existingProduct->save();
            return response()->json(['message' => 'Quantity increased'], 201);
        }
        //add the scanned Product to the grocery list
        $newProduct = new GroceryListProducts();
        $newProduct->grocery_list_id = $listToAdd;
        $newProduct->product_barcode = $scannedProduct['code'];
        $newProduct->product_name = $scannedProduct['product']['product_name'];
        $newProduct->save();

        return response()->json(['message' => 'Product added to the list!'], 201);
    }
}
