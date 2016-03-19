
<script id="message_group" type="text/html">
 <div class="col-md-3">
            <ul class="list-group sidebar-nav-v1" id="sidebar-nav-1">
                <li class="list-group-item ">
                    
                    <a  href="" class="text-center" >好友分组</a>
                  
                </li>

                <li class="list-group-item list-toggle">
                   <span class="badge rounded" style="background-color: #46629E;">@{{normal.length}}</span> 
                    <a data-toggle="collapse" data-parent="#sidebar-nav-1" href="#collapse-normal" class="collapsed" aria-expanded="false">默认分组</a>
                    <ul id="collapse-normal" class="collapse" aria-expanded="false">

                       @{{each normal}}
                        <li><a href="/user/message/history?uid=@{{$value.uid}}&nickname=@{{$value.nickname}}"><i class="fa fa-flask"></i>@{{$value.nickname}}</a></li>
                        @{{/each}}
                        
                       
                    </ul>
                </li>
                
                @{{if group}}
                @{{each group}}
                <li class="list-group-item list-toggle">
                    <span class="badge rounded" style="background-color: #46629E;">@{{$value.person.length}}</span>
                    <a data-toggle="collapse" data-parent="#sidebar-nav-1" href="#@{{$value.id}}" class="collapsed" aria-expanded="false">@{{$value.group_name}}</a>
                    <ul id="@{{$value.id}}" class="collapse" aria-expanded="false">

                         @{{each $value.person}}
                        <li><a href="/user/message/history?uid=@{{$value.uid}}&nickname=@{{$value.nickname}}"><i class="fa fa-flask"></i>@{{$value.nickname}}</a></li>
                        @{{/each}}
                    </ul>
                </li>
                @{{/each}}
                @{{/if}}
              

                <li class="list-group-item list-toggle">
                    <span class="badge rounded" style="background-color: #46629E;">@{{black.length}}</span>
                    <a data-toggle="collapse" data-parent="#sidebar-nav-1" href="#collapse-demo-black" class="collapsed" aria-expanded="false">黑名单</a>
                    <ul id="collapse-demo-black" class="collapse" aria-expanded="false">
                    @{{each black}}
                        <li><a href="/user/message/history?uid=@{{$value.uid}}&nickname=@{{$value.nickname}}"><i class="fa fa-flask"></i>@{{$value.nickname}}</a></li>
                    @{{/each}}   
                    </ul>
                </li>
                <li class="list-group-item text-center" style="padding:15px 0;">
                    
                    <button class="btn btn-default" id="addGroup" type="button"><span class="glyphicon glyphicon-plus"></span>新建分组</button>
                    <button class="btn btn-default" type="button">管理分组</button>
                    
                  
                </li>
               
            </ul>
        </div>


          </script>