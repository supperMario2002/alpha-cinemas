<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'slug' => 'required',
            'img' => 'required',
            'descrition' => 'required',
            'release_date' => 'required',
            'director' => 'required',
            'running_time' => 'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Tên phim không được để trống!',
            'slug.required' => 'Slug phim không được để trống!',
            'img.required' => 'Ảnh phim không được để trống!',
            'descrition.required' => 'Mô tả phim không được để trống!',
            'release_date.required' => 'Ngày phát hành không được để trống!',
            'director.required' => 'Tên tác giả không được để trống!',
            'running_time.required' => 'Thời lượng phim không được để trống!'
        ];
    }
}
