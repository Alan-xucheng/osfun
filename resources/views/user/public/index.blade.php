@extends('user.layout.layout')

@section('styles')
<!-- CSS Page Style -->



<link rel="stylesheet" href="assets/plugins/fancybox/source/jquery.fancybox.css">
<link rel="stylesheet" href="assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/plugins/revolution-slider/rs-plugin/css/settings.css" type="text/css" media="screen">
<!--[if lt IE 9]><link rel="stylesheet" href="assets/plugins/revolution-slider/rs-plugin/css/settings-ie8.css" type="text/css" media="screen"><![endif]-->
        <!-- CSS Page Style -->
     <link rel="stylesheet" href="/assets/css/pages/page_job.css">
     <style type="text/css">
        .modal_list>li{
            color:#555;
        }

     </style>
@endsection


@section('content')
<!--=== Slider ===-->
<div class="tp-banner-container">
    <div class="tp-banner">
        <ul>
            <!-- SLIDE -->
            <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 1">
                <!-- MAIN IMAGE -->
                <img src="/assets/img/sliders/4.jpg" height=""  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

                <a href="#"class="tp-caption revolution-ch1 sft start" style="color:#fff"
                    data-x="center"
                    data-hoffset="0"
                    data-y="100"
                    data-speed="1500"
                    data-start="500"
                    data-easing="Back.easeInOut"
                    data-endeasing="Power1.easeIn"
                    data-endspeed="300">
                    文章标题
                </a>

               
            </li>
            <!-- END SLIDE -->



        </ul>
        <div class="tp-bannertimer tp-bottom"></div>
    </div>
</div>
<!--=== End Slider ===-->
@endsection




@section('scripts')



<script type="text/javascript" src="assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!-- JS Customization -->

<!-- JS Page Level -->

<script type="text/javascript" src="assets/js/plugins/fancy-box.js"></script>

<script type="text/javascript" src="assets/js/plugins/revolution-slider.js"></script>

@endsection

@section('jquery')
        
   
        
       
        StyleSwitcher.initStyleSwitcher();
        RevolutionSlider.initRSfullWidth();

    ProfileSocial.ModalIndex();
@endsection





