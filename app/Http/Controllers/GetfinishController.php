<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class GetfinishController extends Controller
{
    
	public function getIndex() {
		$items = Item::paginate(10);

		return view('getfinish.index')->withItems($items);
	}


    public function getSingle($slug) {
    	//return $slug;

    	//fetch from the DB based on slug
    	$item = Item::where('slug', '=', $slug)->first();

    	// return the view and pass in the item object
    	return view('getfinish.single')->withItem($item);
    }

}
