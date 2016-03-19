@extends('user.layout.layout')



@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
    <form action="assets/php/demo-contacts-process.php" method="post" id="sky-form3" class="sky-form" novalidate="novalidate">
                        <header>
                        <section>
                            <label class="label">请选择一个分类</label>
                            <label class="input">
                                <i class="icon-append fa fa-tag"></i>
                                <section class="col col-6">
                                    <label class="select">
                                        <select name="gender">
                                            <option value="0" selected="" disabled="">原画</option>
                                            <option value="1">动作</option>
                                            <option value="2">3D</option>
                                          
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="select">
                                        <select name="gender">
                                            <option value="0" selected="" disabled="">二次元</option>
                                            <option value="1">次时代</option>
                                            <option value="2">巴拉</option>
                                            <option value="3">巴拉</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </label>
                        </section>


                        </header>

                        <fieldset>
                        <h2>描述这个项目</h2>



                            <section>
                                <label class="label">项目名称</label>
                                <label class="input">
                                    <i class="icon-append fa fa-tag"></i>
                                    <input type="text" name="subject" id="subject">
                                </label>
                            </section>

                            <section>
                                <label class="label" style="color:red">说明你这个项目是做什么的</label>
                                <label class="textarea">
                                    <i class="icon-append fa fa-comment"></i>
                                    <textarea rows="4" name="message" id="message" placeholder="">(例)我这个项目是做一个手机游戏的，主要风格类似部落战争，需要一个有类型项目经验的外包团队接手   
                                    </textarea>
                                </label>
                            </section>
                            <section>
                                <label><i class="icon-paper-clip"></i> 上传附件</label>
                           
                            </section>
                            

                            <section>
                                <div class="row">
                                <label class="checkbox" style="color:red">您是在寻找一个长期合作伙伴，还是为单个项目招募</label>
                                <section>
                                    <div class="col col-4">
                                        <label class="radio"><input type="radio" name="radio" checked=""><i class="rounded-x"></i>寻找长期合作伙伴</label>
                                        <label class="radio"><input type="radio" name="radio"><i class="rounded-x"></i>一次性项目合作</label>
                                        <label class="radio"><input type="radio" name="radio"><i class="rounded-x"></i>不确定</label>
                                    </div>
                                </section>
                                </div>
                            </section>
                            <section>
                                <div class="row">
                                <label class="checkbox" style="color:red">为这个项目你需要招募的团队规模</label>
                                <section>
                                    <div class="col col-4">
                                        <label class="radio"><input type="radio" name="radio" checked=""><i class="rounded-x"></i>1个人</label>
                                        <label class="radio"><input type="radio" name="radio"><i class="rounded-x"></i>10人以内</label>
                                        <label class="radio"><input type="radio" name="radio"><i class="rounded-x"></i>10人以上</label>
                                    </div>
                                </section>
                                </div>
                            </section>
                             <section>
                                <label class="label" style="color:red">您希望招募团队具备哪些能力</label>
                                <label class="textarea">       
                                    <textarea rows="4" name="message"  placeholder="">效率高; 有PM可以及时沟通 ；按时完成</textarea>
                                </label>
                            </section>
                            <section>
                                <div class="row">
                                <label class="checkbox" style="color:red">您希望这个项目的付款方式</label>
                                <section>
                                    <div class="col col-4">
                                        <label class="radio"><input type="radio" name="radio" checked=""><i class="rounded-x"></i>支付固定酬劳</label>
                                        <label class="radio"><input type="radio" name="radio"><i class="rounded-x"></i>按 人/天 支付</label>
                                        
                                    </div>
                                </section>
                                </div>
                            </section>
                            <section>
                                <div class="row">
                                <label class="checkbox" style="color:red">您希望接手项目团队的规模需求</label>
                                <section>
                                    <div class="col col-4">
                                        <label class="radio"><input type="radio" name="radio" checked=""><i class="rounded-x"></i>我希望支付更少的酬劳，寻找一个规模稍小的公司</label>
                                        <label class="radio"><input type="radio" name="radio"><i class="rounded-x"></i>我希望按照报价，寻找一个中等规模的公司</label>
                                         <label class="radio"><input type="radio" name="radio"><i class="rounded-x"></i>我愿意支付更高的酬劳，寻找一个高等规模的公司</label>
                                        
                                        
                                    </div>
                                </section>
                                </div>
                            </section>
                               <section>
                                <div class="row">
                                <label class="checkbox" style="color:red">您希望多久能招募到合适人选</label>
                                <section>
                                    <div class="col col-4">
                                        <label class="radio"><input type="radio" name="radio" checked=""><i class="rounded-x"></i>1星期内</label>
                                        <label class="radio"><input type="radio" name="radio"><i class="rounded-x"></i>1个月内</label>
                                         <label class="radio"><input type="radio" name="radio"><i class="rounded-x"></i>自定义</label>
                                        
                                        
                                    </div>
                                </section>
                                </div>
                            </section>
                            <h2>以下是附加条款（可填可不填）</h2>
                            </section>
                               <section>
                                <div class="row">
                                <label class="checkbox" style="color:red">您的项目需要测试？选择测试类型（选择后跳出弹框填写细节）</label>
                                <section>
                                    <div class="col col-4">
                                        <label class="radio"><input type="radio" name="radio" checked=""><i class="rounded-x"></i>付费测试</label>
                                        <label class="radio"><input type="radio" name="radio"><i class="rounded-x"></i>免费测试</label>
                                    </div>
                                </section>
                                </div>
                            </section>
                             </section>
                               <section>
                                <div class="row">
                                <label class="checkbox" style="color:red">你希望接包回答的问题</label>
                                <section>
                                    （例）如果无法按照预定时间完成任务，你会怎么做？
                                </section>
                                </div>
                            </section>

                        </fieldset>

                        <footer>
                            <button type="submit" class="button">发布任务</button>
                        </footer>

                        接发任务流程
                        <p>1.发包方 按照表单填好需求后，任务在前台展示</p>

                        <p>2.接包方对照项目需求进行报价，并简单介绍自己的情况。</p>

                        <p>3.系统将根据发包方的需求 个性化  将接包方进行分类。</p>

                        <p>4.发包方根据系统的 筛选结果，从中选择合适的接包放 进行项目合作</p>







                        <div class="message">
                            <i class="rounded-x fa fa-check"></i>
                            <p>Your message was successfully sent!</p>
                        </div>
                    </form>
    </div>

</div>


@endsection