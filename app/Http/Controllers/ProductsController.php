<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Service\ProductsService;

class ProductsController extends Controller
{
    private $productService;
    public function __construct()
    {
        $this->productService = new ProductsService();
    }
    public function show($id = 0)
    {
        $this->productService->get($id);

    }
}
