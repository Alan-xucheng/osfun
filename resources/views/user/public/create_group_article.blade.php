@extends('user.layout.layout')

@section('meta')

<meta name="group_id" content="{{$group_id}}">
@endsection
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
         
<!--                  --><li><a href="" >红人专辑</a></li>
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
                   

                   
                    <p>帖子内容……（可直接在此页编辑）。</p>


          




                
                    
                    

                    </div>
                    <div class="ladda-btn pull-right">
                        <p>
                            <button class="btn-u  btn-u-blue ladda-button" id="saveArticle"  data-style="contract-overlay"><span class="ladda-label">保存</span><span class="ladda-spinner"></span></button>
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



  ProfileSocial.createGroupArticle();
  OrderForm.initOrderForm();
















@endsection










