<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        $data=[
            "posts"=>$posts
        ];
        return view('all_post',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user=$request->user();
        $post=new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        $user->post()->save($post);
        return redirect(route('post_create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $post=Post::find($id);
        if(Gate::denies('isAdmin',$post)){
            abort(403,"You are not allowed to access this page.");
        }
        $data['post']=$post;
        return view('edit_post',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $post=Post::find($id);
        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();
        return redirect(route('post_index'))->with('status',"Post Updated Successfully");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Post::destroy($id);
        return redirect(route('post_index'))->with('status',"Post Deleted Successfully");
    }
}
