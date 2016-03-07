@extends('user.layout.layout')

@section('styles')
<!-- CSS Page Style -->
<link rel="stylesheet" href="assets/css/pages/page_search_inner.css">
   <link rel="stylesheet" href="/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css">
@endsection

@section('breadcrumbs')

<div class="breadcrumbs breadcrumbs-dark">
        <div class="container">
            <h1 class="pull-left">Search Results</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Page</a></li>
                <li class="active">Search results</li>
            </ul>
        </div>
    </div>
@endsection


@section('content')
<!--=== Search Block Version 2 ===-->
<div class="search-block-v2">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h2>Search again</h2>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search words with regular expressions ...">
                <span class="input-group-btn">
                    <button class="btn-u" type="button"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </div>
    </div>
</div><!--/container-->
<!--=== End Search Block Version 2 ===-->

    <!--=== Search Results ===-->
    <div class="container s-results margin-bottom-50">
        <div class="row">
            <div class="col-md-2 hidden-xs related-search">
                <div class="row">
                    <div class="col-md-12 col-sm-4">
                        <h3>Related searches</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Web design company</a></li>
                            <li><a href="#">Web design tutorials</a></li>
                            <li><a href="#">Self designing</a></li>
                        </ul>
                        <hr>
                    </div>

                    <div class="col-md-12 col-sm-4">
                        <h3>Tutorials</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Basic Concepts</a></li>
                            <li><a href="#">‎Building your first web page</a></li>
                            <li><a href="#">‎Advanced HTML</a></li>
                        </ul>
                        <hr>
                    </div>

                    <div class="col-md-12 col-sm-4">
                        <h3>Trending topics</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Bootstrap</a></li>
                            <li><a href="#">Wrapbootstrap</a></li>
                            <li><a href="#">Codrops</a></li>
                        </ul>
                        <hr>
                    </div>

                    <div class="col-md-12 col-sm-4">
                        <h3>Search history</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Web design articles</a></li>
                            <li><a href="#">Tutorials for web design</a></li>
                        </ul>
                        <a class="see-all" href="#">See all</a>
                        <hr>
                    </div>

                    <div class="col-md-12 col-sm-4">
                        <h3>Related pictures</h3>
                        <ul class="list-unstyled blog-photos margin-bottom-30">
                            <li><a href="#"><img src="assets/img/sliders/elastislide/5.jpg" alt="" class="hover-effect"></a></li>
                            <li><a href="#"><img src="assets/img/sliders/elastislide/6.jpg" alt="" class="hover-effect"></a></li>
                            <li><a href="#"><img src="assets/img/sliders/elastislide/8.jpg" alt="" class="hover-effect"></a></li>
                            <li><a href="#"><img src="assets/img/sliders/elastislide/10.jpg" alt="" class="hover-effect"></a></li>
                            <li><a href="#"><img src="assets/img/sliders/elastislide/11.jpg" alt="" class="hover-effect"></a></li>
                            <li><a href="#"><img src="assets/img/sliders/elastislide/1.jpg" alt="" class="hover-effect"></a></li>
                            <li><a href="#"><img src="assets/img/sliders/elastislide/2.jpg" alt="" class="hover-effect"></a></li>
                            <li><a href="#"><img src="assets/img/sliders/elastislide/7.jpg" alt="" class="hover-effect"></a></li>
                        </ul>
                    </div>
                </div>
            </div><!--/col-md-2-->
            <div class="col-md-10">
                <div class="cube-portfolio  margin-bottom-60">


                   <div id="grid-container" class="cbp-l-grid-agency">
                       <div class="cbp-item graphic">
                           <div class="cbp-caption">
                               <div class="cbp-caption-defaultWrap">
                                   <img src="assets/img/main/img26.jpg" alt="">
                               </div>
                               <div class="cbp-caption-activeWrap">
                                   <div class="cbp-l-caption-alignCenter">
                                       <div class="cbp-l-caption-body">
                                           <ul class="link-captions">
                                               <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                                               <li><a href="assets/img/main/img26.jpg" class="cbp-lightbox" data-title="Design Object"><i class="rounded-x fa fa-search"></i></a></li>
                                           </ul>
                                           <div class="cbp-l-grid-agency-title">Design Object 01</div>
                                           <div class="cbp-l-grid-agency-desc">Web Design</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="cbp-item web-design logos">
                           <div class="cbp-caption">
                               <div class="cbp-caption-defaultWrap">
                                   <img src="assets/img/main/img2.jpg" alt="">
                               </div>
                               <div class="cbp-caption-activeWrap">
                                   <div class="cbp-l-caption-alignCenter">
                                       <div class="cbp-l-caption-body">
                                           <ul class="link-captions">
                                               <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                                               <li><a href="assets/img/main/img2.jpg" class="cbp-lightbox" data-title="Design Object"><i class="rounded-x fa fa-search"></i></a></li>
                                           </ul>
                                           <div class="cbp-l-grid-agency-title">Design Object 02</div>
                                           <div class="cbp-l-grid-agency-desc">Web Design</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="cbp-item graphic logos">
                           <div class="cbp-caption">
                               <div class="cbp-caption-defaultWrap">
                                   <img src="assets/img/main/img9.jpg" alt="">
                               </div>
                               <div class="cbp-caption-activeWrap">
                                   <div class="cbp-l-caption-alignCenter">
                                       <div class="cbp-l-caption-body">
                                           <ul class="link-captions">
                                               <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                                               <li><a href="assets/img/main/img9.jpg" class="cbp-lightbox" data-title="Design Object"><i class="rounded-x fa fa-search"></i></a></li>
                                           </ul>
                                           <div class="cbp-l-grid-agency-title">Design Object 03</div>
                                           <div class="cbp-l-grid-agency-desc">Web Design</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="cbp-item web-design graphic">
                           <div class="cbp-caption">
                               <div class="cbp-caption-defaultWrap">
                                   <img src="assets/img/main/img10.jpg" alt="">
                               </div>
                               <div class="cbp-caption-activeWrap">
                                   <div class="cbp-l-caption-alignCenter">
                                       <div class="cbp-l-caption-body">
                                           <ul class="link-captions">
                                               <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                                               <li><a href="assets/img/main/img10.jpg" class="cbp-lightbox" data-title="Design Object"><i class="rounded-x fa fa-search"></i></a></li>
                                           </ul>
                                           <div class="cbp-l-grid-agency-title">Design Object 04</div>
                                           <div class="cbp-l-grid-agency-desc">Web Design</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="cbp-item identity web-design">
                           <div class="cbp-caption">
                               <div class="cbp-caption-defaultWrap">
                                   <img src="assets/img/main/img11.jpg" alt="">
                               </div>
                               <div class="cbp-caption-activeWrap">
                                   <div class="cbp-l-caption-alignCenter">
                                       <div class="cbp-l-caption-body">
                                           <ul class="link-captions">
                                               <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                                               <li><a href="assets/img/main/img11.jpg" class="cbp-lightbox" data-title="Design Object"><i class="rounded-x fa fa-search"></i></a></li>
                                           </ul>
                                           <div class="cbp-l-grid-agency-title">Design Object 05</div>
                                           <div class="cbp-l-grid-agency-desc">Web Design</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="cbp-item identity web-design">
                           <div class="cbp-caption">
                               <div class="cbp-caption-defaultWrap">
                                   <img src="assets/img/main/img12.jpg" alt="">
                               </div>
                               <div class="cbp-caption-activeWrap">
                                   <div class="cbp-l-caption-alignCenter">
                                       <div class="cbp-l-caption-body">
                                           <ul class="link-captions">
                                               <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                                               <li><a href="assets/img/main/img12.jpg" class="cbp-lightbox" data-title="Design Object"><i class="rounded-x fa fa-search"></i></a></li>
                                           </ul>
                                           <div class="cbp-l-grid-agency-title">Design Object 06</div>
                                           <div class="cbp-l-grid-agency-desc">Web Design</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="cbp-item web-design identity">
                           <div class="cbp-caption">
                               <div class="cbp-caption-defaultWrap">
                                   <img src="assets/img/main/img19.jpg" alt="">
                               </div>
                               <div class="cbp-caption-activeWrap">
                                   <div class="cbp-l-caption-alignCenter">
                                       <div class="cbp-l-caption-body">
                                           <ul class="link-captions">
                                               <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                                               <li><a href="assets/img/main/img19.jpg" class="cbp-lightbox" data-title="Design Object"><i class="rounded-x fa fa-search"></i></a></li>
                                           </ul>
                                           <div class="cbp-l-grid-agency-title">Design Object 07</div>
                                           <div class="cbp-l-grid-agency-desc">Web Design</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="cbp-item identity logo">
                           <div class="cbp-caption">
                               <div class="cbp-caption-defaultWrap">
                                   <img src="assets/img/main/img7.jpg" alt="">
                               </div>
                               <div class="cbp-caption-activeWrap">
                                   <div class="cbp-l-caption-alignCenter">
                                       <div class="cbp-l-caption-body">
                                           <ul class="link-captions">
                                               <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                                               <li><a href="assets/img/main/img7.jpg" class="cbp-lightbox" data-title="Design Object"><i class="rounded-x fa fa-search"></i></a></li>
                                           </ul>
                                           <div class="cbp-l-grid-agency-title">Design Object 08</div>
                                           <div class="cbp-l-grid-agency-desc">Web Design</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="cbp-item graphic">
                           <div class="cbp-caption">
                               <div class="cbp-caption-defaultWrap">
                                   <img src="assets/img/main/img20.jpg" alt="">
                               </div>
                               <div class="cbp-caption-activeWrap">
                                   <div class="cbp-l-caption-alignCenter">
                                       <div class="cbp-l-caption-body">
                                           <ul class="link-captions">
                                               <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                                               <li><a href="assets/img/main/img20.jpg" class="cbp-lightbox" data-title="Design Object"><i class="rounded-x fa fa-search"></i></a></li>
                                           </ul>
                                           <div class="cbp-l-grid-agency-title">Design Object 09</div>
                                           <div class="cbp-l-grid-agency-desc">Web Design</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="cbp-item web-design logos">
                           <div class="cbp-caption">
                               <div class="cbp-caption-defaultWrap">
                                   <img src="assets/img/main/img3.jpg" alt="">
                               </div>
                               <div class="cbp-caption-activeWrap">
                                   <div class="cbp-l-caption-alignCenter">
                                       <div class="cbp-l-caption-body">
                                           <ul class="link-captions">
                                               <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                                               <li><a href="assets/img/main/img3.jpg" class="cbp-lightbox" data-title="Design Object"><i class="rounded-x fa fa-search"></i></a></li>
                                           </ul>
                                           <div class="cbp-l-grid-agency-title">Design Object 10</div>
                                           <div class="cbp-l-grid-agency-desc">Web Design</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="cbp-item graphic logos">
                           <div class="cbp-caption">
                               <div class="cbp-caption-defaultWrap">
                                   <img src="assets/img/main/img6.jpg" alt="">
                               </div>
                               <div class="cbp-caption-activeWrap">
                                   <div class="cbp-l-caption-alignCenter">
                                       <div class="cbp-l-caption-body">
                                           <ul class="link-captions">
                                               <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                                               <li><a href="assets/img/main/img6.jpg" class="cbp-lightbox" data-title="Design Object"><i class="rounded-x fa fa-search"></i></a></li>
                                           </ul>
                                           <div class="cbp-l-grid-agency-title">Design Object 11</div>
                                           <div class="cbp-l-grid-agency-desc">Web Design</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="cbp-item web-design graphic">
                           <div class="cbp-caption">
                               <div class="cbp-caption-defaultWrap">
                                   <img src="assets/img/main/img16.jpg" alt="">
                               </div>
                               <div class="cbp-caption-activeWrap">
                                   <div class="cbp-l-caption-alignCenter">
                                       <div class="cbp-l-caption-body">
                                           <ul class="link-captions">
                                               <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                                               <li><a href="assets/img/main/img16.jpg" class="cbp-lightbox" data-title="Design Object"><i class="rounded-x fa fa-search"></i></a></li>
                                           </ul>
                                           <div class="cbp-l-grid-agency-title">Design Object 12</div>
                                           <div class="cbp-l-grid-agency-desc">Web Design</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div><!--/end Grid Container-->
                </div>
            </div>
        </div>
    </div><!--/container-->
    <!--=== End Search Results ===-->


@endsection




@section('scripts')
<script type="text/javascript" src="/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/cube-portfolio/cube-portfolio-3.js"></script>
@endsection







