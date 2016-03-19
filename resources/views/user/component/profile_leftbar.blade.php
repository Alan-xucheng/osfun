     <div class="col-md-3 md-margin-bottom-40">
                <!-- <img class="img-responsive profile-img margin-bottom-20" src="/assets/img/team/img32-md.jpg" alt=""> -->
                <div class="text-center"  style="background-color: #f7f7f7;margin-bottom:15px;padding:15px;">
                  <img class="rounded-x text-center face-img" style="width: 100px;cursor:pointer;height: 100px;" src="{{$auth->avatar?$auth->avatar:'/assets/img/testimonials/img6.jpg'}}" alt="">
                  <div class="testimonials-desc" style="margin-top: 10px;">
                      
                      <strong>{{$auth->name}}</strong>
                      <span aria-hidden="true" class="fa fa-female"></span>
                      <p>认证信息</p>
                  </div>
                </div>

                <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                  
               
                 
                    <li class="list-group-item {{_IS_ACTIVE(url('/user/home/profile-album'))}}">
                        <a href="{{url('/user/home/profile-album')}}"><i class="fa  fa-pencil-square-o"></i>我的作品</a>
                    </li>
                    <li class="list-group-item {{_IS_ACTIVE(url('/user/home/profile-project'))}}">
                        <a href="{{url('/user/home/profile-project')}}"><i class="fa  fa-paper-plane"></i>需求管理</a>
                    </li>
                  
                <!--     <li class="list-group-item {{_IS_ACTIVE(url('/user/home/profile-comment'))}}">
                        <a href="{{url('/user/home/profile-comment')}}"><i class="fa fa-comments"></i>最近评论</a>
                    </li> -->
            
                    <li class="list-group-item {{_IS_ACTIVE(url('/user/home/profile-settings'))}}">
                        <a href="{{url('/user/home/profile-settings')}}"><i class="fa fa-cog"></i>账号设置</a>
                    </li>
                  
                </ul>


                <!--Notification-->
                <div class="panel-heading-v2 overflow-h">
                    <h2 class="heading-xs pull-left"><i class="fa fa-bell-o"></i> Notification</h2>
                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                </div>
                <ul class="list-unstyled mCustomScrollbar margin-bottom-20" data-mcs-theme="minimal-dark">
                    <li class="notification">
                        <i class="icon-custom icon-sm rounded-x icon-bg-red icon-line icon-envelope"></i>
                        <div class="overflow-h">
                            <span><strong>Albert Heller</strong> has sent you email.</span>
                            <small>Two minutes ago</small>
                        </div>
                    </li>
                    <li class="notification">
                        <img class="rounded-x" src="/assets/img/testimonials/img6.jpg" alt="">
                        <div class="overflow-h">
                            <span><strong>Taylor Lee</strong> started following you.</span>
                            <small>Today 18:25 pm</small>
                        </div>
                    </li>
                    <li class="notification">
                        <i class="icon-custom icon-sm rounded-x icon-bg-yellow icon-line fa fa-bolt"></i>
                        <div class="overflow-h">
                            <span><strong>Natasha Kolnikova</strong> accepted your invitation.</span>
                            <small>Yesterday 1:07 pm</small>
                        </div>
                    </li>
                    <li class="notification">
                        <img class="rounded-x" src="/assets/img/testimonials/img1.jpg" alt="">
                        <div class="overflow-h">
                            <span><strong>Mikel Andrews</strong> commented on your Timeline.</span>
                            <small>23/12 11:01 am</small>
                        </div>
                    </li>
                    <li class="notification">
                        <i class="icon-custom icon-sm rounded-x icon-bg-blue icon-line fa fa-comments"></i>
                        <div class="overflow-h">
                            <span><strong>Bruno Js.</strong> added you to group chating.</span>
                            <small>Yesterday 1:07 pm</small>
                        </div>
                    </li>
                    <li class="notification">
                        <img class="rounded-x" src="/assets/img/testimonials/img6.jpg" alt="">
                        <div class="overflow-h">
                            <span><strong>Taylor Lee</strong> changed profile picture.</span>
                            <small>23/12 15:15 pm</small>
                        </div>
                    </li>
                </ul>
                <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
                <!--End Notification-->

                <div class="margin-bottom-50"></div>

                <!--Datepicker-->
                <form action="#" id="sky-form2" class="sky-form">
                    <div id="inline-start"></div>
                </form>
                <!--End Datepicker-->
            </div>