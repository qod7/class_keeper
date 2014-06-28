<?php

class School extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'school';

    public function getHeadMasterName()
    {
    	if($this->hid == 0)
    		return "Not Assigned";
    	return User::where('id', $this->hid)->first()->username;
    }
}