<?php 
/**
* ZhiPHP 值得买模式的海淘网站程序
* ====================================================================
* 版权所有 杭州言商网络有限公司，并保留所有权利。
* 网站地址: http://www.zhiphp.com
* 交流论坛: http://bbs.pinphp.com
* --------------------------------------------------------------------
* 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
* 使用；不允许对程序代码以任何形式任何目的的再发布。
* ====================================================================
* Author: brivio <brivio@qq.com>
* 授权技术支持: 1142503300@qq.com
*/
return array(
    'APP_GROUP_LIST' => 'home,admin,mobile', 
    'DEFAULT_GROUP' => 'home', 
    'DEFAULT_MODULE' => 'index', 
    'TAGLIB_PRE_LOAD' => 'pin,list', 
    'APP_AUTOLOAD_PATH' => '@.Pintag,@.Pinlib,@.ORG', 
    'TMPL_ACTION_SUCCESS' => 'public:success',
    'TMPL_ACTION_ERROR' => 'public:error',
    'DATA_CACHE_SUBDIR' => true, 
    'DATA_PATH_LEVEL' => 3, 
    'DATA_CACHE_TIME' => 3600,
    'LOAD_EXT_CONFIG' => 'url,db', 
    'SHOW_PAGE_TRACE' => false,
    'HTML_SUFFIX_LIST'=>array(''=>'无','.html'=>'html','.htm'=>'htm','.shtml'=>'shtml'),
    'PATHINFO_DEPR_LIST'=>array('-'=>'横线-','\/'=>'斜线/'),
    'URL_TYPE_LIST' => array(
        'dm' => '多麦',
        'yqf' => '亿起发',
        'other' => '其他',
        'empty' => '未填写',
    ),
    'YESNO' => array('否', '是'),
    'ZHIAPI_URL' => 'http://data.insuny.com',
    'URL_ROUTER_ON'=>true,
    'ZHI_DETAIL_REWRITE_TYPE'=>array(
        'orig'=>'<span >原始链接</span>',
        'rewrite'=>'伪静态',
        'date'=>'日期型',
        'dir'=>'目录型'
    ),
    'URL_ROUTE_RULES'=>array(
        '/^index.html$/' => 'index/index',
        '/^index-p(\d+).html$/' => 'index/index?p=:1',
        '/^go-(\d+).html$/' => 'index/go?id=:1',
        '/^detail-(\d+).html$/' => 'post/index?id=:1',
        '/^zhi\/detail-(\d+).html$/' => 'post/index?id=:1',
        '/^[0-9]{4}\/[0-9]{1,2}\/detail-(\d+).html$/' => 'post/index?id=:1',
        '/^read\/(\d+)\/$/' => 'post/index?id=:1',
        '/^zhi-(\w+).html$/' => 'post/index?post_key=:1',
        '/^baoliao.html$/' => 'post/submit',
        '/^article\/(\d+)\/$/' => 'article/index?id=:1',
//        '/^forum\/(\w+)\/$/' => 'post_cate/index?id=:1',
//        '/^forum\/(\w+)\/(\d+)\/$/' => 'post_cate/index?id=:1&p=:2',
        '/^forum\/zhi$/' => 'post_cate/index?id=1',
        '/^forum\/haitao$/' => 'post_cate/index?id=4',
        '/^forum\/jd3c$/' => 'post_cate/index?id=5',
        '/^forum\/meizhuang$/' => 'post_cate/index?id=6',
        '/^forum\/meishi$/' => 'post_cate/index?id=7',
        '/^forum\/riyong$/' => 'post_cate/index?id=8',
        '/^forum\/fushi$/' => 'post_cate/index?id=10',
        '/^forum\/muying$/' => 'post_cate/index?id=11',
        '/^forum\/huwai$/' => 'post_cate/index?id=13',
        '/^forum\/other$/' => 'post_cate/index?id=14',

        '/^forum\/zhi\/(\d+)\/$/' => 'post_cate/index?id=1&p=:1',
        '/^forum\/haitao\/(\d+)\/$/' => 'post_cate/index?id=4&p=:1',
        '/^forum\/jd3c\/(\d+)\/$/' => 'post_cate/index?id=5&p=:1',
        '/^forum\/meizhuang\/(\d+)\/$/' => 'post_cate/index?id=6&p=:1',
        '/^forum\/meishi\/(\d+)\/$/' => 'post_cate/index?id=7&p=:1',
        '/^forum\/riyong\/(\d+)\/$/' => 'post_cate/index?id=8&p=:1',
        '/^forum\/fushi\/(\d+)\/$/' => 'post_cate/index?id=10&p=:1',
        '/^forum\/muying\/(\d+)\/$/' => 'post_cate/index?id=11&p=:1',
        '/^forum\/huwai\/(\d+)\/$/' => 'post_cate/index?id=13&p=:1',
        '/^forum\/other\/(\d+)\/$/' => 'post_cate/index?id=14&p=:1',





        '/^mall\/$/' => 'mall/index',
        '/^mall\/(\d+)\/$/' => 'mall/info?id=:1',
        '/^mall-c(\d+).html$/' => 'mall/index?cate=:1',
        '/^mall-c(\d+)-p(\d+).html$/' => 'mall/index?cate=:1&p=:2',
        '/^mall-w(\w+).html$/' => 'mall/index?word=:1',
        '/^mall-w(\w+)-c(\d+).html$/' => 'mall/index?word=:1&cate=:2',
        '/^mall-w(\w+)-c(\d+)-p(\d+).html$/' => 'mall/index?word=:1&cate=:2&p=:3',
        '/^shop\/$/' => 'shop/index',
        '/^shop\/(\d+)\/$/' => 'shop/info?id=:1',
        '/^shop-c(\d+).html$/' => 'shop/index?cate=:1',
        '/^shop-c(\d+)-p(\d+).html$/' => 'shop/index?cate=:1&p=:2',
        '/^shop-w(\w+).html$/' => 'shop/index?word=:1',
        '/^shop-w(\w+)-c(\d+).html$/' => 'shop/index?word=:1&cate=:2',
        '/^shop-w(\w+)-c(\d+)-p(\d+).html$/' => 'shop/index?word=:1&cate=:2&p=:3',
        '/^jiukuaiyou\/$/' => 'jiukuaiyou/index',
        '/^jiukuaiyou-(\w+)-(\d+)-(\d+).html$/' => 'jiukuaiyou/index?state=:1&c1=:2&c2=:3',
        '/^jiukuaiyou-(\d+)-(\d+).html$/' => 'jiukuaiyou/index?c1=:1&c2=:2',
        '/^jiukuaiyou-(\d+).html$/' => 'jiukuaiyou/detail?id=:1',
        '/^jiukuaiyou-p(\d+).html$/' => 'jiukuaiyou/index?p=:1',
        '/^jiukuaiyou-go(\d+).html$/' => 'jiukuaiyou/go?id=:1',
        '/^zhe\/detail-(\d+).html$/' => 'jiukuaiyou/detail?id=:1',
        '/^[0-9]{4}\/[0-9]{1,2}\/item-(\d+).html$/' => 'jiukuaiyou/detail?id=:1',
        '/^item\/(\d+)\/$/' => 'jiukuaiyou/detail?id=:1',
        '/^zhe-(\w+).html$/' => 'jiukuaiyou/detail?post_key=:1', 
        '/^exchange.html$/' => 'exchange/index',
        '/^exchange-c(\d+).html$/' => 'exchange/index?cid=:1',
        '/^exchange-p(\d+).html$/' => 'exchange/index?p=:1',
        '/^exchange-c(\d+)-p(\d+).html$/' => 'exchange/index?cid=:1&p=:2',
        '/^exchange-(\d+).html$/' => 'exchange/detail?id=:1',
        '/^login.html$/' => 'user/login',
        '/^login.html?ret_url=(\w+)$/' => 'user/login?ret_url=:1',
        '/^register.html$/' => 'user/register',
        '/^logout.html$/' => 'user/logout',
        '/^logout.html?ret_url=(\w+)$/' => 'user/logout?ret_url=:1',
        '/^qq.html$/' => 'oauth/index?mod=qq',
        '/^qq-cb.html$/' => 'oauth/callback?mod=qq',
        '/^sina.html$/' => 'oauth/index?mod=sina',
        '/^sina-cb.html$/' => 'oauth/callback?mod=sina',
        '/^taobao.html$/' => 'oauth/index?mod=taobao',
        '/^taobao-cb.html$/' => 'oauth/callback?mod=taobao',
        '/^faq.html$/' => 'help/faq?cate_id=19',
        '/^fanli.html$/' => 'help/faq?cate_id=20',
        '/^flink.html$/' => 'help/flink',
        '/^about.html$/' => 'help/page?id=2',
        '/^contact.html$/' => 'help/page?id=3',
        '/^partner.html$/' => 'help/page?id=4',
        '/^weixin.html$/' => 'help/page?id=12',
        '/^friends.html$/' => 'help/page?id=23',
        '/^soule_rule.html$/' => 'help/page?id=6',
        '/^user.html$/' => 'user/index',
        '/^profile.html$/' => 'user/profile',
        '/^bind.html$/' => 'user/bind',
        '/^binding.html$/' => 'user/binding',
        '/^password.html$/' => 'user/password',
        '/^comments.html$/' => 'user/comments',
        '/^comments-(\d+).html$/' => 'user/comments?p=:1',
        '/^favs.html$/' => 'user/favs',
        '/^favs-(\d+).html$/' => 'user/favs?p=:1',
        '/^baoliao-list.html$/' => 'user/baoliao',
        '/^baoliao-(\d+).html$/' => 'user/baoliao?type=:1',
        '/^baoliao-(\d+)-(\d+).html$/' => 'user/baoliao?type=:1&p=:2',
        '/^score_log.html$/' => 'user/score_log',
        '/^score_log-(\d+).html$/' => 'user/score_log?p=:1',
        '/^score_order.html$/' => 'user/score_order',
        '/^score_order-(\d+).html$/' => 'user/score_order?p=:1',
        '/^user_address.html$/' => 'user/address',
        '/^user_address-p(\d+).html$/' => 'user/address?p=:1',
        '/^user_anhao.html$/' => 'user/anhao',
        '/^user_anhao-p(\d+).html$/' => 'user/anhao?p=:1',
        '/^message.html$/' => 'user/message',
        '/^message-(\d+).html$/' => 'user/message?p=:1',
        '/^ad-(\d+).html$/' => 'advert/tgo?id=:1',         
    ),
);