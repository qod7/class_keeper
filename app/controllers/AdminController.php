<?php

class AdminController extends BaseController {
	public function getIndex()
	{
		return "Hello";
	}

	public function ListSchool()
	{
		$schoollist = School::get();
		return View::make('schoollist');
	}

	public function addschool()
	{
		return View::make('addschool');
	}
}