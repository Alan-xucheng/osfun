<?php

namespace App\Http\Controllers\User;


use Request;
use App\Http\Controllers\Controller;
use App\MessageList;
use Auth;
use App\MessageLog;
use App\User;
use Tool;
use App\UserGroup;
use App\FriendShip;
class MessageController extends Controller
{
    /**
     * 为没个用户完善功能 好友组
     * @param  [type] $id [user_id]
     * @return [type]     [功能组 id]
     */
    public function _createGroup(){

    	$user_id = Auth::guard('user')->user()->id;
    	$black = UserGroup::firstOrCreate(['user_id'=>$user_id,'group_name'=>'黑名单','function'=>'black'])->id;
    	$frequent = UserGroup::firstOrCreate(['user_id'=>$user_id,'group_name'=>'常联系','function'=>'frequent'])->id;
    	$seldom = UserGroup::firstOrCreate(['user_id'=>$user_id,'group_name'=>'不联系','function'=>'seldom'])->id;
    	
    	$data['black'] = $black;
    	$data['frequent'] =$frequent;
    	$data['seldom'] = $seldom;

    	return $data;

    	

    }
    public function getIndex(){


    	$user_id = Auth::guard('user')->user()->id;
    	$lists = MessageList::select('user_extras.nickname','users.id as uid','users.avatar','user_extras.sex','user_extras.sign','message_lists.updated_at','message_lists.id','friend_ships.type as ship_type')
    	->leftJoin('users','users.id','=','message_lists.to_id')
    	->leftJoin('friend_ships','friend_ships.user_id','=','message_lists.user_id')
    	->leftJoin('user_extras','message_lists.to_id','=','user_extras.user_id')
    	->where('message_lists.type','<>','black')
    	->where('message_lists.user_id',$user_id)
    	->get();

    	$lists = $lists->each(function($item)use($user_id){
    		return $item['unread'] = count(MessageLog::where('user_id',$user_id)->where('status','unread')->get());
    	});
    	

    	$data['lists'] = $lists;
 		
    	
    	return view('user.public.message',$data);
    }

    public function getHistory(){


    	$to_id = Request::input('uid');

    	$user_id = Auth::guard('user')->user()->id;

    	if($to_id == $user_id){

    		return back();
    	}
    	$list = MessageList::where('user_id',$user_id)->where('to_id',$to_id)->first();
    	$list_copy = MessageList::where('user_id',$to_id)->where('to_id',$user_id)->first();
    	if(empty($list)){
    		$list = new MessageList();
    		$list->user_id = $user_id;
    		$list->to_id = $to_id;
    		$list->type = "frequent";
    		$list->save();
    	
    	}
    	if(empty($list_copy)){
    	
    		$list_copy = new MessageList();
    		$list_copy->user_id = $to_id;
    		$list_copy->to_id = $user_id;
    		$list->type = "frequent";
    		$list_copy->save();
    	}

    	$logs = MessageLog::where('list_id',$list->id)->update(['status'=>'read']);

    	$logs = MessageLog::where('list_id',$list->id)->get();


    	$to_user = User::select('users.avatar','user_extras.sex','users.id','user_extras.nickname')

    				->leftJoin('user_extras','user_extras.user_id','=','users.id')

    				->where('users.id','=',$to_id)->first();

    	$user = User::select('users.avatar','user_extras.sex','user_extras.nickname')

    				->leftJoin('user_extras','user_extras.user_id','=','users.id')

    				->where('users.id','=',$user_id)->first();	

    	$friend_ship = FriendShip::where('user_id',$user_id)->where('friend_id',$to_id)->first();					
    	$data['friend_ship'] = $friend_ship;
    	$data['to_id'] = $to_id;
    	$data['to_user'] = $to_user;
    	$data['user'] = $user;
    	$data['logs'] = $logs;

        return view('user.public.message_history',$data);
    }
    public function postDeleteMessage(){
    	$user_id = Auth::guard('user')->user()->id;
    	$to_id = Request::input('to_id');

    	$list_id = MessageList::where('user_id',$user_id)->where('to_id',$to_id)->delete();

    	MessageLog::where('list_id',$list_id)->delete();

    	return Tool::json_return(0,'ok');


    }




    public function postApiSave(){

    	//保存两条记录
    	$user_id = Auth::guard('user')->user()->id;

    	$receiver_id = Request::input('receiver_id');

    	$content = Request::input('content');

    	$list = MessageList::where('user_id',$user_id)->where('to_id',$receiver_id)->first();
    	$list_copy = MessageList::where('user_id',$receiver_id)->where('to_id',$user_id)->first();

    	// if(empty($list)){

    	// 	$list = new MessageList();
    	// 	$list->user_id = $user_id;
    	// 	$list->to_id = $receiver_id;
    	// 	$list->save();
    	// 	$list_copy = new MessageList();
    	// 	$list_copy->user_id = $receiver_id;
    	// 	$list_copy->to_id = $user_id;
    	// 	$list_copy->save();

    	// }

    	$log = new MessageLog();
    	$log->list_id = $list->id;
    	$log->user_id = $user_id;
    	$log->sender_id = $user_id;
    	$log->receiver_id = $receiver_id;
    	$log->send_time = time();
    	$log->content = $content;
    	$log->status = "read";
    	$log->save();

    	$log_copy = new MessageLog();
    	$log_copy->list_id = $list_copy->id;
    	$log_copy->user_id = $receiver_id;
    	$log_copy->sender_id = $user_id;
    	$log_copy->receiver_id = $receiver_id;
    	$log_copy->send_time = time();
    	$log_copy->content = $content;
    	$log_copy->status = "unread";
    	$log_copy->save();


    	return Tool::json_return(0,$content);


    }
    public function postAddFriend(){

    	$group_id = Request::input('group');
    	$friend_id = Request::input('friend_id');
    	$user_id = Auth::guard('user')->user()->id;

    	$friend_ship = FriendShip::where('user_id',$user_id)->where('friend_id',$friend_id)->first();
    	if(!empty($friend_ship)){

    		return Tool::json_return(-1,'fails');
    	}

    	$friend_ship = new FriendShip();

    	$friend_ship->user_id = $user_id;
    	$friend_ship->friend_id = $friend_id;
    	$friend_ship->group_id = $group_id;

    	$friend_ship->save();

    	return Tool::json_return(0,'success');

    	
    }

