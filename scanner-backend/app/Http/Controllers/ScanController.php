<?php

namespace App\Http\Controllers;

use App\Models\GroceryListProducts;
use Illuminate\Support\Facades\Http;


/**
 * Controller for handling the scanned product and putting in on the grocery list.
 */
class ScanController
{
    public function scanBarcode($barcode) {
        $scannedProduct = Http::get('https://world.openfoodfacts.org/api/v2/product/' . $barcode . '?fields=product_name');
        if(!$scannedProduct->successful()) {
            return response()->json(['message' => 'Product not found'], 400);
        }
        //add the scanned Product to the grocery list
        $newProduct = new GroceryListProducts();
        $newProduct->product_barcode = $scannedProduct['code'];
        $newProduct->product_name = $scannedProduct['product']['product_name'];
        //1 is a placeholder for now, I'm confused how we want to do this
        $newProduct->grocery_list_id = 1;
        $newProduct->save();

        return response()->json(['message' => 'Product added to the list!'], 201);
    }
}
