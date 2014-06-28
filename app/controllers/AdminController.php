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

	public function addschool()
	{
		return View::make('addschool');
	}

	public function saveschool()
	{
		$input = Input::all();

		$validator = Validator::make($input,
			array(
				'id' => 'required|unique:school',
				'name' => 'required',
				'totalclasses' => 'required'
				));

		if (!$validator->fails())
		{
			$school= new School();
			$school->id=$input['id'];
			$school->name=$input['name'];
			$school->totalclasses=$input['totalclasses'];
			$school->save();

			return Redirect::route('addschool');
		}
		else
		{
			$errors = $validator->messages()->all();
			return View::make('addschool',array('errors' => $errors));
		}
	}
}