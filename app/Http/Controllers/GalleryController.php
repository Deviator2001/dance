<?php namespace App\Http\Controllers;

use App\FileEntry;
use App\gallery;
use App\Http\Requests\MyRequest;
use App\User;
use Illuminate\Support\Facades\File;
use Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Finder\Finder;

class GalleryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        //$q = Input::get('q');
        //if(empty ($q))
        //{

        //$posts = DB::table('posts')->leftJoin('file_entry_tables', 'post_id', '=', 'posts.id')->paginate(10);
        //$images = FileEntry::all();


        $gallerys=gallery::latest('created_at')->where('published', '1')->paginate(10);
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
        return view('gallery.index', ['gallerys' => $gallerys]);

    }

}
