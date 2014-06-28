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

	public function DeleteSchool($id)
	{
		if(School::where('id',$id)->count() > 0)
			School::where('id', $id)->first()->delete();
		return Redirect::route('listschool');
	}

	public function ListTeachers($id)
	{
		if(School::where('id',$id)->count()  == 0)
			app::abort(404);
		$school = School::where('id',$id)->first();
		$teachers = User::where('school_id',$school->id)->get();
		$this->Data['school'] = $school;
		$this->Data['teachers'] = $teachers;
		return View::make('teacherlist',$this->Data);
	}

	public function saveschool()
	{
		$input = Input::all();

		$validator = Validator::make($input,
			array(
				'id' => 'required|unique:school',
				'name' => 'required'
				));

		if (!$validator->fails())
		{
			$school= new School();
			$school->id=$input['id'];
			$school->name=$input['name'];
			$school->totalclasses=$input['totalclasses'];
			$school->save();

			return Redirect::route('home');
		}
		else
		{
			$errors = $validator->messages()->all();
			return View::make('addschool',array('errors' => $errors));
		}
	}
}