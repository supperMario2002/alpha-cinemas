<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index() {
        $listCategories = Category::get();
        return response()->json($listCategories);
    }

    public function store(Request $request) {
        $create = Category::create([
            "name" => $request->name,
            "slug" => $request->slug,
        ]);
        return response()->json(['mess' => 'Thêm danh mục thành công!!']);
    }
}
