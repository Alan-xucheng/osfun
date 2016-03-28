  <!--=== Header v8 ===-->
    <div class="header-v8 header-sticky">
        <!-- Topbar blog -->
        <div class="blog-topbar my-topbar">
            <div class="topbar-search-block">
                <div class="container">
                    <form action="">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="search-close"><i class="icon-close"></i></div>
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-xs-8">


                    </div>
                    <div class="col-sm-4 col-xs-4 clearfix">
                       
                        <ul class="topbar-list topbar-log_reg pull-right visible-sm-block visible-md-block visible-lg-block">
                            @if (!Auth::guard('user')->check())
                            <li class="cd-log_reg "><strong><a class="cd-signin" href="{{'/user/public/login'}}">登录</a></strong></li>
                            <li class="cd-log_reg"><strong><a class="cd-signup" href="{{'/user/public/register'}}">注册</a></strong></li>
                            @else
                             <li>
                                 <a href="javascript:void(0);">{{ Auth::guard('user')->user()->name}}</a>
                                 <ul class="topbar-dropdown">
                                   
                                     <li><a href="{{'/user/public/logout'}}">退出</a></li>
                                   
                                 </ul>
                             </li>

                             

                            @endif 
                        </ul>
                    </div>
                </div><!--/end row-->
            </div><!--/end container-->
        </div>
        <!-- End Topbar blog -->

        <!-- Navbar -->
        <div class="navbar mega-menu" role="navigation" >
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="res-container">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="navbar-brand">
                        <a href="index.html">
                            <img src="/assets/img/logo1-default.png" alt="Logo">
                        </a>
                    </div>
                </div><!--/end responsive container-->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <div class="res-container">
                        <ul class="nav navbar-nav pull-right" >
                            <li class="{{_IS_ACTIVE(url('/user/home/profile-album'))}}">
                                <a href="{{url('/user/home/profile-album')}}" class="" >
                                    我
                                </a>
                                
                            </li>
                            

                            <!--  图片结束 -->
                            <!--  消息 -->
                            <li class="{{_IS_ACTIVE(url('/user/message'))}}">
                                <a href="{{url('/user/message')}}">
                                    消息
                                </a>
                                
                            </li>
                        </ul>    
                        <ul class="nav navbar-nav pull-left" >
                            <!-- Home -->
                            <li class="{{_IS_ACTIVE(url('/'))}}">
                                <a href="{{url('/')}}" >
                                    大厅
                                </a>
                              
                            </li>
                            <!-- End Home -->

                            <!-- World -->
                            <li class="{{_IS_ACTIVE(url('/search/academy'))}}">
                                <a href="{{url('/search/academy')}}" >
                                    学院
                                </a>
                              
                            </li>
                            
                            <!-- End World -->

                            <!-- Fashion -->
                           <li class="{{_IS_ACTIVE(url('/search/view'))}}">
                               <a href="{{url('/search/view')}}" >
                                   圈子
                               </a>
                             
                           </li>
                            <!-- End Fashion -->
                <!--             <li class="{{_IS_ACTIVE(url('/search/cooperation'))}}">
                                <a href="{{url('/search/cooperation')}}" >
                                    招募
                                </a>
                              
                            </li> -->
                             <li class="{{_IS_ACTIVE(url('/search/service'))}}">
                                <a href="{{url('/search/service')}}">
                                    服务
                                </a>
                              
                            </li>
                        

                            <!--  消息结束 -->
                                    <!--  消息 -->
                            <li class="dropdown ">
                                  <a href="javascript:void(0);" class="dropdown-toggle  demand-menu" data-toggle="dropdown">
                                      <button class="btn-u btn-u-orange btn-sm" type="button"><i class="fa fa-rss "></i>&nbsp;发布</button>
                                  </a>
                                  <ul class="dropdown-menu demand" >
                                      <li><a href="javascript:;" id="postDemand">我要招募</a></li>
                                      <li><a href="/user/home/profile-album?type=experience">教程教学</a></li>
                                      <li><a href="/user/home/profile-album?type=personal">个人秀</a></li>
                                  </ul>
                            </li>
                              
            

                            <!--  消息结束 -->

                         
                            <!-- Main Demo -->
                        </ul>
                    </div><!--/responsive container-->
                </div><!--/navbar-collapse-->
            </div><!--/end contaoner-->
        </div>
        <!-- End Navbar -->
    </div>
    <!--=== End Header v8 ===-->