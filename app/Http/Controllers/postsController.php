<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User; // Import the User model
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class postsController extends Controller
{
    public function __construct(){}

    public function index(){
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(3);
        return view('postsView', ['posts' => $posts]);
    }

    public function show($id){
        $post = Post::with('user')->find($id); 
        return view('post', ['post' => $post]);
    }

    public function create(){
        $users = User::all(); // Get all users
        return view('create', ['users' => $users]);
    }

    public function store(StorePostRequest $request){
        Post::create([ 
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'posted_by' => $request->input('posted_by'),
            'created_at' => now()->format('d-m-Y'),
        ]);

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id); 
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::find($id); 
        $users = User::all(); 
        return view('edit', ['post' => $post, 'users' => $users]);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id); 
   
        $post->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'posted_by' => $request->input('posted_by'),
        ]);

        return redirect()->route('posts.index');
    }
}