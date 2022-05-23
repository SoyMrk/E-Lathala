<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index(Request $request)
    {
        $posts = Post::latest()->with(['user','likes','transactions'])
        ->paginate(20);
       
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function books(Request $request)
    {
        

        $posts = Post::whereNotExists(
            function($query) {
                $query->from('transactions')
                      ->whereColumn('posts.id','transactions.post_id')
                      ->whereNotNull('completed_at');
            }
        )
        ->where('post_type','book')
        ->with(['user','likes'])
        ->paginate(30);

        
        return view('posts.books.books', [
            'posts' => $posts
        ]);
    }

    public function materials(Request $request)
    {        
        $posts = Post::whereNotExists(
            function($query) {
                $query->from('transactions')
                      ->whereColumn('posts.id','transactions.post_id')
                      ->whereNotNull('completed_at');
            }
        )
        ->where('post_type','material')
        ->with(['user','likes'])
        ->paginate(30);

        return view('posts.materials.materials', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        //dd($request);
       // $this->validate($request, [
         //   'body' => 'required'
        //]);
        
        //$request->user()->posts()->create($request->only('body'));
        //working
        $request->user()->posts()->create([
            'body' => $request->description,
            'post_type' => $request->type,
            'title' => $request->title,
            'condition' => $request->condition,
            'category' => $request->category,
            'price' => $request->price
        ]);
        //dd($request);
        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();    
        
        return back();
    }

    

}
