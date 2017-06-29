<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
  public function home(){
    return view('pages.home');
  }

  public function about(){
    return view('pages.about');
  }

  public function blog(){
    $posts = Post::orderBy('id', 'desc')->paginate(10);

    return view('pages.blog')->withPosts($posts);
  }

  public function contact(){
    return view('pages.contact');
  }
}
