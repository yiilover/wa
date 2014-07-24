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
//        $data=array();
        foreach($arr as $r){
            $id=$r['id'];
            $url=$r['url'];
            preg_match('/t=([\s\S]*)/',$url,$cb);
            $url=!empty($cb[1])?$cb[1]:$url;
            $mod->where("id=$id")->setField('url',$url);
//            $data[]=array(
//                'id'=>$r['id'],
//                'url'=>!empty($cb[1])?$cb[1]:$r['url']
//            );
        }
//        print_r($data);
    }


}