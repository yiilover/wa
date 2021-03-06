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
class post_cateAction extends frontendAction {

    public function index() {
        $cate_id = $_REQUEST['id'];
        $this->_assign_hot_list();
        $this->assign('id',$cate_id);
        $info=D("post_cate")->where(array('id'=>$cate_id))->find();
        $this->assign('info',$info);
        $this->_config_seo(C('pin_seo_config.cate'),array('cate_name'=>$info['name'],
            'seo_title'=>$info['seo_title'],
            'seo_keywords'=>$info['seo_keys'],
            'seo_description'=>$info['seo_desc']));
        $where="(select count(c.post_id) from ".table('post_cate_re')." as c where id=c.post_id and c.cate_id in(".implode(',',D('post_cate')->get_child_ids($cate_id,true))."))>0
            and status=1 and collect_flag=1 and post_time<=".time();
        $this->_waterfall(D("post"),$where,'post_time desc');
    }
}