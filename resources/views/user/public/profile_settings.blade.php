@extends('user.layout.layout')

@section('styles')

<link rel="stylesheet" href="/assets/css/pages/profile.css">
<link rel="stylesheet" href="/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">

@endsection

@section('content')
    <div class="container content profile">
    	<div class="row">
            <!--Left Sidebar-->
       		@include('user.component.profile_leftbar')	
            <!--End Left Sidebar-->

            <!-- Profile Content -->
         	    <div class="col-md-9">
                <div class="profile-body margin-bottom-20">
                    <div class="tab-v1">
                        <ul class="nav nav-justified nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#profile">基本设置</a></li>
                            <li><a data-toggle="tab" href="#passwordTab">密码修改</a></li>
                          
                          <!--   <li><a data-toggle="tab" href="#settings">账号绑定</a></li> -->
                        </ul>
                        <div class="tab-content">
                            
                            <div id="profile" class="profile-edit tab-pane fade in active">
                            <div class="pro-block">
                            <h2 class="heading-md">为了您更好的体验，请务必填写以下信息。</h2>
                            </br>


                            <dl class="dl-horizontal">
                                <dt><strong>昵称</strong></dt>
                                <dd>
                                    {{$user_extra->nickname}}
                                    
                                </dd>
                                <hr>
                                <dt><strong>性别</strong></dt>
                                <dd>
                                    {{$user_extra=="male"?'男':'女'}}
                                   
                                </dd>
                                <hr>
                                <dt><strong>生日</strong></dt>
                                <dd>
                                    {{date('Y-m-d',$user_extra->birth)}}
                                   
                                </dd>
                                <hr>
                                <dt><strong>地址</strong></dt>
                                <dd>
                                    {{$user_extra->province}}-{{$user_extra->city}}-{{$user_extra->country}}
                              
                                </dd>
                                <hr>
                                <dt><strong>个性签名</strong></dt>
                                <dd>
                                    {{$user_extra->sign}}
                                   
                                </dd>
                                <hr>
                      
                            </dl>
                            <button class="btn-u" id="editProfile">信息不全？修改</button>
                            </div>
                            <form class="sky-form" id="profileForm" style="display: none;">
                                <fieldset>
                                <section>
                                    <div class="row">
                                        <label class="label col col-2">昵称</label>
                                        <div class="col col-10">
                                            <label class="input" for="nickname">
                                             
                                                <input type="text" value="{{$user_extra->nickname}}" id="nickname" placeholder="昵称" name="nickname">
                                            </label>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <div class="row">
                                        <label class="label col col-2">性别</label>
                                        <div class="col col-4">
                                            <label class="input" for="sex">
                                                  <label class="select">
                                                      <select name="sex">
                                                        <option value="male"{{$user_extra->sex=='male'?'selected':''}}>男</option>
                                                        <option value="female" {{$user_extra->sex=='female'?'selected':''}}>女</option>
                                                      </select>
                                                      <i></i>
                                                  </label>
                                            </label>
                                        </div>
                                    </div>
                                </section>

                                <section>
                                    <div class="row">
                                        <label class="label col col-2">生日</label>
                                              <section class="col col-4">
                                                  <label class="select">
                                                      <select name="year" id="sel_year" rel="{{date('Y',$user_extra->birth)}}">
                                                      </select>
                                                      <i></i>
                                                  </label>
                                              </section>

                                              <section class="col col-3">
                                                 <label class="select">
                                                     <select name="month" id="sel_month" rel="{{date('m',$user_extra->birth)}}">
                                                     </select>
                                                     <i></i>
                                                 </label>
                                              </section>

                                              <section class="col col-3">
                                              <label class="select">
                                                  <select name="day" id="sel_day" rel="{{date('d',$user_extra->birth)}}">
                                                  </select>
                                                  <i></i>
                                              </label>
                                              </section>
                                    
                                        </div>
                                 
                                </section>
                                     <section>

                                    <div class="row" id="city">
                                        <label class="label col col-2">地址</label>
                                              <section class="col col-4">
                                                  <label class="select">
                                                      <select name="province" class="prov">
                                                      </select>
                                                      <i></i>
                                                  </label>
                                              </section>

                                              <section class="col col-3">
                                                 <label class="select">
                                                     <select name="city" class="city">
                                                     </select>
                                                     <i></i>
                                                 </label>
                                              </section>

                                              <section class="col col-3">
                                              <label class="select">
                                                  <select name="country" class="dist">
                                                  </select>
                                                  <i></i>
                                              </label>
                                              </section>
                                    
                                        </div>
                                 
                                </section>
                                     </section>
                                     <section>

                                    <div class="row">
                                        <label class="label col col-2">个性签名</label>
                                            <section class="col col-10">
                                                <label class="textarea">
                                                    <textarea rows="3" name="sign" placeholder="说点什么吧！">{{$user_extra->sign}}</textarea>
                                                </label>
                                            </section>
                                    
                                        </div>
                                 
                                </section>

                          
                            </fieldset>
                            <footer>
                               
                                <button type="submit" class="btn-u">保存修改</button>
                            </footer>  
                             </form>  
                            </div>
                           


                            <div id="passwordTab" class="profile-edit tab-pane fade">
                                <h2 class="heading-md">管理密码</h2>
                          
                                <br>
                                <form class="sky-form" id="sky-form4" action="#">
                                    <dl class="dl-horizontal">
                            
                                        <dt>原密码</dt>
                                        <dd>
                                            <section>
                                                <label class="input">
                                                    <i class="icon-append fa fa-envelope"></i>
                                                     <input type="password" id="password" name="password" placeholder="Password">
                                                    <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                                                </label>
                                            </section>
                                        </dd>
                                        <dt>新密码</dt>
                                        <dd>
                                            <section>
                                                <label class="input">
                                                    <i class="icon-append fa fa-lock"></i>
                                                    <input type="password" id="password" name="password" placeholder="Password">
                                                    <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                                </label>
                                            </section>
                                        </dd>
                                        <dt>重新输入新密码</dt>
                                        <dd>
                                            <section>
                                                <label class="input">
                                                    <i class="icon-append fa fa-lock"></i>
                                                    <input type="password" name="passwordConfirm" placeholder="Confirm password">
                                                    <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                                </label>
                                            </section>
                                        </dd>
                                    </dl>
                                
                    
                                    <button class="btn-u" type="submit">Save Changes</button>
                                </form>
                            </div>

           
