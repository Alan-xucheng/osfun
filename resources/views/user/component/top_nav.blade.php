   <div class="header">
        <div class="container">
            <!-- Logo -->
            <a class="logo" href="index.html">
                <img src="/assets/img/logo1-default.png" alt="Logo">
            </a>
            <!-- End Logo -->

            <!-- Topbar -->
            <div class="topbar">
                <ul class="loginbar pull-right">
                
                    
                    <li><a href="page_faq.html">Help</a></li>
                    <li class="topbar-devider"></li>
                    @if (!Auth::guard('user')->check())
                    <li><a href="{{'/user/public/login'}}">Login</a></li>
                    <li><a href="{{'/user/public/register'}}">Register</a></li>
                    @else
                    <li><a href="{{'/user/home'}}">{{ Auth::guard('user')->user()->name}}</a></li>
                    <li class="topbar-devider"></li>
                    <li><a href="{{'/user/public/logout'}}">退出</a></li>

                    

                    @endif

                </ul>
            </div>
            <!-- End Topbar -->

            <!-- Toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>
            <!-- End Toggle -->
        </div><!--/end container-->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
            <div class="container">
                <ul class="nav navbar-nav">
										<!-- Home -->
										<li class="{{_IS_ACTIVE(url('/'))}}">
											<a href="{{url('/')}}" >
												交流大厅
											</a>
											
										</li>
										<!-- End Home -->
									
										<!--  图片 -->
										<li class="">
											<a href="{{url('view')}}" >
												图片
											</a>
											
										</li>

										<!--  图片结束 -->
										<!--  红人学院 -->
										<li class="dropdown mega-menu-fullwidth">
										    <a href="javascript:void(0);" >
										        网红学院
										    </a>
										    <ul class="dropdown-menu">
										        <li>
										            <div class="mega-menu-content disable-icons">
										                <div class="container">
										                    <div class="row equal-height">
										                        <div class="col-md-3 equal-height-in">
										                            <ul class="list-unstyled equal-height-list">
										                                <li><h3>服饰搭配</h3></li>

										                                <!-- Typography -->
										                                <li><a href="{{url('/academy')}}"><i class="fa fa-sort-alpha-asc"></i> 专辑1</a></li>
										                                <li><a href="shortcode_typo_headings.html"><i class="fa fa-magic"></i> Headings Options</a></li>
										                                <li><a href="shortcode_typo_dividers.html"><i class="fa fa-ellipsis-h"></i> Dividers</a></li>
										                                <li><a href="shortcode_typo_blockquote.html"><i class="fa fa-quote-left"></i> Blockquote Blocks</a></li>
										                                <li><a href="shortcode_typo_boxshadows.html"><i class="fa fa-asterisk"></i> Box Shadows</a></li>
										                                <li><a href="shortcode_typo_testimonials.html"><i class="fa fa-comments"></i> Testimonials</a></li>
										                                <li><a href="shortcode_typo_tagline_boxes.html"><i class="fa fa-tasks"></i> Tagline Boxes</a></li>
										                                <li><a href="shortcode_typo_grid.html"><i class="fa fa-align-justify"></i> Grid Layouts</a></li>
										                                <!-- End Typography -->

										                                <!-- Components -->
										                                <li><a href="shortcode_compo_messages.html"><i class="fa fa-comment"></i> Alerts &amp; Messages</a></li>
										                                <li><a href="shortcode_compo_labels.html"><i class="fa fa-tags"></i> Labels &amp; Badges</a></li>
										                                <li><a href="shortcode_compo_media.html"><i class="fa fa-volume-down"></i> Audio/Videos &amp; Images</a></li>
										                                <li><a href="shortcode_compo_pagination.html"><i class="fa fa-arrows-h"></i> Paginations</a></li>
										                                <!-- End Components -->
										                            </ul>
										                        </div>
										                        <div class="col-md-3 equal-height-in">
										                            <ul class="list-unstyled equal-height-list">
										                                <li><h3>美妆</h3></li>

										                                <!-- Buttons -->
										                                <li><a href="shortcode_btn_general.html"><i class="fa fa-flask"></i> General Buttons</a></li>
										                                <li><a href="shortcode_btn_brands.html"><i class="fa fa-html5"></i> Brand &amp; Social Buttons</a></li>
										                                <li><a href="shortcode_btn_effects.html"><i class="fa fa-bolt"></i> Loading &amp; Hover Effects</a></li>
										                                <!-- End Buttons -->

										                                <!-- Icons -->
										                                <li><a href="shortcode_icon_general.html"><i class="fa fa-chevron-circle-right"></i> General Icons</a></li>
										                                <li><a href="shortcode_icon_fa.html"><i class="fa fa-chevron-circle-right"></i> Font Awesome Icons</a></li>
										                                <li><a href="shortcode_icon_line.html"><i class="fa fa-chevron-circle-right"></i> Line Icons</a></li>
										                                <li><a href="shortcode_icon_glyph.html"><i class="fa fa-chevron-circle-right"></i> Glyphicons Icons (Bootstrap)</a></li>
										                                <!-- End Icons -->
										                            </ul>
										                        </div>
										                        <div class="col-md-3 equal-height-in">
										                            <ul class="list-unstyled equal-height-list">
										                                <li><h3>形体姿态</h3></li>

										                                <!-- Common Elements -->
										                                <li><a href="shortcode_thumbnails.html"><i class="fa fa-image"></i> Thumbnails</a></li>
										                                <li><a href="shortcode_accordion_and_tabs.html"><i class="fa fa-list-ol"></i> Accordion &amp; Tabs</a></li>
										                                <li><a href="shortcode_timeline1.html"><i class="fa fa-dot-circle-o"></i> Timeline Option 1</a></li>
										                                <li><a href="shortcode_timeline2.html"><i class="fa fa-dot-circle-o"></i> Timeline Option 2</a></li>
										                                <li><a href="shortcode_table_general.html"><i class="fa fa-table"></i> Tables</a></li>
										                                <li><a href="shortcode_compo_progress_bars.html"><i class="fa fa-align-left"></i> Progress Bars</a></li>
										                                <li><a href="shortcode_compo_panels.html"><i class="fa fa-columns"></i> Panels</a></li>
										                                <li><a href="shortcode_carousels.html"><i class="fa fa-sliders"></i> Carousel Examples</a></li>
										                                <li><a href="shortcode_maps_google.html"><i class="fa fa-map-marker"></i> Google Maps</a></li>
										                                <li><a href="shortcode_maps_vector.html"><i class="fa fa-align-center"></i> Vector Maps</a></li>
										                                <!-- End Common Elements -->
										                            </ul>
										                        </div>
										                        <div class="col-md-3 equal-height-in">
										                            <ul class="list-unstyled equal-height-list">
										                                <li><h3>话题素材</h3></li>

										                                <!-- Forms -->
										                                <li><a href="shortcode_form_general.html"><i class="fa fa-bars"></i> Common Bootstrap Forms</a></li>
										                                <li><a href="shortcode_form_general1.html"><i class="fa fa-bars"></i> General Unify Forms</a></li>
										                                <li><a href="shortcode_form_advanced.html"><i class="fa fa-bars"></i> Advanced Forms</a></li>
										                                <li><a href="shortcode_form_layouts.html"><i class="fa fa-bars"></i> Form Layouts</a></li>
										                                <li><a href="shortcode_form_layouts_advanced.html"><i class="fa fa-bars"></i> Advanced Layout Forms</a></li>
										                                <li><a href="shortcode_form_states.html"><i class="fa fa-bars"></i> Form States</a></li>
										                                <li><a href="shortcode_form_sliders.html"><i class="fa fa-bars"></i> Form Sliders</a></li>
										                                <li><a href="shortcode_form_modals.html"><i class="fa fa-bars"></i> Modals</a></li>
										                                <!-- End Forms -->

										                                <!-- Infographics -->
										                                <li><a href="shortcode_compo_charts.html"><i class="fa fa-pie-chart"></i> Charts &amp; Countdowns</a></li>
										                                <!-- End Infographics -->
										                            </ul>
										                        </div>
										                    </div>
										                </div>
										            </div>
										        </li>
										    </ul>
										</li>

										<!--  红人学院结束 -->
											<!--  图片 -->
										<li class="{{_IS_ACTIVE(url('/user/home/profile'))}}">
											<a href="{{url('/user/home/profile')}}" class="" >
												档案
											</a>
											
										</li>
									

										<!--  图片结束 -->
										<!--  消息 -->
										<li class="{{_IS_ACTIVE(url('/user/home/message'))}}">
											<a href="{{url('/user/home/message')}}">
												消息
											</a>
											
										</li>

										<!--  消息结束 -->
										



              

                    <!-- Search Block -->
                    <li>
                        <i class="search fa fa-search search-btn"></i>
                        <div class="search-open">
                            <div class="input-group animated fadeInDown">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-btn">
                                    <button class="btn-u" type="button">Go</button>
                                </span>
                            </div>
                        </div>
                    </li>
                    <!-- End Search Block -->
                </ul>
            </div><!--/end container-->
        </div><!--/navbar-collapse-->
    </div>