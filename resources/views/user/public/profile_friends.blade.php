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
                    <!--Profile Blog-->
                    <div class="row margin-bottom-20">
                        <div class="col-sm-6 sm-margin-bottom-20">
                            <div class="profile-blog">
                                <img class="rounded-x" src="/assets/img/testimonials/img1.jpg" alt="">
                                <div class="name-location">
                                    <strong>Mikel Andrews</strong>
                                    <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                                </div>
                                <div class="clearfix margin-bottom-20"></div>
                                <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                <hr>
                                <ul class="list-inline share-list">
                                    <li><i class="fa fa-bell"></i><a href="#">12 Notifications</a></li>
                                    <li><i class="fa fa-group"></i><a href="#">54 Followers</a></li>
                                    <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="profile-blog">
                                <img class="rounded-x" src="/assets/img/testimonials/user.jpg" alt="">
                                <div class="name-location">
                                    <strong>Natasha Kolnikova</strong>
                                    <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                                </div>
                                <div class="clearfix margin-bottom-20"></div>
                                <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                <hr>
                                <ul class="list-inline share-list">
                                    <li><i class="fa fa-bell"></i><a href="#">37 Notifications</a></li>
                                    <li><i class="fa fa-group"></i><a href="#">46 Followers</a></li>
                                    <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!--/end row-->
                    <!--End Profile Blog-->

                    <!--Profile Blog-->
                    <div class="row margin-bottom-20">
                        <div class="col-sm-6 sm-margin-bottom-20">
                            <div class="profile-blog">
                                <img class="rounded-x" src="/assets/img/testimonials/img2.jpg" alt="">
                                <div class="name-location">
                                    <strong>Sasha Elli</strong>
                                    <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                                </div>
                                <div class="clearfix margin-bottom-20"></div>
                                <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                <hr>
                                <ul class="list-inline share-list">
                                    <li><i class="fa fa-bell"></i><a href="#">3 Notifications</a></li>
                                    <li><i class="fa fa-group"></i><a href="#">25 Followers</a></li>
                                    <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="profile-blog">
                                <img class="rounded-x" src="/assets/img/testimonials/img3.jpg" alt="">
                                <div class="name-location">
                                    <strong>Frank Heller</strong>
                                    <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                                </div>
                                <div class="clearfix margin-bottom-20"></div>
                                <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                <hr>
                                <ul class="list-inline share-list">
                                    <li><i class="fa fa-bell"></i><a href="#">7 Notifications</a></li>
                                    <li><i class="fa fa-group"></i><a href="#">77 Followers</a></li>
                                    <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!--/end row-->
                    <!--End Profile Blog-->

                    <!--Profile Blog-->
                    <div class="row margin-bottom-20">
                        <div class="col-sm-6 sm-margin-bottom-20">
                            <div class="profile-blog">
                                <img class="rounded-x" src="/assets/img/testimonials/user.jpg" alt="">
                                <div class="name-location">
                                    <strong>John W.A</strong>
                                    <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                                </div>
                                <div class="clearfix margin-bottom-20"></div>
                                <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                <hr>
                                <ul class="list-inline share-list">
                                    <li><i class="fa fa-bell"></i><a href="#">0 Notifications</a></li>
                                    <li><i class="fa fa-group"></i><a href="#">9 Followers</a></li>
                                    <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="profile-blog">
                                <img class="rounded-x" src="/assets/img/testimonials/img5.jpg" alt="">
                                <div class="name-location">
                                    <strong>Natalia J.</strong>
                                    <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                                </div>
                                <div class="clearfix margin-bottom-20"></div>
                                <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                <hr>
                                <ul class="list-inline share-list">
                                    <li><i class="fa fa-bell"></i><a href="#">56 Notifications</a></li>
                                    <li><i class="fa fa-group"></i><a href="#">125 Followers</a></li>
                                    <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!--/end row-->

                    <!--Profile Blog-->
                    <div class="row margin-bottom-20">
                        <div class="col-sm-6 sm-margin-bottom-20">
                            <div class="profile-blog">
                                <img class="rounded-x" src="/assets/img/testimonials/img4.jpg" alt="">
                                <div class="name-location">
                                    <strong>Pavel Kolnikov</strong>
                                    <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                                </div>
                                <div class="clearfix margin-bottom-20"></div>
                                <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                <hr>
                                <ul class="list-inline share-list">
                                    <li><i class="fa fa-bell"></i><a href="#">37 Notifications</a></li>
                                    <li><i class="fa fa-group"></i><a href="#">46 Followers</a></li>
                                    <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="profile-blog">
                                <img class="rounded-x" src="/assets/img/testimonials/img6.jpg" alt="">
                                <div class="name-location">
                                    <strong>Taylor Lee</strong>
                                    <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                                </div>
                                <div class="clearfix margin-bottom-20"></div>
                                <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                <hr>
                                <ul class="list-inline share-list">
                                    <li><i class="fa fa-bell"></i><a href="#">0 Notifications</a></li>
                                    <li><i class="fa fa-group"></i><a href="#">9 Followers</a></li>
                                    <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!--/end row-->
                    <!--End Profile Blog-->

                    <!--Profile Blog-->
                    <div class="row margin-bottom-20">
                        <div class="col-sm-6 sm-margin-bottom-20">
                            <div class="profile-blog">
                                <img class="rounded-x" src="/assets/img/testimonials/img3.jpg" alt="">
                                <div class="name-location">
                                    <strong>Frank Heller</strong>
                                    <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                                </div>
                                <div class="clearfix margin-bottom-20"></div>
                                <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                <hr>
                                <ul class="list-inline share-list">
                                    <li><i class="fa fa-bell"></i><a href="#">7 Notifications</a></li>
                                    <li><i class="fa fa-group"></i><a href="#">77 Followers</a></li>
                                    <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="profile-blog">
                                <img class="rounded-x" src="/assets/img/testimonials/img2.jpg" alt="">
                                <div class="name-location">
                                    <strong>Sasha Elli</strong>
                                    <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                                </div>
                                <div class="clearfix margin-bottom-20"></div>
                                <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                <hr>
                                <ul class="list-inline share-list">
                                    <li><i class="fa fa-bell"></i><a href="#">3 Notifications</a></li>
                                    <li><i class="fa fa-group"></i><a href="#">25 Followers</a></li>
                                    <li><i class="fa fa-share"></i><a href="#">Share</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!--/end row-->

                    <button type="button" class="btn-u btn-u-default btn-block text-center">Load More</button>
                    <!--End Profile Blog-->
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




@endsection

@section('jquery')

  App.initCounter();
  App.initScrollBar();


@endsection










