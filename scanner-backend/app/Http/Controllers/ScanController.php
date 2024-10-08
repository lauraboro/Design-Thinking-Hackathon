<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Controller for handling the scanned product and putting in on the grocery list.
 */
class ScanController
{
    public function scanBarcode(Request $request): string {
        return "test";
    }
}
