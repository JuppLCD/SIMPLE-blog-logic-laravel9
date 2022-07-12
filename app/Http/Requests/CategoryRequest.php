<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $slug = Str::slug($this->name);
        $id_ignore = $this->route('category')->id ?? '';

        $rules = [
            'name' => 'required',
            'slug' => "required|in:$slug|unique:categories,slug,$id_ignore",
        ];
        return $rules;
    }
}
