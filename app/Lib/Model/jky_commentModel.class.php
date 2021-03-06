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
class jky_commentModel extends RelationModel
{
    protected $_auto = array (array('add_time','time',1,'function'));
    protected $_link = array(
        'user' => array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'user',
            'foreign_key' => 'uid',
        ),        
        'item'=> array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'jky_item',
            'foreign_key' => 'item_id',
        ),   
    );
    protected function _after_insert($data,$options) {
        $jky_item_mod = D('jky_item');
        $jky_item_mod->where(array('id'=>$data['item_id']))->setInc('comments');
    }
}