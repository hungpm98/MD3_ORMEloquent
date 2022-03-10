<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index()
    {
        $posts = DB::table('posts')->get();
        return view('backend.Post.list',compact('posts'));
    }


    public function create()
    {
        return view('backend.Post.create');
    }


    public function store(Request $request)
    {
        $data = $request->only('content','user_id');
        DB::table('posts')->insert($data);
        return redirect()->route('post.index');
    }


    public function show($id)
    {
        $posts = DB::table('posts')
        ->join('users','users.id','=','posts.user_id')
        ->select('posts.*','users.name')
        ->where('posts.id',$id)
        ->first();
        // dd($posts);
        return view('backend.Post.detail',compact('posts'));
    }


    public function edit($id)
    {
        $posts = DB::table('posts')->where('id',$id)->first();
        return view('backend.Post.edit',compact('posts'));

    }


    public function update(Request $request, $id)
    {
        $data = $request->only('content','user_id');
        DB::table('posts')->where('id',$id)->update($data);
        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        DB::table('posts')->where('id',$id)->delete();
        return redirect()->route('post.index');
    }
}
