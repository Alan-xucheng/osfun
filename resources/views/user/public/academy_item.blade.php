@extends('user.layout.layout')

@section('styles')
<link rel="stylesheet" href="/assets/plugins/fancybox/source/jquery.fancybox.css">
<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
@endsection


@section('breadcrumbs')

<div class="breadcrumbs breadcrumbs-dark">
        <div class="container">
            <h1 class="pull-left">网红学院</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.html">网红学院</a></li>
                <li><a href="">服饰搭配</a></li>
                <li class="active">文章标题</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
<!--=== Blog Posts ===-->
<div class="bg-color-light">
    <div class="container content-sm">
        <div class="row">
            <!-- Blog Sidebar -->
            <div class="col-md-3">
                <div class="headline-v2"><h2>Trending</h2></div>
                <!-- Trending -->
                <ul class="list-unstyled blog-trending margin-bottom-50">
                    <li>
                        <h3><a href="#">Praesent tincidunt ornare tortor</a></h3>
                        <small>23 Jan, 2015 / <a href="#">Art,</a> <a href="#">Lifestyles</a></small>
                    </li>
                    <li>
                        <h3><a href="#">Nunc leo leo, faucibus non gravida</a></h3>
                        <small>22 Jan, 2015 / <a href="#">Marketing</a></small>
                    </li>
                    <li>
                        <h3><a href="#">Proin dapibus ornare magna.</a></h3>
                        <small>19 Jan, 2015 / <a href="#">Hi-Tech,</a> <a href="#">Technology</a></small>
                    </li>
                    <li>
                        <h3><a href="#">Fusce at diam ante.</a></h3>
                        <small>17 Jan, 2015 / <a href="#">Artificial Intelligence</a></small>
                    </li>
                    <li>
                        <h3><a href="#">Donec quis consequat magna...</a></h3>
                        <small>5 Jan, 2015 / <a href="#">Web,</a> <a href="#">Webdesign</a></small>
                    </li>
                </ul>
                <!-- End Trending -->

                <div class="headline-v2"><h2>Latest Posts</h2></div>
                <!-- Latest Links -->
                <ul class="list-unstyled blog-latest-posts margin-bottom-50">
                    <li>
                        <h3><a href="#">Wireframe for the news view...</a></h3>
                        <small>5 Jan, 2015 / <a href="#">Web,</a> <a href="#">Webdesign</a></small>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam odio leo.</p>
                    </li>
                    <li>
                        <h3><a href="#">It is a long established fact that a reader</a></h3>
                        <small>17 Jan, 2015 / <a href="#">Artificial Intelligence</a></small>
                        <p>Pellentesque efficitur blandit dui, porta cursus velit imperdiet sit amet.</p>
                    </li>
                    <li>
                        <h3><a href="#">The point of using Lorem Ipsum</a></h3>
                        <small>19 Jan, 2015 / <a href="#">Hi-Tech,</a> <a href="#">Technology</a></small>
                        <p>Phasellus ullamcorper pellentesque ex. Cras venenatis elit orci, vitae dictum elit egestas a. Nunc nec auctor mauris, semper scelerisque nibh.</p>
                    </li>
                    <li>
                        <h3><a href="#">Many desktop publishing packages...</a></h3>
                        <small>23 Jan, 2015 / <a href="#">Art,</a> <a href="#">Lifestyles</a></small>
                        <p>Integer vehicula sed justo ac dapibus. In sodales nunc non varius accumsan.</p>
                    </li>
                </ul>
                <!-- End Latest Links -->

                <div class="headline-v2"><h2>Tags</h2></div>
                <!-- Tags v2 -->
                <ul class="list-inline tags-v2 margin-bottom-50">
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Economy</a></li>
                    <li><a href="#">Sport</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Books</a></li>
                    <li><a href="#">Elections</a></li>
                    <li><a href="#">Flickr</a></li>
                    <li><a href="#">Politics</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Web Hosting</a></li>
                    <li><a href="#">Wrapbootstrap</a></li>
                    <li><a href="#">Art</a></li>
                </ul>
                <!-- End Tags v2 -->

                <div class="headline-v2"><h2>Photostream</h2></div>
                <!-- Photostream -->
                <ul class="list-inline blog-photostream margin-bottom-50">
                    <li>
                        <a href="assets/img/main/img22.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 1">
                            <span><img class="img-responsive" src="/assets/img/main/img22.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img23.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 2">
                            <span><img class="img-responsive" src="/assets/img/main/img23.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img4.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 3">
                            <span><img class="img-responsive" src="/assets/img/main/img4.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img9.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 4">
                            <span><img class="img-responsive" src="/assets/img/main/img9.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img25.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 5">
                            <span><img class="img-responsive" src="/assets/img/main/img25.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img6.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 6">
                            <span><img class="img-responsive" src="/assets/img/main/img6.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img20.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 7">
                            <span><img class="img-responsive" src="/assets/img/main/img20.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img3.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 8">
                            <span><img class="img-responsive" src="/assets/img/main/img3.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img7.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 9">
                            <span><img class="img-responsive" src="/assets/img/main/img7.jpg" alt=""></span>
                        </a>
                    </li>
                </ul>
                <!-- End Photostream -->

                <div class="headline-v2"><h2>Newsletter</h2></div>
                <!-- Blog Newsletter -->
                <div class="blog-newsletter">
                    <p>Subscribe to our newsletter for good news, sent out every month.</p>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Email">
                        <span class="input-group-btn">
                            <button class="btn-u" type="button">Subscribe</button>
                        </span>
                    </div>
                </div>
                <!-- End Blog Newsletter -->
            </div>
            <!-- End Blog Sidebar -->

            <!-- Blog All Posts -->
            <div class="col-md-9">
                <!-- News v3 -->
                <div class="news-v3 bg-color-white margin-bottom-30">
                    <img class="img-responsive full-width" src="/assets/img/main/img12.jpg" alt="">
                    <div class="news-v3-in">
                        <ul class="list-inline posted-info">
                            <li>By <a href="#">Alexander Jenni</a></li>
                            <li>In <a href="#">Design</a></li>
                            <li>Posted January 24, 2015</li>
                        </ul>
                        <h2><a href="#">Incredible standard post “IMAGE”</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec arcu ipsum. Curabitur tincidunt nisi ex, ut eleifend turpis egestas vitae. Proin convallis et eros eget rutrum. Duis luctus lorem id mattis placerat. Etiam pharetra libero ut suscipit mollis. Morbi augue mi, maximus at lectus id, mollis ornare dui. Curabitur consequat, est non cursus suscipit, quam nulla porta enim, sed pharetra diam elit non nisi. Praesent pulvinar ante eu euismod cursus. Fusce quis est justo. Nullam id egestas diam. Etiam ac augue orci. Aliquam scelerisque convallis est sed pretium. In vel elementum lorem.</p>
                        <p>Pellentesque eleifend metus vitae commodo finibus. Proin eget mi a sem placerat facilisis. Aenean interdum aliquet sapien, non scelerisque massa vestibulum ut. Quisque mollis, ante nec volutpat dignissim, lectus libero porta magna, at volutpat massa orci a turpis. Duis tincidunt nunc magna, non semper metus tempus ut. Duis vulputate enim condimentum posuere lacinia. Ut venenatis massa ex.</p>
                        <blockquote class="hero">
                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing duis mollis, est non commodo luctus elit posuere erat a ante. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis lorem ipsum dolor sit amet, consectetur adipiscing"</em></p>
                        </blockquote>
                        <p>Sed placerat diam auctor eget. Mauris tellus eros, iaculis id leo quis, finibus aliquet ipsum. Duis volutpat lacus in purus bibendum, at sollicitudin eros malesuada. Sed nec diam a eros eleifend mattis. Phasellus in facilisis enim. Vestibulum sodales lacinia lectus, quis efficitur velit posuere sed.</p>
                        <ul class="post-shares post-shares-lg">
                            <li>
                                <a href="#">
                                    <i class="rounded-x icon-speech"></i>
                                    <span>28</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="rounded-x icon-share"></i>
                                    <span>355</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="rounded-x icon-heart"></i>
                                    <span>107</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End News v3 -->

                <!-- Blog Post Author -->
                <div class="blog-author margin-bottom-30">
                    <img src="/assets/img/team/img1-md.jpg" alt="">
                    <div class="blog-author-desc">
                        <div class="overflow-h">
                            <h4>Alexander Jenni</h4>
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                        <p>In auctor fringilla turpis eu rhoncus. Vivamus quis nisi vel dui ultrices lacinia ac eu massa. Quis que vitae consequat sapien. Vivamus sit amet tincidunt ipsum, nec blandit ipsum. Lorem ipsu m dolor sit amet, consectetur adipiscing elit...</p>
                    </div>
                </div>
                <!-- End Blog Post Author -->

                <!-- News v2 -->
                <div class="row news-v2 margin-bottom-50">
                    <div class="col-sm-6 sm-margin-bottom-30">
                        <div class="news-v2-badge">
                            <img class="img-responsive" src="/assets/img/main/img18.jpg" alt="">
                            <p>
                                <span>23</span>
                                <small>Jan</small>
                            </p>
                        </div>
                        <div class="news-v2-desc">
                            <h3><a href="#">Reading Some Books</a></h3>
                            <small>By Admin | California, US | In <a href="#">Art</a></small>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="news-v2-badge">
                            <img class="img-responsive" src="/assets/img/main/img16.jpg" alt="">
                            <p>
                                <span>22</span>
                                <small>Jan</small>
                            </p>
                        </div>
                        <div class="news-v2-desc">
                            <h3><a href="#">Interior Design</a></h3>
                            <small>By Admin | California, US | In <a href="#">Art</a></small>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
                        </div>
                    </div>
                </div>
                <!-- End News v2 -->

                <hr>

                <h2 class="margin-bottom-20">Comments</h2>
                <!-- Blog Comments -->
                <div class="row blog-comments margin-bottom-30">
                    <div class="col-sm-2 sm-margin-bottom-40">
                        <img src="/assets/img/team/img1-sm.jpg" alt="">
                    </div>
                    <div class="col-sm-10">
                        <div class="comments-itself">
                            <h4>
                                Jalen Davenport
                                <span>5 hours ago / <a href="#">Reply</a></span>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod..</p>
                        </div>
                    </div>
                </div>
                <!-- End Blog Comments -->

                <!-- Blog Comments -->
                <div class="row blog-comments blog-comments-reply margin-bottom-30">
                    <div class="col-sm-2 sm-margin-bottom-40">
                        <img src="/assets/img/team/img3-sm.jpg" alt="">
                    </div>
                    <div class="col-sm-10">
                        <div class="comments-itself">
                            <h4>
                                Jorny Alnordussen
                                <span>6 hours ago / <a href="#">Reply</a></span>
                            </h4>
                            <p>Gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod..</p>
                        </div>
                    </div>
                </div>
                <!-- End Blog Comments -->

                <!-- Blog Comments -->
                <div class="row blog-comments margin-bottom-50">
                    <div class="col-sm-2 sm-margin-bottom-40">
                        <img src="/assets/img/team/img5-sm.jpg" alt="">
                    </div>
                    <div class="col-sm-10">
                        <div class="comments-itself">
                            <h4>
                                Marcus Farrell
                                <span>7 hours ago / <a href="#">Reply</a></span>
                            </h4>
                            <p>Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod..</p>
                        </div>
                    </div>
                </div>
                <!-- End Blog Comments -->

                <hr>

                <h2 class="margin-bottom-20">Post a Comment</h2>
                <!-- Form -->
                <form action="assets/php/sky-forms-pro/demo-comment-process.php" method="post" id="sky-form3" class="sky-form comment-style">
                    <fieldset>
                        <div class="row sky-space-30">
                            <div class="col-md-6">
                                <div>
                                    <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="sky-space-30">
                            <div>
                                <textarea rows="8" name="message" id="message" placeholder="Write comment here ..." class="form-control"></textarea>
                            </div>
                        </div>

                        <p><button type="submit" class="btn-u">Submit</button></p>
                    </fieldset>

                    <div class="message">
                        <i class="rounded-x fa fa-check"></i>
                        <p>Your comment was successfully posted!</p>
                    </div>
                </form>
                <!-- End Form -->
            </div>
            <!-- End Blog All Posts -->
        </div>
    </div><!--/end container-->
</div>
<!--=== End Blog Posts ===-->

@endsection