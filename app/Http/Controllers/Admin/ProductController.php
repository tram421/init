<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\ProductRequest;

//use Validator;
use Illuminate\Support\Facades\Validator;

//use Illuminate\Validation\Rule;
use App\Http\Service\AdminGeneralService;

use League\Flysystem\Config;
use function MongoDB\BSON\toJSON;
use App\Http\Service\ProductsService;

class ProductController extends Controller
{
    private $model;
    private $adminGeneralService;

    private $productsService;

    public function __construct()
    {
        $this->model = new Products();
        $this->adminGeneralService = new AdminGeneralService($this->model);
        $this->productsService = new ProductsService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * show trang để thêm sản phẩm
     * @return
     */
    public function add()
    {
        $data = Session::get('data');
        # Xoá lỗi mỗi khi nhấn link
        Session::pull('error');
        $category = $this->productsService->getCategory();
        return view('admin.product.add', [
            'title' => 'Thêm sản phẩm',
            'data' => $data,
            'categories' => $category
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return
     */
    public function store(ProductRequest $request)
    {
        # Khi có lỗi thì load lại view, giữ lại các thông tin vừa nhập

        $product = new Products();
        $product->fill($request->input());
        $product->save();

        Session::flash('success', "Tạo sản phẩm $request->name thành công");

        return redirect()->back();
    }

    public function listProducts($selection = 'asc')
    {
        $itemEachPage = \Config::get('constants.product.paginate');
        if ($selection == 'asc') {
            $data = $this->model->where('is_delete', '=', 0)
                    ->orderBy('updated_at','ASC')
                    ->paginate($itemEachPage);
        } elseif ($selection == 'trash') {
            $data = $this->model->where('is_delete', '=', 1)
                    ->orderBy('updated_at','DESC')
                    ->paginate($itemEachPage) ;
        } elseif($selection == 'desc') {
            $data = $this->model->where('is_delete', '=', 0)
                    ->orderBy('updated_at','DESC')
                    ->paginate($itemEachPage) ;
        } else {
            $data = $this->model->paginate(15) ;
        }
        $countList = $this->model->where('is_delete', '=', 1)->count();
        return view('admin.product.list', [
            'title' => 'Danh sách sản phẩm',
            'data' => $data,
            'countList' => $countList,
            'itemEachPage' => $itemEachPage
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     */
    public function show($id)
    {
//        dd(Session::get('data'));
        #Nếu trang được tải về do lỗi nhập liệu thì lấy dữ liệu từ session
        if (!is_null(Session::get('data'))) {
            $row = Session::get('data');
            #chuyển sang dạng object để đồng bộ với trường hợp else ở dưới, do gọi bên view bằng $data->name
            $row = json_encode($row);
            $row = json_decode($row, false);
        } else {
            $row = $this->model->find($id); //trả về object
        }

        if (!is_null($row)) {
            return view('admin.product.show', [
                'title' => 'Sản phẩm ',
                'data' => $row,
                'readPrice' => readNum($row->price),
                'readPriceSale' => readNum($row->price_sale)
            ]);
        }
        Session::flash('error', 'Sản phẩm không tồn tại, vui lòng kiểm tra lại');
        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     */
    public function update(ProductRequest $request, $id)
    {
        $row = $this->model->find($id);
        if (!is_null($row)) {
            $row->fill($request->input());
            $row->save();
            return redirect('/admin/product/list');
        }
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $result = $this->adminGeneralService->destroy($id);
        if ($result) {
            return json_encode([
                'error' => false,
                'message' => 'Xoá thành công'
            ]);
        }
        return json_encode([
            'error' => true,
            'message' => 'Không tìm thấy sản phẩm cần xoá'
        ]);

    }

    public function updateSelection($column, $id)
    {
        $this->adminGeneralService->updateSelection($column, $id);
        return redirect()->back();
    }
}
