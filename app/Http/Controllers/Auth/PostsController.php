<?php

namespace App\Http\Controllers\Auth;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only('store');
    }
    public function index(){
        $posts= Post::latest()->paginate(2);
        return view('posts.index', [
            'posts'=>$posts
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'body'=>'required'
        ]);
        $request->user()->posts()->create($request->only('body'));
        return back();
        
    }
}
