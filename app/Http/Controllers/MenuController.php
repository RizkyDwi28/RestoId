<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function indexHome()
    {
        $menus = Menu::orderBy('sold','desc')->take(4)->get();

        $data = [
            'menus' => $menus
        ];

        return view('home',$data);
    }

    public function indexSort(int $sort_type){
        if($sort_type==0){
            $menus = Menu::orderBy('id','asc')->paginate(8);
        }
        elseif($sort_type==1){
            $menus = Menu::orderBy('id','desc')->paginate(8);
        }
        elseif($sort_type==2){
            $menus = Menu::orderBy('category_id','asc')->paginate(8);
        }
        elseif($sort_type==3){
            $menus = Menu::orderBy('sold','desc')->paginate(8);
        }
        elseif($sort_type==4){
            $menus = Menu::orderBy('sold','asc')->paginate(8);
        }
        elseif($sort_type==5){
            $menus = Menu::orderBy('price','asc')->paginate(8);
        }
        elseif($sort_type==6){
            $menus = Menu::orderBy('price','desc')->paginate(8);
        }

        $data = [
            'menus' => $menus
        ];

        return view('menu.index',$data);
    }

    public function index()
    {
        // Display a listing of the resource.
        
        $menus = Menu::paginate(8);

        $data = [
            'menus' => $menus
        ];

        return view('menu.index',$data);
    }

    public function indexManage()
    {
        $menus = Menu::paginate(16);

        $data = [
            'menus' => $menus
        ];
        
        return view('menu.manage',$data);
    }

    public function search(Request $request){
        // search a listing of the resource

        $menu_same_name = Menu::where('name', 'LIKE', '%'.$request->name.'%')->paginate(8)->withQueryString();

        $data = [
            'menus' => $menu_same_name
        ];

        session()->flashInput($request->input());
        return view('menu.index',$data);
    }

    public function create()
    {
        // Show the form for creating a new resource.

        $categories = Category::all();

        $data = [
            'categories'=>$categories
        ];

        return view('menu.create',$data);
    }

    public function store(Request $request)
    {
        // Store a newly created resource in storage.
    
        $rules = [
            'name' => 'required|unique:menus,name|max:20',
            'price' => 'required|numeric|min:1000',
            'description' => 'required|string|max:200',
            'image' => 'required|image',
            'category' => 'required|exists:categories,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('image');
        
        $title = preg_replace('/\s+/', '-', strtolower($request->name) );

        $imageName = $title.'.'.$file->getClientOriginalExtension();

        Storage::putFileAs('public/images/', $file, $imageName);
        
        $menu = new Menu();
        
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->sold = 0;
        $menu->description = $request->description;
        $menu->image = $imageName;
        $menu->category_id = $request->category;

        $menu->save();
        
        return redirect(route('menu.manage'))->with('message', 'Successfully add a new menu '.$menu->name.' to database.');
    }

    public function show(int $menu_id)
    {
        // Display the specified resource.
        
        $menu = Menu::find($menu_id);

        $data = [
            'menu'=>$menu
        ];

        return view('menu.show',$data);
    }

    public function edit(int $menu_id)
    {
        // Show the form for editing the specified resource.

        $menu = Menu::find($menu_id);
        $categories = Category::all();

        $data = [
            'menu'=>$menu,
            'categories'=>$categories
        ];

        return view('menu.edit', $data);
    }

    public function update(Request $request, int $menu_id)
    {
        // Update the specified resource in storage.
    
        $rules = [
            'name' => 'required|max:20|unique:menus,name,'.$menu_id,
            'price' => 'required|numeric|min:1000',
            'description' => 'required|string|max:200',
            'newimage' => 'required|image',
            'category' => 'required|exists:categories,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('newimage');
        
        $title = preg_replace('/\s+/', '-', strtolower($request->name) );

        $imageName = $title.'.'.$file->getClientOriginalExtension();

        $menu = Menu::find($menu_id);

        Storage::delete('public/images/'.$menu->image);
        
        Storage::putFileAs('public/images/', $file, $imageName);
        
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->image = $imageName;
        $menu->category_id = $request->category;

        $menu->save();
        
        return redirect(route('menu.manage'))->with('message', 'Successfully update '.$menu->name.' in database.');
    }

    public function destroy(int $menu_id)
    {
        // Remove the specified resource from storage.
    
        $menu = Menu::find($menu_id);
        $menu_name = $menu->name;

        if(isset($menu)){
            Storage::delete('public/images'.$menu->image);
            $menu->delete();
        }

        return redirect()->back()->with('message','Successfully delete '.$menu_name.' from database.');
    }

}
