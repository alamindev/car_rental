<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('deleted_at', null)->orderby('id', 'DESC')->get();
        return view('admin.category.category', compact('category'));
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
            'cate_name' => 'required',
        ]);
        $category = new Category();
        $category->cate_name = $request->cate_name;
        $category->save();
        if ($category) {
            Session::flash('message', 'Category add SuccessFully!');
            return redirect(route('category'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('deleted_at', null)->orderby('id', 'DESC')->get();
        $edit = Category::where('deleted_at', null)->where('id', $id)->first();
        return view('admin.category.category-edit', compact('edit', 'category'));
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
            'cate_name' => 'required',
        ]);
        $category = Category::findOrFail($id);
        $category->cate_name = $request->cate_name;
        $category->save();
        if ($category) {
            Session::flash('update', 'Category Updated SuccessFully!');
            return redirect(route('category'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Category::findOrFail($id)->delete();
        if ($destroy) {
            Session::flash('delete', 'Delete succefully!');
            return redirect(route('category'));
        }
    }
}
