<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;//應該指的是 Item Model
use Session;//For Message 上傳成功訊息 Session::flash()


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variablel and store all posts in it from database
        $items = Item::all();

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
        return view('items.create');
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
                //'body' => 'required'
            )); 

        //store in the database
        $item = new Item; //Item is a model

        $item->name = $request->name;
        $item->body = $request->body;

        //kevin heree 待create view更新後修改這裏
        $item->mid = 0;
        $item->status = 'start';
        $item->priority = 'normal';

        $item->save();

        Session::flash('success', '待辦事項已成功建立!');

        //redirect to another URL
        return redirect()->route('items.show',$item->id);

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

        //return the view and pass the item var
        return view('items.edit')->withItem($item);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
