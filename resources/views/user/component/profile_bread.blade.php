    <div class="breadcrumbs profile-bread">
        <div class="container">
            <div class='testimonials-v6 testimonials-wrap'>
            <div class="row">
                <div class="col-md-12 ">
                        <div class="testimonials-info rounded-bottom row">
                          <img class="rounded-x" src="{{$user_info->avatar?$user_info->avatar:'/assets/img/testimonials/img2.jpg'}}" alt="">
                          <div class="testimonials-desc {{Auth::guard('user')->check()?'permission-edit':''}}">
                             
                              <h1 style="font-size: 30px;color:#fff;">{{$user_info->nickname}}<i class="fa fa-pencil edit-nickname"></i></h1>
                              <p>{{$user_info->sign}}<i class="fa fa-pencil edit-sign"></i></p>
                              <ul class="list-inline list-unstyled topbar-list modal_list">
                                <li><i class="fa fa-mars"></i>&nbsp;{{$user_info->age}}岁<i class="fa fa-pencil edit-sex"></i></li> 
                                <li>{{$user_info->province}}&nbsp;{{$user_info->city}}&nbsp;{{$user_info->country}}<i class="fa fa-pencil edit-location"></i></li> 
                                <li><i class="fa fa-thumbs-o-up"></i>&nbsp; 99</li> 
                              </ul>
                                                                                
                          </div>
                        </div>
                        <div class="page-nav">
                              <ul class="list-inline list-unstyled">
                                  <li class="col-xs-3 {{_ACTIVE_URL(url('/profile/article'))}}">
                                      <a href="/profile/article/{{$uid}}" >
                                         文章
                                      </a>
                                      <p>2</p>
                                      
                                  </li>
                                  <li class="col-xs-3 {{_ACTIVE_URL(url('/profile/video'))}}">
                                      <a href="/profile/video/{{$uid}}">
                                          视频
                                      </a>
                                      <p>2</p>
                                      
                                  </li>
                                  <li class="col-xs-3 {{_ACTIVE_URL(url('/profile/cooperation'))}}">
                                      <a href="/profile/cooperation/{{$uid}}">
                                          服务
                                      </a>
                                      <p>2</p>
                                      
                                  </li>
                                   <li class="col-xs-3 {{_ACTIVE_URL(url('/profile/friend'))}}">
                                      <a href="/profile/friend/{{$uid}}">
                                          好友
                                      </a>
                                      <p>2</p>
                                      
                                  </li>
                              </ul> 
                        </div>
                </div>
                         
            </div>
            </div>
            </div>
        </div><!--/container-->
    </div><!--/breadcrumbs-->