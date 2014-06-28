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

	public function ListClasses($id)
	{
		//list classes for the school
		if(School::where('id',$id)->count()  == 0)
			app::abort(404);
		echo "This is clas list";
	}

	public function DeleteTeacher($id)
	{
		if(User::where('id',$id)->count() > 0)
		{
			$schoolid = User::where('id', $id)->first()->school_id;
			User::where('id', $id)->first()->delete();
			return Redirect::to('/school/listteacher/'.$schoolid);
		}
		return Redirect::route('listschool');
	}

	public function MakeHeadMaster($id)
	{
		if(User::where('id',$id)->count() == 0)
			App::abort(404);
		//get the school ID of the user
		$user = User::where('id',$id)->first();
		$schoolid = $user->school_id;
		//search for other teachers of the same school 
		//and remove them from head master
		$others = User::where('school_id',$schoolid)->get();
		foreach($others as $teacher)
			if($teacher->role == 1)
			{
				$teacher->role = 0;
				$teacher->save();
			}
		$user->role = 1;
		$user->save();
		return Redirect::to('/school/listteacher/'.$schoolid);
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

			//create all the classes for the school
			for($i=0; $i < $school->totalclasses; $i++)
			{
				$class = new Cclass();
				$class->grade = $i+1;
				$class->totalstudents = 0;
				$class->schoolid = $school->id;
				$class->routine = '';
				$class->save();
			}

			return Redirect::route('addschool');
		}
		else
		{
			$errors = $validator->messages()->all();
			return View::make('addschool',array('errors' => $errors));
		}
	}
}