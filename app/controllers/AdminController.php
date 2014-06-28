<?php

class AdminController extends BaseController {
	public function getIndex()
	{
		return "Hello";
	}

	public function ListSchool()
	{
		$schoollist = School::get();
		View::make('schoollist');
	}
}