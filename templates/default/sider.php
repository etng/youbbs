<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

if($cur_user && $cur_user['flag']>=99){
echo '
<div class="sider-box">
    <div class="sider-box-title">管理员面板 （<a href="http://youbbs.sinaapp.com/" target="_blank">YouBBS官方支持</a>）</div>
    <div class="sider-box-content">
    <div class="btn">
    <a href="/admin-node">分类管理</a><a href="/admin-setting">网站设置</a><a href="/admin-user-list">用户管理</a><a href="/admin-link-list">链接管理</a>
    </div>
    <div class="c"></div>
    </div>
</div>';
}


if($options['ad_sider_top']){
echo '
<div class="sider-box">
    <div class="sider-box-title">广而告之</div>
    <div class="sider-box-content">',$options['ad_sider_top'],'
    <div class="c"></div>
    </div>
</div>';
}


if($options['close']){
echo '
<div class="sider-box">
    <div class="sider-box-title">网站暂时关闭公告</div>
    <div class="sider-box-content">
    <h2>';
if($options['close_note']){
    echo $options['close_note'];
}else{
    echo '数据调整中。。。';
}
echo '</h2>
    <div class="c"></div>
    </div>
</div>';

}

if(isset($bot_nodes)){
echo '
<div class="sider-box">
    <div class="sider-box-title">最热主题</div>
    <div class="sider-box-content">
    <div class="btn">';
foreach(array_slice($bot_nodes, 0, intval($options['hot_node_num'])) as $k=>$v ){
    echo '<a href="/',$k,'">',$v,'</a>';
}
echo '    </div>
    <div class="c"></div>
    </div>
</div>';
}

if(isset($newest_nodes) && $newest_nodes){
echo '
<div class="sider-box">
    <div class="sider-box-title">最近添加的分类</div>
    <div class="sider-box-content">
    <div class="btn">';
foreach( $newest_nodes as $k=>$v ){
    echo '<a href="/',$k,'">',$v,'</a>';
}
echo '    </div>
    <div class="c"></div>
    </div>
</div>';
}

if(isset($links) && $links){
echo '
<div class="sider-box">
    <div class="sider-box-title">链接</div>
    <div class="sider-box-content">
    <div class="btn">';
foreach( $links as $k=>$v ){
    echo '<a href="',$v,'" target="_blank">',$k,'</a>';
}
echo '    </div>
    <div class="c"></div>
    </div>
</div>';
}

if(isset($site_infos)){
echo '
<div class="sider-box">
    <div class="sider-box-title">站点运行信息</div>
    <div class="sider-box-content">
    <ul>';
foreach($site_infos as $k=>$v){
    echo '<li>',$k,': ',$v,'</li>';
}
echo '    </ul>
    <div class="c"></div>
    </div>
</div>';
} 
?>
