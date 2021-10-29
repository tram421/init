<?php
namespace App\Http\Service;

use App\Models\Products;
use App\Models\Categories;

class ProductsService
{
    private $model;
    private $categoryModel;
    public function __construct()
    {
        $this->model = new Products();
        $this->categoryModel = new Categories();
    }

    public function getCategory()
    {
        $arr = $this->categoryModel->all();
        return $arr;
    }
    public function get($id = 0)
    {
        dd('vào');
    }
}
