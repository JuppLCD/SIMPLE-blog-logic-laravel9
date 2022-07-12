<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Str;

class TagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $slug = Str::slug($this->name);
        $id_ignore = $this->route('tag')->id ?? '';

        $rules = [
            'name' => 'required',
            'slug' => "required|in:$slug|unique:tags,slug,$id_ignore",
        ];
        return $rules;
    }
}
