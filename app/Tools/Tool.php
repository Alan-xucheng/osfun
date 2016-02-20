<?php namespace App\Tools;

class Tool{

	public function json_return($code,$msg="ok"){

		$result = array("return_code"=>$code,"return_message"=>$msg);

		return response()->json($result);
	}
}
