<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagsController extends Controller
{
  public function __construct(){

    $this->middleware('auth');

  }

  public function index() {

    $tags = Tag::orderBy('id', 'desc')->paginate(5);

    return view('tags.index')->withTags($tags);

  }

  public function store(Request $request) {
    $this->validate($request,[
      'name' => 'required|max:50|unique:tags'
    ]);

    $tag = new Tag;

    $tag->name = $request->name;

    $tag->save();

    Session::flash('success', 'You successfully created tag ! Cheeers !');

    return redirect()->route('tags.index');
  }

  public function show($id) {

    $tag = Tag::find($id);

    return view('tags.show')->withTag($tag);
  }

  public function edit($id) {

    $tag = Tag::find($id);

    return view('tags.edit')->withTag($tag);
  }

  public function update(Request $request, $id) {
    $this->validate($request,[
      'name' => 'required|max:50'
    ]);

    $tag = Tag::find($id);

    $tag->name = $request->name;

    $tag->save();

    Session::flash('success', 'You successfully updated tag ! Cheeers !');

    return redirect()->route('tags.index');
  }

  public function destroy($id)
  {
    $tag = Tag::find($id);

    $tag->delete();

    Session::flash('success', 'Tag was successfully deleted !');

    return redirect()->route('tags.index');
  }
}
