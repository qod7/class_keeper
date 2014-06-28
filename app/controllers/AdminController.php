<?php

class AdminController extends BaseController {

	public function __construct()
	{
		$this->Data = array();
		$this->Data['menuindex'] = 1;
	}
	public function ListSchool()
	{
		$this->Data['schools'] = School::get();
		return View::make('schoollist',$this->Data);
	}
}