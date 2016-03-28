<?php namespace App\Tools;

use Intervention\Image\Facades\Image;
use Storage;
use Request;
use App\China;

//工具类 图片上传类



class Tool{

	public function json_return($code,$msg="ok"){

		$result = array("return_code"=>$code,"return_message"=>$msg);

		return response()->json($result);
	}

	public function _get_file_path(){
		$yearDir = 'uploads/'.date('Y');
		$monthDir = $yearDir.'/'.date('m');
		$dayDir = $monthDir.'/'.date('d').'/';

		if(Storage::exists($dayDir)){

			return $dayDir;
		}

		if(!Storage::exists($dayDir)){
			$ret = Storage::makeDirectory($dayDir);
		}
		return $dayDir;
	}
	public function _upload_file($fileName,$prefix){
		$result = array();

		$file =  Request::file($fileName);
		if(empty($file)){
			return false;
		}

		$result['file'] = $file;
		if(!empty($file) && $file->isValid()){
			$fileDir = $this->_get_file_path();

			$newFileName = uniqid($prefix).$file->getClientOriginalName();

			$url = url($fileDir.$newFileName);
			$file->move(public_path().DIRECTORY_SEPARATOR.$fileDir,$newFileName);
	
	        
			$result['url'] = $url;
			$result['file'] = $newFileName;
			$result['type'] = $file->getClientOriginalExtension();
			$result['path'] = $fileDir;
	       
			$result['name'] = $file->getClientOriginalName();
			$result['size'] = $file->getClientSize();
			return $result;
		}
		return $result;

	}

	public function get_location_number($province){

		return China::where('name',$province)->first()->id;
	
	}


	public function _date_format($unixtime){

		$today =  strtotime(date('Y-m-d',time()));

		$diff = $unixtime-$today;

		if($diff>0 and $diff<86400){

			return "今天 ".date('H:i',$unixtime);

		}elseif ($diff<0 and $diff> -86400) {

			return "昨天 ".date('H:i',$unixtime);

		}else{

			return  date('Y-m-d H:i',$unixtime);
		}

	}























}
