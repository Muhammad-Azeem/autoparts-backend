<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use http\Env\Request;

class CategoryController extends Controller
{
    protected $CategoryService;

    public function __construct(CategoryService $CategoryService = null)
    {
        $this->CategoryService = $CategoryService ;
    }

    public function create(Request $request){
        return "helo";
        $this->CategoryService->create($request);
    }
}
