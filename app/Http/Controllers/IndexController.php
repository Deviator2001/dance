<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{

    public function __construct()
    {
        // $this -> data = []; //создали массив данных, который потом можно будет передавать через вид
        //$this->data ['menu']['left'] = $menuModel->getRightMenu();
        //$this->data ['menu']['right'] = $menuModel->getRightMenu();

    }

    public function index()
    {
        return view('about');
    }
    public function contacts()
    {
        return view('contacts');
    }
    public function trainers()
    {
        return view('trainers');
    }
    public function styles()
    {
        return view('styles');
    }

}
