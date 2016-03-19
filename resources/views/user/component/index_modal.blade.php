<script id="userInfo" type="text/html">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <h2 class="modal-title" id="myModalLabel">@{{demand.nickname}}</h2>
                    <p>他的需求：@{{demand.content}}</p>
                    <ul class="list-inline list-unstyled topbar-list modal_list">
                        <li><i class="fa fa-user"></i></li>
                        <li>地点</li>
                        <li><i class="fa  fa-thumbs-o-up"></i>&nbsp; 99</li>

                    </ul>
                </div>
          
            </div>
        </div>
        
      </div>
      <div class="modal-body">
        <div class="container-fluid">
        		@{{each album}}	
                <div class="row" style="margin-bottom: 30px;">
                    <div class="col-sm-5 sm-margin-bottom-20">
                        <img class="img-responsive" src="@{{$value.img}}" alt="">
                    </div>
                    <div class="col-sm-7 news-v3">
                        <div class="news-v3-in-sm no-padding">
                      
                            <h2><a href="#">@{{$value.title}}</a></h2>
                            <div style="max-height:150px; white-space: nowrap;text-overflow:ellipsis; overflow:hidden;">@{{$value.content}}</div>
                            <ul class="post-shares">
                                <li>
                                    <a href="#">
                                        <i class="rounded-x icon-speech"></i>
                                        <span>5</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="rounded-x icon-share"></i>
                                        <span>9</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="rounded-x icon-heart"></i>
                                        <span>0</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @{{/each}}
         
            </div>
      </div>

    </div>
  </div>
</script>