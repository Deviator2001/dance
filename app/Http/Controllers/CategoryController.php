<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function show($name='root')
    {
        // Если запрос пришел не на конкретную категорию, а на раздел категорий, отдаем коллекцию категорий верхнего уровня
        if ($name == 'root')
        {
            $nodes= Category::whereIsRoot()->get();
            $many = true;
            return view('category_show', compact('nodes','many'));
        }
        // Иначе отдаем запрашиваемую категорию
        if ( $node = Category::where('name',$name)->first()) {
            $many = false;
            return view('category_show', compact('node','many'));
        }
        // ну или посылаем на 404 если нет такой
        abort(404);
    }
}
