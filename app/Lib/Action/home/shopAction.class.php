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
class shopAction extends frontendAction {
    public function index() {
        $index_word = $this->_get('word');
        $cate_list = D('shop_cate')->where("status=1")->order('ordid')->select();
        foreach ($cate_list as $key => $val) {
            $cate_list[$key]['child'] = D('shop')->where("status=1  and  cid=$val[id]")->
                order('ordid')->select();
            $cate_list[$key]['mall_nums'] = D('mall')->where("status=1  and  cid=$val[id]")->
                count();
        }
        $get_cate_id = $this->_get('cate','intval',0);
        $this->assign("cate", $get_cate_id);
        $where = '';
        if (!empty($get_cate_id)) {
            $show_cate_name = D('shop_cate')->where("`id`=$get_cate_id")->field("`title`")->
                find();
        } else {
            $show_cate_name = array('title' => '所有店铺');
        }
        $this->assign('show_cate_name', $show_cate_name);
        $number = D('shop')->count();
        if (!empty($index_word)) {
            $where = "`index`='$index_word'";
            $where1 = $where;
            $text = $index_word;
            $this->assign("text", $text);
        }
        if (!empty($get_cate_id)) {
            $where = "status=1 and `cid`=$get_cate_id";
            $number = D('shop')->where($where)->count();
            $where2 = $where;            
        }
        if (!empty($index_word) && !empty($get_cate_id)) {
            $where = $where1 . ' and ' . $where2;
        }
        $this->assign("number", $number);
        $this->_assign_list(D('shop'), $where);
        $this->assign('li_st', $cate_list);
        $this->_config_seo(C('pin_seo_config.shop'));
        $this->display();
    }
    public function info() {
        $id = intval($_REQUEST['id']);
        $res = D('shop')->where("id=$id")->find();
        if ($res) {
            $res['post_list'] = D('post')->where("mall_id=$res[id] and status=1 and post_time<=" .time())->limit('0,10')->select();
            $this->assign('info', $res);
            $this->_config_seo(C('pin_seo_config.shop_info'), array(
                'shop_title' => $res['title'],
                'seo_title' => $res['seo_title'],
                'seo_keywords' => $res['seo_keys'],
                'seo_description' => $res['seo_desc']));
			$re_mall_list = D("shop")->where("status=1 and cid=".$res['cid'])->limit(10)->select();
            $this->assign('re_mall_list', $re_mall_list);
            $res = D("shop")->where("id=$id")->setInc('hits');
        } else {
            $this->error("店铺不存在", u('index/index'));
        }
        $this->display();
    }
}
?>