<!-- 
                            <div id="settings" class="profile-edit tab-pane fade">
                                <h2 class="heading-md">管理社交账号绑定</h2>
                               
                                <form class="sky-form" id="sky-form3" action="#">
                                    <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Email notification</label>
                                    <hr>
                                    <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Send me email notification when a user comments on my blog</label>
                                    <hr>
                                    <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Send me email notification for the latest update</label>
                                    <hr>
                                    <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Send me email notification when a user sends me message</label>
                                    <hr>
                                    <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Receive our monthly newsletter</label>
                                    <hr>
                                    <button type="button" class="btn-u btn-u-default">Reset</button>
                                    <button class="btn-u" type="submit">Save Changes</button>
                                </form>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div><!--/container-->


@endsection

@section('scripts')
<script type="text/javascript" src="/assets/plugins/counter/waypoints.min.js"></script>
<script type="text/javascript" src="/assets/plugins/counter/jquery.counterup.min.js"></script>
<script type="text/javascript" src="/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="/libs/birthday/birthday.js"></script>
<script type="text/javascript" src="/libs/cityselect/js/jquery.cityselect.js"></script>
<script type="text/javascript" src="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js"></script> 





@endsection

@section('jquery')

  App.initCounter();
  App.initScrollBar();
  ProfileSocial.setPicker();
  ProfileSocial.profileForm();


    


@endsection










