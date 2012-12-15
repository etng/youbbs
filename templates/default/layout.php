<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 
ob_start();

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>',$title,'</title>
<meta content="True" name="HandheldFriendly" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<link href="/static/default/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link href="/feed" rel="alternate" title="',htmlspecialchars($options['name']),' - ATOM Feed" type="application/atom+xml"/>
<script src="',$options['jquery_lib'],'" type="text/javascript"></script>
<link rel="top" title="Back to Top" href="#" />
';
if($options['head_meta']){
    echo $options['head_meta'];
}
if($is_spider){
    if(isset($meta_des) && $meta_des){
        echo '<meta name="description" content="',$meta_des,'" />';
    }
    if(isset($canonical)){
        echo '<link rel="canonical" href="http://',$_SERVER['HTTP_HOST'],$canonical,'" />';
    }
}
echo '
</head>
<body>
<div class="header-wrap">
    <div class="header">
        <div class="logo"><a href="/" name="top">',htmlspecialchars($options['name']),'</a></div>
        <div class="scbox">
        <form role="search" method="get" id="searchform" action="http://www.google.com/search" target="_blank">
            <input type="hidden" maxlength="30" name="q" value="site:',$_SERVER['HTTP_HOST'],'">
            <input type="text" value="" name="q" id="s">
        </form>
        </div>
        <div class="banner">';
        
if($cur_user){
    echo '<img src="/avatar/mini/',$cur_user['avatar'],'.png" alt="',$cur_user['name'],'"/>&nbsp;&nbsp;&nbsp;';
    
    if($cur_user['notic']){
        $notic_n = count(array_unique(explode(',', $cur_user['notic'])))-1;
        echo '<a href="/notifications" style="color:yellow;">',$notic_n,'条提醒</a>&nbsp;&nbsp;&nbsp;';
    }
    if($cur_user['flag'] == 0){
        echo '<span style="color:yellow;">已被禁用</span>&nbsp;&nbsp;&nbsp;';
    }else if($cur_user['flag'] == 1){
        echo '<span style="color:yellow;">在等待审核</span>&nbsp;&nbsp;&nbsp;';
    }
    echo '<a href="/favorites" title="收藏的帖子">★</a>&nbsp;&nbsp;&nbsp;<a href="/member/',$cur_user['id'],'">',$cur_user['name'],'</a>&nbsp;&nbsp;&nbsp;<a href="/setting">设置</a>&nbsp;&nbsp;&nbsp;<a href="/logout">退出</a>';
}else{
    if($options['qq_appid'] && $options['qq_appkey']){
        echo '<a href="/qqlogin" rel="nofollow"><img src="/static/connect_logo_7.png" alt="QQ微博登录"/></a>';
    }else{
        echo '<a href="/login" rel="nofollow">登录</a>';
        if(!$options['close_register']){
            echo '&nbsp;&nbsp;&nbsp;<a href="/sigin" rel="nofollow">注册</a>';
        }
    }
}
echo '       </div>
        <div class="c"></div>
    </div>
    <!-- header end -->
</div>

<div class="main-wrap">
    <div class="main">
        <div class="main-content">';
        
include($pagefile);

echo '       </div>
        <!-- main-content end -->
        <div class="main-sider">';

include(dirname(__FILE__) . '/sider.php');
echo '       </div>
        <!-- main-sider end -->
        <div class="c"></div>
    </div>
    <!-- main end -->
    <div class="c"></div>
</div>';

echo '
<div class="footer-wrap">
    <div class="footer">
    <p>&copy; Copyright <a href="/">',$options['name'],'</a> • <a href="/feed">Atom Feed</a>';
if($options['icp']){
    echo ' • <a href="http://www.miibeian.gov.cn/" target="_blank" rel="nofollow">',$options['icp'],'</a>';
}
if($is_mobie){
    echo ' • <a href="/viewat-mobile">手机模式</a>';
}

echo '    </p>
    <p>Powered by <a href="http://youbbs.sinaapp.com/" target="_blank">YouBBS v',SAESPOT_VER,'</a></p>';
if($options['show_debug']){
    $mtime = explode(' ', microtime());
    $totaltime = number_format(($mtime[1] + $mtime[0] - $starttime), 6);
    echo '<p>Processed in ',$totaltime,' second(s), ',$DBS->querycount,' queries</p>';
}
echo '    </div>
    <!-- footer end -->
</div>

<script src="/static/js/jquery.lazyload.min.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" charset="utf-8">
$(function() {
    $(".main-box img").lazyload({
        //placeholder : "/static/grey.gif",
        //effect : "fadeIn"
    });
});
</script>
';
if($options['analytics_code']){
    echo $options['analytics_code'];
}

echo '
</body>
</html>';

$_output = ob_get_contents();
ob_end_clean();
echo $_output;

?>