<?php

namespace App\Http\Controllers;

use App\Style;
use Illuminate\Http\Request;

use App\Http\Requests;

class StyleController extends Controller
{
    public function index()
    {


        $styles = Style::all();
        //$posts=Post::paginate(10);
        //$posts = Post::with('images')->paginate(3);
        //$images = Post::find(1)->images();
        //$posts=DB::table('posts')->get();
        //$posts=Post::all()->lists('title');
        //$posts=Post::all()->where('title', 'First Post');
        //$posts=DB::table('posts')->where('title', 'First Post')->get();

        //}
        //else
        //{
        //    $posts = Post::with('images')->where('title', 'LIKE', "%$q%")->orWhere('content', 'LIKE', "%$q%")->paginate(5);
        //}
        return view('styles', ['styles' => $styles]);
    }
}
