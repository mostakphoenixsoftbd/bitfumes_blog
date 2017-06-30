<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

      $this->middleware('auth');

    }

    public function index()
    {
      $posts = Post::orderBy('id', 'desc')->paginate(5);

      return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::pluck('name', 'id');

      return view('posts.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'title'       => 'required|unique:posts|max:255',
        'category_id' => 'required|integer',
        'slug'        => 'required|alpha_dash|unique:posts|min:5|max:255',
        'body'        => 'required'
      ]);

      $post = new Post;

      $post->title = $request->title;
      $post->category_id = $request->category_id;
      $post->slug = $request->slug;
      $post->body = $request->body;
      $post->user_id = Auth::user()->id;

      $post->save();

      Session::flash('success', 'Post was successfully created !');

      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::find($id);

      return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categories = Category::pluck('name', 'id');

      $post = Post::find($id);

      if ( $post->user_id !== Auth::user()->id )

      {
        Session::flash('danger', 'you are not authorized to edit this post !');

        return redirect()->route('posts.index');
      }

      return view('posts.edit')->withPost($post)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'title' => 'required|max:255',
        'category_id' => 'required|integer',
        'slug'  => 'required|alpha_dash|min:5|max:255',
        'body'  => 'required'
      ]);

      $post = Post::find($id);

      $post->title = $request->title;
      $post->category_id = $request->category_id;
      $post->slug = $request->slug;
      $post->body = $request->body;

      $post->save();

      Session::flash('success', 'Post was successfully updated !');

      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);

      if ( $post->user_id !== Auth::user()->id )

      {
        Session::flash('danger', 'you are not authorized to edit this post !');

        return redirect()->route('posts.index');
      }

      $post->delete();

      Session::flash('success', 'Post was successfully deleted !');

      return redirect()->route('posts.index');
    }
}
