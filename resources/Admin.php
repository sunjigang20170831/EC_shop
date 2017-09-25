<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $table = 'user';

	public function index($request)
	{
		$name = $request->input('name');
		$ob = $this->where(['name' => $name, 'status' => '2'])->first();
		
    

		
		//dd($ob);
		if($ob){
			if($request->input('pass') == $ob->pass){
				return $ob;
			}else{
				return null;
			}
		}else{
			return null;
		
		
		}
	}
}
