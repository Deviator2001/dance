<?php namespace App\Http\Controllers;

use App\FileEntry;
use App\Http\Requests\MyRequest;
use App\User;
use Illuminate\Support\Facades\File;
use Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Finder\Finder;

class PostController extends Controller {

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


            $posts=Post::latest('created_at')->where('Published', '1')->paginate(10);
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
        return view('post.index', ['posts' => $posts]);
        //return view('post.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response

    public function create()
    {
        return view('post.create');//отсылка на вид, содержащий форму
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response

    public function store()
    {
        Post::create([
            'title' => Input::get('title'),
            'author' => Sentinel::getUser()->email,
            'user_id' => Sentinel::getUser()->id,
            'content' => Input::get('content')
        ]);
        //Post::create($myRequest->all());
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     *
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     *
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     *
    public function update($id)
    {
        $post = Post::find($id);

        $post->title = Input::get('title');
        $post->slug = Input::get('slug');
        $post->user_id = Auth::user()->id;
        $post->content = Input::get('content');
        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     *
    public function destroy($id)
    {

        //If (Post::find($id)->user_id == Sentinel::getUser()->id)
        //{
            Post::find($id)->delete();
            File::deleteDirectory(public_path().'/images/postimages/'.$id);
            //Storage::disk('images')->delete('/images/postimages/'.$id);
        //}

        return redirect()->route('post.index');
    }
*/
}
