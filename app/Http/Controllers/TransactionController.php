<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        dd('sada');
        $boughts = Transaction::latest('transactions.created_at')->with(['bought_by','sold_by'])
        ->join('posts', 'transactions.post_id', '=', 'posts.id') 
        ->select('posts.*','transactions.*')
        ->whereNull('pending_at')
        ->where('bought_by_id',$request->user()->id)
        ->paginate(20);

        $solds = Transaction::latest('transactions.created_at')->with(['sold_by','bought_by'])
        ->join('posts', 'transactions.post_id', '=', 'posts.id') 
        ->select('posts.*','transactions.*')
        ->whereNull('pending_at')
        ->where('sold_by_id',$request->user()->id)
        ->paginate(20);
        
        return view('transactions.index', [
            'boughts' => $boughts,
            'solds' => $solds
        ]);
    }


    public function bought(Request $request)
    {

        $boughts = Transaction::latest('transactions.created_at')->with(['bought_by','sold_by'])
        ->join('posts', 'transactions.post_id', '=', 'posts.id') 
        ->select('posts.*','transactions.*')
        ->where('bought_by_id',$request->user()->id)
        ->whereNotNull('completed_at')
        ->paginate(20);
        
        return view('transactions.bought', [
            'boughts' => $boughts
        ]);
    }

    public function sold(Request $request)
    {
        $solds = Transaction::latest('transactions.created_at')->with(['sold_by','bought_by'])
        ->join('posts', 'transactions.post_id', '=', 'posts.id') 
        ->select('posts.*','transactions.*')
        ->whereNotNull('completed_at')
        ->where('sold_by_id',$request->user()->id)
        ->paginate(20);
        
        return view('transactions.sold', [
            'solds' => $solds
        ]);
    }

    public function store(Request $request, Post $post) 
    {   
        //WORKING
        //dd('success');
        $transaction = Transaction::create([
            'post_id' => $post->id,
            'bought_by_id' => $request->user()->id,
            'sold_by_id' => $post->user->id
        ]);

        return back();
    }

    public function sell(Request $request)
    {
        $sell = DB::table('transactions')
            ->where('id', $request->transaction_id)
            ->update(['pending_at' => now()]);

        return back();
    }

    public function buy(Request $request)
    {
      
        $buy = DB::table('transactions')
            ->where('id', $request->transaction_id)
            ->update(['completed_at' => now()]);

        $deleting = DB::table('transactions')
            ->whereNull('completed_at')
            ->delete();

        return redirect()->route('messages',['id'=>$request->transaction_id])
        ->with('status', 'Transaction Completed');
    }
    
    public function destroy(Post $post, Request $request)
    {
        
        $request->user()->boughts()->where('post_id', $post->id)->delete();
        return back();
    }

    public function transaction(Request $request)
    {
        
        $boughts = Transaction::latest('transactions.created_at')->with(['bought_by','sold_by'])
        ->join('posts', 'transactions.post_id', '=', 'posts.id') 
        ->select('posts.*','transactions.*')
        ->whereNull('completed_at')
        ->where('bought_by_id',$request->user()->id)
        ->get();
      
        $solds = Transaction::latest('transactions.created_at')->with(['sold_by','bought_by'])
        ->join('posts', 'transactions.post_id', '=', 'posts.id') 
        ->select('posts.*','transactions.*')
        ->whereNull('completed_at')
        ->where('sold_by_id',$request->user()->id)
        ->get();
        
        return view('transactions.transaction', [
            'boughts' => $boughts,
            'solds' => $solds
        ]);

    }

}
