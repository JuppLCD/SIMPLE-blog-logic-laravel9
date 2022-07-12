<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $slug = Str::slug($this->title);

        // dd($this->slug, $slug, $this->route('post')->id);
        $id_ignore = $this->route('post')->id ?? '';

        $rules = [
            'title' => 'required',
            'slug' => "required|in:$slug|unique:posts,slug,$id_ignore",
            'status' => 'required|in:1,2',
            'image' => 'image'
        ];

        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'extract' => 'required',
                'body' => 'required',
                'category_id' => 'required',
                'tags' => 'required'
            ]);
        }
        return $rules;
    }
}
