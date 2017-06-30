<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoriesController extends Controller
{

  public function __construct(){

    $this->middleware('auth');

  }

  public function index() {

    $categories = Category::orderBy('id', 'desc')->paginate(5);

    return view('categories.index')->withCategories($categories);

  }

  public function store(Request $request) {
    $this->validate($request,[
      'name' => 'required|max:50|unique:categories'
    ]);

    $category = new Category;

    $category->name = $request->name;

    $category->save();

    Session::flash('success', 'You successfully created category ! Cheeers !');

    return redirect()->route('categories.index');
  }

  public function show($id) {

    $category = Category::find($id);

    return view('categories.show')->withCategory($category);
  }

  public function edit($id) {

    $category = Category::find($id);

    return view('categories.edit')->withCategory($category);
  }

  public function update(Request $request, $id) {
    $this->validate($request,[
      'name' => 'required|max:50'
    ]);

    $category = Category::find($id);

    $category->name = $request->name;

    $category->save();

    Session::flash('success', 'You successfully updated category ! Cheeers !');

    return redirect()->route('categories.index');
  }

  public function destroy($id)
  {
    $category = Category::find($id);

    $category->delete();

    Session::flash('success', 'Category was successfully deleted !');

    return redirect()->route('categories.index');
  }
}
