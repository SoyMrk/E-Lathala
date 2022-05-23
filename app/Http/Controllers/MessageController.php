<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Message;
use App\Models\Transaction;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message( Request $request)
    {

        $post = Transaction::latest()->with(['sold_by','bought_by'])
        ->join('posts','transactions.post_id', '=', 'posts.id')
        ->select('posts.*','transactions.id','transactions.bought_by_id','transactions.sold_by_id','transactions.pending_at')
        ->where('transactions.id', $request->id)
        ->get()->first();

        //dd($post);

        $post_id = Transaction::latest()
        ->join('posts','transactions.post_id', '=', 'posts.id')
        ->select('posts.*')
        ->where('transactions.id', $request->id)
        ->get()->first();

        $already = Post::latest()
        ->join('transactions','transactions.post_id', '=', 'posts.id')
        ->select('posts.*','transactions.pending_at',)
        ->where('transactions.post_id',$post_id->id)
        ->whereNotNull('pending_at')
        ->get();

        //dd($already);

        $transMessages = Message::latest('messages.created_at')
        ->join('transactions','messages.transaction_id','=','transactions.id')
        ->join('posts','transactions.post_id', '=', 'posts.id')
        ->select('posts.*','transactions.*','messages.*')
        ->where('transactions.id', $request->id)
        ->get();

        //dd($transMessages);
        
        return  view('messages.message',[
            'post' => $post,
            'transMessages' => $transMessages,
            'already' => $already
        ]);
        
    }

    public function store(Request $request)
    {
        //dd('success');
        $this -> validate($request, [
            'body' => 'required'
        ]);

        
        $request->user()->messages()->create([
            'transaction_id' => $request->transaction_id,
            'message' => $request->body,
        ]);

        return back();
        
    }
}
