<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    //

    public function index()
    {
    }

    public function store(Request $request)
    {
        if ($request->date) {
            $date_start = $request->date[0];
            $date_end = $request->date[1];
            $create = Voucher::create([
                "name" => $request->name,
                "quatity" => $request->quatity,
                "discount" => $request->discount,
                "date_start" => $date_start,
                "date_end" => $date_end
            ]);
        }
        if ($create) {
            return response()->json(["mess" => "Thêm thành công", "code" => 1]);
        } else {
            return response()->json(["mess" => "Thêm thành thất bại", "code" => 0]);
        }
    }

    public function edit($id)
    {
    }

    public function update()
    {
    }

    public function delete($id)
    {
    }
}
