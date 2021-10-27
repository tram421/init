<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\UploadService;

class UploadController extends Controller
{

    public function store(Request $request)
    {
        $upload = new UploadService();
        $result = $upload->upload($request);
        return json_encode($result);
    }
}
