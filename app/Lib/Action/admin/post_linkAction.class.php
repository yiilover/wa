<?php 
/**
* ====================================================================
*/
class post_linkAction extends backendAction {

    public function _initialize() {
        parent::_initialize();
    }
    public function index() {
        $this->display();
    }

    public function _before_link_handle() {
        $mod = D('post');
        $mod->create();
        $arr = $mod->field('id,url')->select();
        foreach($arr as $r){
            $id=$r['id'];
            $url=$r['url'];
            preg_match('/t=([\s\S]*)/',$url,$cb);
            $url=!empty($cb[1])?$cb[1]:$url;
            $mod->where("id=$id")->setField('url',$url);
        }
    }

    public function _before_info_handle() {
        $mod = D('post');
        $mod->create();
        $arr = $mod->field('id,info')->select();
        foreach($arr as $r){
            $id=$r['id'];
            $info=$r['info'];
            $info=str_replace(array('\n','\r','\t'),'',$info);
            $mod->where("id=$id")->setField('info',$info);
        }
    }
}