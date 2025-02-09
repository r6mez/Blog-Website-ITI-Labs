<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User; // Import the User model

class postsController extends Controller
{
    public function __construct(){}

    public function index(){
        $posts = Post::with('user')->get();
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

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'posted_by' => 'required|exists:users,id',
        ]);

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

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'posted_by' => 'required|exists:users,id',
        ]);

        $post = Post::find($id); 
   
        $post->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'posted_by' => $request->input('posted_by'),
            'created_at' => now()->format('d-m-Y'),
        ]);

        return redirect()->route('posts.index');
    }
}