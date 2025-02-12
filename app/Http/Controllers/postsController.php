<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User; 
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class postsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $posts = Post::withTrashed()->with('user')
            ->where(function($query) {
                $query->whereNull('deleted_at')
                      ->orWhere('posted_by', auth()->id());
            })
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        return view('home', ['posts' => $posts]);
    }

    public function show($id){
        $post = Post::withTrashed()->with('user')->find($id); 
        if ($post->trashed() && $post->posted_by != auth()->id()) {
            return redirect()->route('unauthorized');
        }
        return view('posts/post', ['post' => $post]);
    }

    public function create(){
        $users = User::all(); 
        return view('posts/create', ['users' => $users]);
    }

    public function store(StorePostRequest $request){
        $data = $request->only(['title', 'body', 'posted_by']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        Post::create($data);

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id); 
        if ($post->posted_by != auth()->id()) {
            return redirect()->route('unauthorized');
        }

        $post->delete();
        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::find($id); 
        if ($post->posted_by != auth()->id()) {
            return redirect()->route('unauthorized');
        }
        $users = User::all(); 
        return view('posts/edit', ['post' => $post, 'users' => $users]);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id); 
        if ($post->posted_by != auth()->id()) {
            return redirect()->route('unauthorized');
        }

        $data = $request->only(['title', 'body', 'posted_by']);
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        $post->update($data);

        return redirect()->route('posts.index');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->find($id);
        if ($post->posted_by != auth()->id()) {
            return redirect()->route('unauthorized');
        }

        $post->restore();

        return redirect()->route('posts.index');
    }
}