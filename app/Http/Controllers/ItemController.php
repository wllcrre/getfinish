<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;//應該指的是 Item Model
use App\Category;
use Session;//For Message 上傳成功訊息 Session::flash()


class ItemController extends Controller
{
    public function __construct()
    {
        //如果你是login user，就可以訪問item list
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variablel and store all items in it from database
        // $items = Item::all();
        $items = Item::orderBy('id','asc')->paginate(30);
        //example http://getfinish.dev/items?page=2

        //return a view and pass in the about variable
        return view('items.index')->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('items.create')->withCategories($categories);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request,array(
                'name' => 'required|max:255',
                'category_id'   => 'required|integer',
                //驗證唯一項目：　unique:items,slug
                'slug' => 'required|alpha_dash|min:2|max:255|unique:items,slug'  
                //'body' => 'required'

            )); 

        //store in the database
        $item = new Item; //Item is a model

        $item->name = $request->name;
        $item->body = $request->body;
        $item->category_id = $request->category_id;
        $item->slug = $request->slug;

        //kevin heree 待create view更新後修改這裏
        $item->mid = 0;
        $item->status = 'start';
        $item->priority = 'normal';

        $item->save();

        Session::flash('success', '待辦事項已成功建立!');

        //redirect to another URL
        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view('items.show')->withItem($item);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the item in database and save as a var
        $item = Item::find($id);

        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
         // return the view and pass in the var we previously created

        return view('items.edit')->withItem($item)->withCategories($cats);


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
        //　這裏只要執行資料庫更新,不用顯示頁面，因為在 edit() 已經有產生 items.edit 頁面了。

        // Validate the data
        $item = Item::find($id);
        
        if ($request->input('slug') == $item->slug) {

            $this->validate($request, array(
                'name' => 'required|max:255',
                'category_id' => 'required|integer'

                // 'body'  => 'required'
            ));
        } else {
            $this->validate($request, array(
                'name' => 'required|max:255',
                'category_id' => 'required|integer',

                //驗證唯一項目：　unique:items,slug
                'slug' => 'required|alpha_dash|min:2|max:255|unique:items,slug'                
                // 'body' => 'required'
            ));
        }

        // Save the data to the database
        $item = Item::find($id);

        $item->name = $request->input('name');
        $item->slug = $request->input('slug');
        $item->category_id = $request->input('category_id');
        $item->body = $request->input('body');

        $item->save();        

        // set flash data with success message
        Session::flash('success', 'The blog item was successfully save!');

        //redirect with flash data to items.index
        return redirect()->route('categories.index', $item->id);        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        Session::flash('success', "this item successfully delete");
        return redirect()->route('categories.index');

    }
}
