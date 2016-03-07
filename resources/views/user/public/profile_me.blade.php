@extends('user.layout.layout')

@section('styles')

<link rel="stylesheet" href="/assets/css/pages/profile.css">
<link rel="stylesheet" href="/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">
<style>
  .cropit-preview {
    background-color: #f8f8f8;
    background-size: cover;
    border: 1px solid #ccc;
    border-radius: 3px;
    margin-top: 7px;
    width: 250px;
    height: 250px;
  }

  .cropit-preview-image-container {
    cursor: move;
  }

  .image-size-label {
    margin-top: 10px;
  }

  input {
    display: block;
  }

  button[type="submit"] {
    margin-top: 10px;
  }

  #result {
    margin-top: 10px;
    width: 900px;
  }

  #result-data {
    display: block;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    word-wrap: break-word;
  }
</style>
@endsection

@section('content')
    <div class="container content profile">
        <div class="row">
            <!--Left Sidebar-->
            @include('user.component.profile_leftbar')  
            <!--End Left Sidebar-->

            <!-- Profile Content -->
          <div class="col-md-9">
              <div class="profile-body">
                  <div class="profile-bio">
                      <div class="row">
                          <div class="col-md-5">
                              
                              <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                          <div class="modal-dialog modal-lg">
                                                              <div class="modal-content">
                                                                  <div class="modal-header">
                                                                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                                      <h4 id="myLargeModalLabel2" class="modal-title">Large Modal</h4>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                     <form action="#">
                                                                       <div class="image-editor">
                                                                         <input type="file" class="cropit-image-input">
                                                                         <div class="cropit-preview"></div>
                                                                         <div class="image-size-label">
                                                                           更改图片大小
                                                                         </div>
                                                                         <input type="range" class="cropit-image-zoom-input">
                                                                         <input type="hidden" name="image-data" class="hidden-image-data" />
                                                                         <button type="submit">Submit</button>
                                                                       </div>
                                                                     </form>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                              <img class="img-responsive md-margin-bottom-10" src="{{$auth->avatar?$auth->avatar:'/assets/img/team/img32-md.jpg'}}" alt="">
                              <a style="left:48%;" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn-u btn-u-sm" href="#">更换头像</a>
                          </div>
                          <div class="col-md-7">
                             
                              <h2 style="position: relative;">{{!empty($userExtra)?$userExtra->nickname:'请填写昵称'}}

                              <a  style="position: absolute;left:100%;bottom:2px;" href="{{url('/user/home/profile-info')}}"><i class="fa fa-cog "></i></a></h2>
                              
                              
                          
                              <span><strong>性别:</strong> {{!empty($userExtra)?$userExtra->sex:''}}</span>
                              <span><strong>年龄:</strong> {{!empty($userExtra)?$userExtra->age:''}}</span>
                              <hr>
                              <p>{{!empty($userExtra)?$userExtra->desc:''}}</p>
                              
                          </div>
                      </div>
                  </div><!--/end row-->

                  <hr>

                  <div class="row">
                      <!--Social Icons v3-->
                      <div class="col-sm-6 sm-margin-bottom-30">
                          <div class="panel panel-profile">
                              <div class="panel-heading overflow-h">
                                  <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i>社交账号</h2>
                                  <a href="{{url('/user/home/profile-social')}}"><i class="fa fa-cog pull-right"></i></a>
                              </div>
                              <div class="panel-body">
                                   <ul class="list-unstyled social-contacts-v2">
                                      <li><i class="rounded-x tw fa fa-qq"></i> <a href="#">{{!empty($social)?$social->qq:''}}</a></li>
                                      <li><i class="rounded-x fb fa fa-phone"></i> <a href="#">{{!empty($social)?$social->phone:''}}</a></li>
                                      <li><i class="rounded-x sk fa fa-envelope"></i> <a href="#">{{!empty($social)?$social->email:''}}</a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <!--End Social Icons v3-->

                      <!--Skills-->
                      <div class="col-sm-6 sm-margin-bottom-30">
                          <div class="panel panel-profile">
                              <div class="panel-heading overflow-h">
                                  <h2 class="panel-title heading-sm pull-left"><i class="fa fa-lightbulb-o"></i> 特长爱好</h2>
                                  <a href="{{url('/user/home/profile-skills')}}"><i class="fa fa-cog pull-right"></i></a>
                              </div>
                              <div class="panel-body">

                                  @foreach($skills as $skill)
                                  <small>{{$skill->name}}</small>
                                  <small></small>
                                  <div class="progress progress-u progress-xxs">
                                      <div style="width: {{$skill->mark/4}}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">
                                      </div>
                                  </div>
                                  @endforeach

                             
                              </div>
                          </div>
                      </div>
                      <!--End Skills-->
                  </div><!--/end row-->

                  <hr>

                  <!--Timeline-->
                  <div class="panel panel-profile">
                      <div class="panel-heading overflow-h">
                          <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i> 演绎经验</h2>
                          <a href="#"><i class="fa fa-cog pull-right"></i></a>
                      </div>
                      <div class="panel-body margin-bottom-40">
                          <ul class="timeline-v2 timeline-me">
                              <li>
                                  <time datetime="" class="cbp_tmtime"><span>Mobile Design</span> <span>2012 - Current</span></time>
                                  <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                  <div class="cbp_tmlabel">
                                      <h2>BFC NYC Partners</h2>
                                      <p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Peasprouts wattle seed rutabaga okra yarrow cress avocado grape.</p>
                                  </div>
                              </li>
                              <li>
                                  <time datetime="" class="cbp_tmtime"><span>Web Designer</span> <span>2007 - 2012</span></time>
                                  <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                  <div class="cbp_tmlabel">
                                  <h2>Freelance</h2>
                                      <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce.</p>
                                  </div>
                              </li>
                              <li>
                                  <time datetime="" class="cbp_tmtime"><span>Photodesigner</span> <span>2003 - 2007</span></time>
                                  <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                  <div class="cbp_tmlabel">
                                  <h2>Toren Condo</h2>
                                      <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot.</p>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <!--End Timeline-->

              </div>
          </div>
            <!-- End Profile Content -->
        </div>
    </div><!--/container-->


@endsection

@section('scripts')
<script src="/libs/cropit/jquery.cropit.js"></script>
<script type="text/javascript" src="/assets/plugins/counter/waypoints.min.js"></script>
<script type="text/javascript" src="/assets/plugins/counter/jquery.counterup.min.js"></script>
<script type="text/javascript" src="/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="/init/js/profile.js"></script>




@endsection

@section('jquery')

  App.initCounter();
  App.initScrollBar();
  ProfileSocial.initCropit();

@endsection










