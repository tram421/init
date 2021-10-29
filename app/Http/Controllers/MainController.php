<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\SettingService;
use App\Models\Setting;
use App\Models\Page;
use App\Models\TopContent;
use App\Models\Categories;
use App\Models\Products;

class MainController extends Controller
{
    private $modelSetting;
    private $infoShop;
    private $modelPage;
    private $top;
    private $category;
    private $products;

    public function __construct()
    {
        $this->modelSetting = new Setting();
        $this->infoShop = new SettingService();
        $this->modelPage = new Page();
        $this->top = new TopContent();
        $this->category = new Categories();
        $this->products = new Products();
    }

    public function index()
    {
        return view('home', [
            'title' => 'Trang chủ',
            'infoShop' => $this->modelSetting->first(),
            'page' => $this->modelPage->all(),
            'top' => $this->top->first(),
            'category' => $this->category->all(),
            'productsFeature' => $this->products->where('feature', '=', '1')->get(),
            'productsNew' => $this->products->where('active', '=', '1')->orderByDesc('updated_at')->limit(8)->get()
        ]);
    }
}
