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
class itemcateTag {
    public function __construct() {
        $this->mod = D('item_cate');
    }
    public function lists($options) {
        $options['field'] = isset($options['field']) ? trim($options['field']) : '*';
        $options['where'] = isset($options['where']) ? trim($options['where']) : '';
        $options['num'] = isset($options['num']) ? intval($options['num']) : 0;
        $options['order'] = isset($options['order']) ? trim($options['order']) : 'ordid';
        $select = $this->mod->field($field); 
        $map = array('status'=>'1');
        intval($options['cateid']) && $map['pid'] = $options['cateid'];
        $options['where'] && $map['_string'] = $options['where'];
        $select->where($map); 
        $order = isset($options['order']) ?  trim($options['order']) : $pk;
        $order = $order. ' DESC';
        $select->order($order); 
        intval($options['num']) && $select->limit($options['num']); 
        $data = $select->select();
        return $data;
    }
}