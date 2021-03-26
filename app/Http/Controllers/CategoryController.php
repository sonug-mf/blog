<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function list()
    {
        $data = Category::where('status', 'active')->orderBy('name')->get();

        return view('admin.category-list', ['data' => $data]);
    }
    
    public function create($id = null)
    {
        $default = (object) array('name' => '', 'id' => 0);
        $data = $id !== null ? Category::where('id', $id)->first() : $default;

        return view('admin.category-create', ['data' => $data]);
    }

    public function submit(Request $request)
    {
        $this->validate($request, [
            "category_name" => 'required'
        ]);

        $category = new Category();
        $category->name = $request->category_name;
        $category->save();

        return redirect(Route('category.create'));
    }

    public function edit(Request $request)
    {
        $this->validate($request, [
            "category_name" => 'required'
        ]);

        $response = Category::where('id', $request->record)->update([ 'name' => $request->category_name ]);
        
        return redirect(Route('category.create', $request->record));
    }

    public function delete(Request $request, $id = null)
    {
        $data = Category::findOrFail($id);
        if($data){
            Category::where('id', $id)->update(['status' => 'deleted']);
            $type = 'success';
            $message = "Record Deleted Successfully...";
        }else{
            $type = 'danger';
            $message = 'Failed to Delete';
        }

        $request->session()->flash('message', $message);
        $request->session()->flash('type', $type);

        return Redirect::back();
    }
}
