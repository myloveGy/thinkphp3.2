<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Loveme刘星个人博客</title>
    <meta name="keywords" content="Loveme刘星个人博客,Loveme刘星,个人博客,博客" />
    <meta name="description" content="Loveme刘星个人博客" />

    <!--移动优先-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--引入公共CSS文件-->
    <link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Public/Home/css/base.css" />

    <!--引入公共js文件-->
    <script type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/js/base.js"></script>
    <script type="text/javascript" src="/Public/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="/Public/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/Public/js/validate.message.js"></script>
    <script type="text/javascript" src="/Public/js/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/js/layer/extend/layer.ext.js"></script>
    <style type="text/css">div#navbar ul.nav li.<?php if(!empty($_SESSION['my_user'])): ?>no<?php else: ?>is<?php endif; ?>-login{display:none}</style>
</head>
<body>
<!--导航栏-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">我的个人博客</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">
                <li <?php if(ACTION_NAME == 'index'): ?>class="active"<?php endif; ?>><a href="/">首页</a></li>
                <li <?php if(ACTION_NAME == 'article' || ACTION_NAME == 'articleView'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Index/article');?>">文章</a></li>
                <!--<li><a href="javascript:;">心情</a></li>-->
                <li <?php if(ACTION_NAME == 'image'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Index/image');?>">相册</a></li>
                <!--<li><a href="javascript:;">留言</a></li>-->
                <li class="no-login"><a href="javascript:;" class="login is-user">登录</a></li>
                <li class="dropdown is-login">
                    <a class="dropdown-toggle is-user" aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" href="#">
                        <span class="text-success user"><?php echo (cookie('my_user')); ?></span>
                        个人中心
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:;" class="publish-article is-user">发布文章</a></li>
                        <!--<li><a href="javascript:;" class="publish-mood is-user">发表心情</a></li>-->
                        <li><a href="javascript:;" class="file-upload is-user">上传图片</a></li>
                    </ul>
                </li>
                <li class="is-login"><a href="javascript:;" class="logout"><span class="text-danger">退出</span></a></li>
            </ul>
        </div>
    </div>
</nav>

<!--主要内容-->
<div class="container content">
    <div class="row">
        <div class="col-md-8 f_l">
        <div class="banner">
    <div id="slide-header" class="carousel slide" data-ride="carousel">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <?php if(is_array($images)): foreach($images as $key=>$value): ?><li data-target="#slide-header" data-slide-to="<?php echo ($key); ?>" <?php if($key == 0): ?>class="active"<?php endif; ?>></li><?php endforeach; endif; ?>
        </ol>

        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            <?php if(is_array($images)): foreach($images as $key=>$value): ?><div class="item <?php if($key == 0): ?>active<?php endif; ?>">
                <img src="<?php echo ($value["url"]); ?>" class="img-responsive" alt="First slide">
                <div class="carousel-caption">
                    <h3><?php echo ($value["title"]); ?></h3>
                    <p><?php echo ($value["desc"]); ?></p>
                </div>
            </div><?php endforeach; endif; ?>
        </div>

        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control left" href="#slide-header" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">上一张</span>
        </a>
        <a class="carousel-control right" href="#slide-header" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">下一张</span>
        </a>
    </div>
</div>
<div class="topnews layer-photos-demo" id="layer-photos-demo">
    <h2>
        <!--<span>-->
            <!--<a href="/" target="_blank">栏目标题</a>-->
            <!--<a href="/" target="_blank">栏目标题</a>-->
            <!--<a href="/" target="_blank">栏目标题</a>-->
        <!--</span>-->
        <b>文章</b>
        推荐
    </h2>
    <?php if(is_array($articles)): foreach($articles as $key=>$value): ?><div class="blogs">
        <figure><img src="<?php echo ($value["img"]); ?>"></figure>
        <ul>
            <h3><a href="<?php echo U('Index/articleView', array('id'=> $value['id']));?>"><?php echo (mb_strimwidth($value["title"],0,60,'...', 'utf-8')); ?></a></h3>
            <p>引导语：<?php echo (mb_strimwidth($value["content"],0,300,'...', 'utf-8')); ?></p>
            <p class="autor">
                <span class="lm f_l"><a href="<?php echo U('Index/articleView', array('id'=> $value['id']));?>">个人博客</a></span>
                <span class="dtime time f_l"><?php echo ($value["create_time"]); ?></span>
                <span class="viewnum f_r">浏览（<a href="<?php echo U('Index/articleView', array('id'=> $value['id']));?>"><?php echo ($value["see_num"]); ?></a>）</span>
                <span class="pingl f_r">评论（<a href="<?php echo U('Index/articleView', array('id'=> $value['id']));?>"><?php echo ($value["comment_num"]); ?></a>）</span>
            </p>
        </ul>
    </div><?php endforeach; endif; ?>
    <div><?php echo ($page); ?></div>
</div>
        </div>
        <!--右边内容-->
        <div class="col-md-4 f_l">
            <div class="tit01">
                <h3>关注我</h3>
                <div class="gzwm">
                    <ul>
                        <li><a class="xlwb" href="http://weibo.com/5461227479" target="_blank">新浪微博</a></li>
                        <li><a class="txwb" href="http://t.qq.com/liu821901008" target="_blank">腾讯微博</a></li>
                        <li><a class="rss" href="javascript:;">RSS</a></li>
                        <li><a class="wx" href="mailto:821901008@qq.com">邮箱</a></li>
                    </ul>
                </div>
            </div>
            <!--tit01 end-->
            <div class="ad300x100">
                <img src="/Public/Home/images/ad300x100.jpg">
            </div>

            <div class="moreSelect" id="lp_right_select">
                <div class="ms-top">
                    <ul class="nav nav-tabs">
                        <li class="active" ><a href="#home" data-toggle="tab">点击排行</a></li>
                        <li><a href="#myhome" data-toggle="tab">最新文章</a></li>
                        <li><a href="#recommend" data-toggle="tab">站长推荐</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                        <ul>
                            <?php if(is_array($sees)): foreach($sees as $key=>$value): ?><li><a href="<?php echo U('Index/articleView', array('id' => $value['id']));?>" title="<?php echo ($value["title"]); ?>"><?php echo (mb_strimwidth($value["title"],0,40,"...","utf-8")); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                    <div  class="tab-pane fade" id="myhome">
                        <ul>
                            <?php if(is_array($comms)): foreach($comms as $key=>$value): ?><li><a href="<?php echo U('Index/articleView', array('id' => $value['id']));?>" title="<?php echo ($value["title"]); ?>"><?php echo (mb_strimwidth($value["title"],0,40,"...","utf-8")); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="recommend">
                        <ul>
                            <?php if(is_array($recoms)): foreach($recoms as $key=>$value): ?><li><a href="<?php echo U('Index/articleView', array('id' => $value['id']));?>" title="<?php echo ($value["title"]); ?>"><?php echo (mb_strimwidth($value["title"],0,46,"...","utf-8")); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>
                <!--ms-main end -->
            </div>
            <!--切换卡 moreSelect end -->
            <div class="tuwen">
                <h3>图文推荐</h3>
                <ul>
                    <?php if(is_array($timgs)): foreach($timgs as $key=>$value): ?><li>
                            <a href="<?php echo U('Index/articleView', array('id' => $value['id']));?>">
                                <img width="75px" height="70px" src="<?php echo ($value["img"]); ?>" />
                                <b><?php echo (mb_strimwidth($value["title"],0,36,"...","utf-8")); ?></b>
                            </a>
                            <p>
                                <span class="glyphicon glyphicon-star m-a"><a href="<?php echo U('Index/articleView', array('id' => $value['id']));?>">编程</a></span>
                                <span class="dtime time p-left-20"><?php echo ($value["create_time"]); ?></span>
                            </p>
                        </li><?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="ad"> <img src="/Public/Home/images/03.jpg"> </div>
            <div class="links">
                <h3><span>[<a href="/">申请友情链接</a>]</span>友情链接</h3>
                <ul>
                    <li><a href="/">web开发</a></li>
                    <li><a href="/">前端设计</a></li>
                    <li><a href="/">Html</a></li>
                    <li><a href="/">CSS3</a></li>
                    <li><a href="/">Html5+css3</a></li>
                    <li><a href="/">百度</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--悬浮DIV-->
<div id="tbox">
    <a id="togbook" href="/"></a>
    <a id="gotop" href="javascript:;"></a>
</div>

<!-- 登录页面 -->
<div id="login" class="hidden ">
    <div class="container-fluid">
        <div class="row" style="margin:30px auto 5px auto">
            <form class="form-horizontal user-login" name="login" onsubmit="return userLogin(this);">
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">用户名：</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="username" required="true" rangelength="[2,10]" id="username" placeholder="用户名">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">密码：</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="password" required="true" rangelength="[2,16]" id="password" placeholder="密码">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                        <button type="submit" class="btn btn-success">登 录</button>　
                        <button type="reset" class="btn btn-default">取 消</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--弹出model-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">发布文章</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal article" name="article">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" required="true" rangelength="[2,50]" name="title" placeholder="标题">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileimg" class="col-sm-2 control-label">导图</label>
                        <div class="col-sm-10 bs-example-bg-classes">
                            <input type="hidden" name="img" id="img" />
                            <input type="file" id="fileimg" class="fileUpload" />
                            <p class="text-warning bg-danger m-top-5 p-10">只允许上传（jpg, jpeg, png, gif） 格式的图片哦!</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-sm-2 control-label" placeholder="输入您想发表的内容哦">内容</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="content" required="true" name="content" rows="5"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary btn-article">确定发布</button>
            </div>
        </div>
    </div>
</div>

<!--弹出model-->
<div class="modal fade" id="myImage" tabindex="-1" role="dialog" aria-labelledby="myImageLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myImageLabel">上传图片</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal image" name="image">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">图片标题</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required="true" rangelength="[2,50]" name="title" placeholder="标题">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileimg" class="col-sm-2 control-label">上传图片</label>
                        <div class="col-sm-10 bs-example-bg-classes">
                            <input type="hidden" name="url" />
                            <input type="file" class="fileUpload" />
                            <p class="text-warning bg-danger m-top-5 p-10">只允许上传（jpg, jpeg, png, gif） 格式的图片哦!</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">图片类型</label>
                        <div class="col-sm-10 bs-example-bg-classes">
                            <label class="radio-inline">
                                <input type="radio" name="type" required="true" number="true" value="1" /> 轮播图片
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="type" required="true" number="true" value="2" checked="true"/> 普通图片
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-sm-2 control-label" >图片说明</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rangelength="[2,200]" name="desc" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary btn-image">确定上传</button>
            </div>
        </div>
    </div>
</div>

<!--尾部信息-->
<footer class="footer text-center">
    <ul>
        <li><a href="/">首页</a></li>
        <li><a href="/">关于我</a></li>
        <li><a href="/">文章</a></li>
        <li><a href="/">心情</a></li>
        <li><a href="/">相册</a></li>
        <li><a href="/">留言</a></li>
    </ul>
    <p>刘星个人博客 821901008@qq.com </p>
</footer>
<!--文件上传-->
<script type="text/javascript" src="/Public/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="/Public/js/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="/Public/js/jquery.fileupload.js"></script>

<script type="text/javascript">
    var isHave = false, Obj = {errorPlacement:validate},lLayer, l, loginurl = "<?php echo U('Index/login');?>";
    // 请求错误回应
    function requestError(){layer.close(l);layer.msg('服务器繁忙,请稍候再试...');}
    // 验证函数
    function validate(error, errorPlacement){if (isHave != false) return false;isHave = layer.tips($(error).html(), errorPlacement, {tips: [3], time:1000, end:function(){isHave = false;}});}
    // 验证登录
    function isLogin(){if ($.cookie('my_user') === null) {sLogin(); return false;} return true;}
    // 执行登录
    function userLogin(obj){l = layer.load();/* 验证登录*/if ($(obj).validate(Obj).form()) {$.ajax({url: loginurl, data:$(obj).serialize(),type:'post',dataType:'json',error:requestError,success:function(json){layer.close(l);var i = json.status == 1 ? 6 : 5;if (json.status == 1) layer.close(lLayer);layer.msg(json.msg, {icon:i,time:1000, end:function(){if (json.status == 1) changUser(json.data);}})},})}return false;}
    // 用户登录和退出切换
    function changUser(params){var sx = params !== null ? '.no-login' : '.is-login',sh = params !== null ? '.is-login' : '.no-login';$.cookie('my_user', params);$('.user').html(params);$(sx).fadeOut(1000, function(){$(sh).fadeIn(1000)});}
    // 显示登录页面
    function sLogin(){var w = $(window).width() * 0.25 > 355 ? '25%': '100%',s = Math.floor(Math.random() * 7);lLayer =layer.open({title:'用户登录',type:1,shift:s,shadeClose:true,area:[w, 'auto'],content:$('#login').html()});}
    // 添加文章数据
    function article(params){var html = '', len = params.length;for(var i = 0 ; i < len ; i ++) {var data = params[i];if (empty(data.img)) data.img = $('div.blogs figure img').attr('src');html += '<div class="blogs"><figure><img src="' + data.img + '"></figure><ul><h3><a href="/">' + data.title +  '</a></h3><p>引导语：' + data.content + '</p>';html += '<p class="autor"><span class="lm f_l"><a href="/">个人博客</a></span><span class="dtime f_l">' + timeFormat(data.create_time) + '</span><span class="viewnum f_r">浏览（<a href="/">0</a>）</span><span class="pingl f_r">评论（<a href="/">0</a>）</span></p>';html += '</ul></div>';}$('.topnews h2').after(html);}

    $(function(){
        // 用户退出
        $('.logout').click(function(){if (isLogin()){layer.confirm('您确定要退出登录吗?', {title:'温馨提醒',btn: ['确定退出', '取消'],icon:3,shift:4,}, function(){l = layer.load();$.get('<?php echo U("Index/logout");?>', function(json){layer.close(l);layer.msg(json.msg, {time:1000, end:function(){if (json.status == 1) changUser(null)}});}, 'json');}, function(){layer.msg('您取消了退出登录！', {time:1000});});}});
        // 登录可以操作
        $('.is-user').click(function(e){e.preventDefault();return isLogin();});
        // 回顶部自动判断
        $(window).scroll(function(){if ($(window).scrollTop() > 250){$('#tbox').fadeIn();}else{$('#tbox').fadeOut();}});
        // 时间显示
        $('.time').each(function(){$(this).html(timeFormat(parseInt($(this).html())))});
        // 回到顶部
        $('#gotop').click(function(){$('body,html').animate({scrollTop:0},1000);});
        // 弹出model
        $('.publish-article').click(function(){$('#myModal').modal();});
        // 关闭modal
        $('#myModal').on('hide.bs.modal', function(e){document.article.reset();});
        // 发布文章
        $('.btn-article').click(function(){if (isLogin()){if ($('.article').validate(Obj).form()){l = layer.load();$.ajax({url: '<?php echo U("User/insert");?>', data:$('.article').serialize(),type:'post',dataType:'json',success:function(json){layer.close(l);var s = json.status == 1 ? 6 : 5;if (json.status == 1) {$('#myModal').modal('hide');}layer.msg(json.msg, {time:2000, icon:s, end:function(){article([json.data]);}})},error:requestError,})}}return false;})
        // 弹出model
        $('.file-upload').click(function(){$('#myImage').modal();});
        // 关闭modal
        $('#myImage').on('hide.bs.modal', function(e){document.image.reset();});
        // 上传图片
        $('.btn-image').click(function(){if (isLogin()){if ($('.image').validate(Obj).form()){l = layer.load();$.ajax({url: '<?php echo U("User/addImg");?>', data:$('.image').serialize(),type:'post',dataType:'json',success:function(json){layer.close(l);var s = json.status == 1 ? 6 : 5;if (json.status == 1) {$('#myImage').modal('hide');}layer.msg(json.msg, {time:2000, icon:s})},error:requestError,})}}return false;})
        // 图片显示
        layer.photos({photos:"#layer-photos-demo"});
        // 图片上传
        FileUpload("<?php echo U('User/fileUpload');?>", '.fileUpload', undefined, 200000000);
    })
</script>
</body>
</html>