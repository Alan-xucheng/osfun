@extends('user.layout.layout')

@section('styles')

<link rel="stylesheet" href="/assets/css/pages/profile.css">
<link rel="stylesheet" href="/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">

<link rel="stylesheet" href="/libs/tag/jquery.tagsinput.min.css">
<link rel="stylesheet" href="/bower_components/medium-editor/dist/css/medium-editor.min.css">
<link rel="stylesheet" href="/bower_components/medium-editor/dist/css/themes/default.css" id="medium-editor-theme">
<link rel="stylesheet" href="/assets/plugins/ladda-buttons/css/custom-lada-btn.css">
<!-- Font Awesome for awesome icons. You can redefine icons used in a plugin configuration -->

<!-- The plugin itself -->
<link rel="stylesheet" href="/bower_components/medium-editor-insert-plugin/dist/css/medium-editor-insert-plugin.min.css">
<style>

   
    .cropit-preview {
      background-color: #f8f8f8;
      background-size: cover;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-top: 7px;
      width: 331px;
      height: 209px;
    }

    .cropit-preview-image-container {
      cursor: move;
    }
    .jconfirm .jconfirm-box div.content-pane .content img{
      width: auto;
      height: auto;
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
@section('breadcrumbs')
    <div class="breadcrumbs" >
        <div class="container">
            <ul class="pull-left breadcrumb" id="breadTag">
            
                <li style="font-size:20px;cursor: pointer;" >1.内容</li>
                <li class="active" style="cursor: pointer;">2.封面</li>
            </ul>
            <ul class="pull-right breadcrumb">
         
                <li><a href="" >红人专辑</a></li>
                <li class="active">创作专辑</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

@endsection

@section('content')
<div class="container content profile">
    <div class="row">
        <!-- Profile Content -->
            <div class="col-md-12">
                <div class="">
                  
                    <div class="editable" data-placeholder="说点什么吧！"  data-filed-id="content">
                    @if($album->content)

                    {!!$album->content!!}

                    @else

                    <h1>示例文章</h1>
                    <p>我们第一次谈论 HTML5 要改变世界大概是因为乔布斯，他坚持在 iOS 上不兼容 Flash，在 Adobe 统治多媒体开发的那个年代，这需要付出极大的勇气。这么多年过去了，虽然所有人都在谈论 HTML5，但是大部分人甚至都忘了它还是一个仍在完善中的体系。</p>

                    <p>2007年W3C（万维网联盟）立项 HTML5，直至 2014年10月 底，这个长达八年的规范终于正式定稿。接下来，HTML5 将真正开始颠覆原生（Native） App 世界。虽然这种危言耸听已经让人有点厌烦。但是如果回顾 HTML 这些年走过的路，你就不会再怀疑它的能量。</p>

                    <p><strong>一、HTML5 的诞生</strong></p>

                    <p>自 W3C 于 1999年 发布 HTML4 后，Web 世界快速发展，一片繁荣。人们一度认为 HTML 标准不需要升级了。一些致力于发展 Web App 的公司另行成立了 WHATWG 组织，直到 2007年，W3C 从 WHATWG 接手相关工作，重新开始发展 HTML5。</p>

                    <p>HTML5 的发展史，有用户的需求在推动，有技术开发者的需求在推动，更有巨大的商业利益在推动。在互联网的早期，对用户而言，能打开浏览器接入到互联网世界就是一个神奇的事情，但互联网发展到 2005年 前后，开始出现下一个变化，就是宽带互联。</p>

                    <p>随着宽带的普及和电脑性能的增强，人们不再满足于单纯的通过互联网看新闻、收发邮件，消耗更高带宽的娱乐产品开始出现，就是流视频和网页游戏。其实视频和游戏是古老的需求，在互联网不普及的时候，需求的满足方式是离线传输的 VCD 和游戏光盘；后来互联网逐渐普及，人们更改了使用方式，通过下载软件 + 本地媒体播放器来看视频，下载体积较大的端游玩游戏。</p>

                    <p>但是对消费者体验更好的新方式还是出现并颠覆了以前的一切，那就是流媒体和网页游戏。Youtube 等公司把握住潮流飞速崛起，各种页游公司也如雨后春笋。</p>

                    <p>HTML 标准没有把握住产业的变化及时演进，浏览器产品也未升级，这块新需求被浏览器插件满足了，那就是 Flash。这个部署在亿万浏览器里的商业插件俨然成为事实标准。2005年Adobe 巨资收购 Macromedia，把 Flash 收归旗下，紧接着大幅推广 FLV 流媒体和 action script 语言，很明显这桩收购可以列为 IT 并购的经典案例，FLV 流媒体和 Flash 游戏风靡互联网，Adobe 在新的产业升级中攫取了大量的利润。</p>

          




                    @endif
                    
                    

                    </div>
                    <div class="ladda-btn pull-right">
                        <p>
                            <button class="btn-u  btn-u-blue ladda-button" id="saveAlbum" cover="{{$cover->id}}" data-style="contract-overlay"><span class="ladda-label">保存</span><span class="ladda-spinner"></span></button>
                        </p>
                    </div>


                   
                </div>
            </div>
    </div>

</div>  


@endsection

@section('scripts')
<script src="/libs/cropit/jquery.cropit.js"></script>
<script type="text/javascript" src="/assets/plugins/counter/waypoints.min.js"></script>
<script type="text/javascript" src="/assets/plugins/counter/jquery.counterup.min.js"></script>
<script type="text/javascript" src="/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script><script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>

<script type="text/javascript" src="/assets/js/forms/order.js"></script>
<script src="/libs/tag/jquery.tagsinput.min.js"></script>
<script src="/bower_components/medium-editor/dist/js/medium-editor.js"></script>
<script src="/bower_components/handlebars/handlebars.runtime.min.js"></script>
<script src="/bower_components/jquery-sortable/source/js/jquery-sortable-min.js"></script>
<!-- Unfortunately, jQuery File Upload Plugin has a few more dependencies itself -->
<script src="/bower_components/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="/bower_components/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
<script src="/bower_components/blueimp-file-upload/js/jquery.fileupload.js"></script>
<!-- The plugin itself -->
<script src="/bower_components/medium-editor-insert-plugin/dist/js/medium-editor-insert-plugin.js"></script>

<script src="/bower_components/js/templates.js"></script>
<script src="/bower_components/js/core.js"></script>
<script src="/bower_components/js/embeds.js"></script>
<script src="/bower_components/js/images.js"></script>
<script src="/assets/plugins/ladda-buttons/js/spin.min.js"></script>
<script src="/assets/plugins/ladda-buttons/js/ladda.min.js"></script>






@endsection

@section('jquery')

  App.initCounter();
  App.initScrollBar();
  ProfileSocial.initDemand();
  ProfileSocial.createAlbum();
  OrderForm.initOrderForm();
















@endsection










