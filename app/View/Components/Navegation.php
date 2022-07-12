<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class Navegation extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        $categories = Category::all();
        return view('components.navegation', compact('categories'));
    }
}
