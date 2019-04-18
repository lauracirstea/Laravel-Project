<?php
/**
 * Created by PhpStorm.
 * User: Laura
 * Date: 07.04.2019
 * Time: 19:07
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);
        return redirect('/');
    }

    public function getById($id)
    {
        $post = Post::find($id);
        return view('modals.modal-post', compact('post'));
    }

    public function update(Request $request , $id)
    {
        Post::find($id)->update($request->all());
        return ['success' => true];
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return ['success' => true];
    }
}