    public function postRemoveFriend(){

    	$friend_id = Request::input('friend_id');
    	$user_id = Auth::guard('user')->user()->id;
    	$friend_ship = FriendShip::where('user_id',$user_id)->where('friend_id',$friend_id)->first();
		if(empty($friend_ship)){

    		return Tool::json_return(-1,'fails');
    	}
    	$friend_ship->delete();

    	return Tool::json_return(0,'ok');
    }
    public function postRemoveBlack(){
    	$friend_id = Request::input('friend_id');
    	$user_id = Auth::guard('user')->user()->id;

    	$friend_ship = FriendShip::where('user_id',$user_id)->where('friend_id',$friend_id)->where('type','black')->first();
    	if(!empty($friend_ship)){
    		MessageList::where('user_id',$user_id)->where('to_id',$friend_id)->where('type','black')->update(['type'=>'']);
    		$friend_ship->delete();
    		
    		return Tool::json_return(0,'success'); 
    	}else{
    		return Tool::json_return(-1,'fails');	
    	}



    	

    }
    public function postBlackFriend(){


    	$friend_id = Request::input('friend_id');
    	$user_id = Auth::guard('user')->user()->id;

    	$friend_ship = FriendShip::where('user_id',$user_id)->where('friend_id',$friend_id)->first();
    	if(!empty($friend_ship)){

    		$friend_ship->type = "black";
    		$friend_ship->save();
    		return Tool::json_return(0,'success'); 
    	}

    	$friend_ship = new FriendShip();

    	$friend_ship->user_id = $user_id;
    	$friend_ship->friend_id = $friend_id;
    	$friend_ship->type = "black";

    	$friend_ship->save();
    	MessageList::where('user_id',$user_id)->where('to_id',$friend_id)->update(['type'=>'black']);

    	return Tool::json_return(0,'success');
    }






    public function postAddGroup(){
    	$user_id = Auth::guard('user')->user()->id;

    	$group_name = Request::input('group_name');

    	$user_group = new UserGroup();
    	$user_group->user_id = $user_id;
    	$user_group->group_name = $group_name;
    	$user_group->save();
    	return Tool::json_return(0,'success');
    }

    public function  postGetGroup(){

    	$user_id = Auth::guard('user')->user()->id;

    	$group = UserGroup::where('user_id',$user_id)->get();
    	$data['group'] = $group;
    	return $data;

    }

    public function postGetGroupinfo(){

    	//分别 获取 黑名单用户  没分组用户  和 分组用户
    	$user_id = Auth::guard('user')->user()->id;

    	//$black = FriendShip::where('user_id',$user_id)->where('type','black')->get();
    	$black = FriendShip::select('users.avatar','user_extras.nickname','friend_ships.*','users.id as uid')

    			->leftJoin('users','users.id','=','friend_ships.friend_id')

    			->leftJoin('user_extras','user_extras.user_id','=','friend_ships.friend_id')
    			->where('friend_ships.user_id',$user_id)

    			->where('friend_ships.type','=','black')

    	

    			->get();

    	//$default = FriendShip::where('user_id',$user_id)->where('type','<>','black')->where('group_id',0)->get();
    	$default = FriendShip::select('users.avatar','user_extras.nickname','friend_ships.*','users.id as uid')

    			->leftJoin('users','users.id','=','friend_ships.friend_id')

    			->leftJoin('user_extras','user_extras.user_id','=','friend_ships.friend_id')
    			->where('friend_ships.user_id',$user_id)

    			->where('friend_ships.type','<>','black')

    			->where('friend_ships.group_id',0)

    			->get();
    	$group = collect(array());
    	$group_array = UserGroup::where('user_id',$user_id)->get();
    	$group_array->each(function($item,$key)use($user_id,$group){

    		$person = FriendShip::select('users.avatar','user_extras.nickname','friend_ships.*','users.id as uid')

    				->leftJoin('users','users.id','=','friend_ships.friend_id')

    				->leftJoin('user_extras','user_extras.user_id','=','friend_ships.friend_id')

    				->where('friend_ships.group_id',$item->id)

    				->where('friend_ships.user_id',$user_id)

    				->where('friend_ships.type',"<>",'black')

    				->get();
    		$group_name['group_name'] = $item->group_name;	
    		$group_name['person'] = $person;	
    		$group_name['id'] = $item->id;	

    		$group->push($group_name);
    	});

    	$data['black'] = $black;

    	$data['normal'] = $default;

    	$data['group'] = $group;



    	return $data;

    }



















}
