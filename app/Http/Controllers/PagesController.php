<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

	public function getIndex() {
		return view('pages/welcome');
	}

	public function getContact() {
		return view('pages/contact');
	}

	public function getAbout() {
		return view('pages.about');
		//return "about page";
	}
}



