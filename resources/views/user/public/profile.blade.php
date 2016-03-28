@extends('user.layout.layout')

@section('styles')
<!-- CSS Page Style -->


@endsection
@section('breadcrumbs')
    <div class="breadcrumbs profile-bread">
        <div class="container">
            <div class='testimonials-v6 testimonials-wrap'>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="testimonials-info rounded-bottom">
                          <img class="rounded-x" src="{{$auth->avatar?$auth->avatar:'/assets/img/testimonials/img2.jpg'}}" alt="">
                          <div class="testimonials-desc">
                             
                              <h1 style="font-size: 30px;color:#fff;">{{$auth->name}}</h1>
                         <!--      <span>Technical Direector</span>
                               <p>Donec quis lorem sit amet nibh tempor porttitor non eu justo. Fusce iaculis scelerisque nibh at rhoncus. Aliquam blandit.</p> -->
                          </div>
                        </div>
                        <div class="page-nav ">
                              <ul class="list-inline list-unstyled">
                                  <li class="col-md-3 active">
                                      <a href="" >
                                         文章
                                      </a>
                                      <p>2</p>
                                      
                                  </li>
                                  <li class="col-md-3">
                                      <a href="">
                                          视频
                                      </a>
                                      <p>2</p>
                                      
                                  </li>
                                  <li class="col-md-3">
                                      <a href="">
                                          招募
                                      </a>
                                      <p>2</p>
                                      
                                  </li>
                                   <li class="col-md-3">
                                      <a href="">
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

@endsection




@section('content')

@endsection    