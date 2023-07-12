<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\FileService;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    protected $file;
    public function __construct(FileService $file){
        $this->file = $file;
    }

    public function index()
    {
        $listMovie = Movie::get();
        foreach ($listMovie as $item) {
            $item['img'] = asset(Storage::url($item->img));
        }
        return response()->json($listMovie);
    }

    public function store(Request $request)
    {
        if($request->hasFile('file')){
            // dd($request);
            $path = $this->file->uploadImage($request->file, 'movies'); 
        }
        try {
            $create = Movie::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'img' => $path,
                'descrition' => $request->descrition,
                'release_date' => Carbon::parse($request->release_date)->format('Y/m/d'),
                'director' => $request->director,
                'running_time' => $request->running_time,
            ]);
            return response()->json(['mess' => 'Thêm phim mới thành công!']);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
        return response()->json($movie);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        try {
            $movie->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'descrition' => $request->descrition,
                'release_date' => Carbon::parse($request->release_date)->format('Y/m/d'),
                'director' => $request->director,
                'running_time' => $request->running_time,
            ]);
            return response()->json(['mess' => 'Cập nhật phim thành công!']);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    public function delete($id){
        try {
            $movie = Movie::find($id);
            $movie->delete();
            return response()->json(['mess' => 'Xóa thành công!!']);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
}