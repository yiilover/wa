<?php 
/**
* ====================================================================
*/
class post_apiAction extends backendAction {
    public function _initialize() {
        parent::_initialize();
    }
    public function index() {
    }
    public function _before_api_post() {
        $mod = D('post');
        $mod->create();
        $arr = $arr2 = array();
        $arr['id'] = $_POST['id'];
        $arr['title'] = $_POST['title'];
        $arr['key_id'] = $_POST['id'];
        $arr['url'] = $this->delink($_POST['url']);
        $arr['prices'] = $_POST['prices'];
        $arr['info'] = $_POST['info'];
        $arr['img'] = $_POST['img'];
        $arr['uname'] = 'sara';
        $arr['uid'] = '27';
        $arr['mall_id'] = $_POST['mall_id'];
        $arr['add_time'] = time();
        $arr['post_time'] = $this->deftime($_POST['post_time']);
        $arr['status'] = '1';
        $arr['seo_keys'] = $_POST['seo_keys'];
        $arr['seo_desc'] = $_POST['seo_desc'];
        $arr['slogan'] = $_POST['slogan'];
        $mod->add($arr);
        //写入分类
        $mod = D('post_cate_re');
        $mod->create();
        $arr2['post_id'] = $_POST['id'];
        $arr2['cate_id'] = $this->get_cid($_POST['ccode']);
        $mod->add($arr2);
    }
    function delink($url){
        $url = base64_decode($url);
        preg_match('/t=([\s\S]*)/',$url,$cb);
        return $url=!empty($cb[1])?$cb[1]:$url;
    }
    function get_cid($ccode){
        $catarr=array(
            'zdm'=>1,
            'haitaojx'=>4,
            'jd3c'=>5,
            'meizhuang'=>6,
            'meishi'=>7,
            'riyong'=>8,
            'fushi'=>10,
            'muying'=>11,
            'huwai'=>12,
            'other'=>13,
        );
        return $catarr[$ccode];
    }
    function deftime($time){
        $time = str_replace('发布于：','',$time);
        $time = trim($time);
        if(!preg_match('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}/',$time)){
            if(preg_match('/\d{2}-\d{2} \d{2}:\d{2}/',$time)){
                $time = '2014-'.$time;
            }elseif(preg_match('/昨天/',$time)){
                $time = preg_replace('/昨天([\s\S])/',date('Y-m-d',time()-3600*24).' $1',$time);
            }elseif(preg_match('/前天/',$time)){
                $time = preg_replace('/前天([\s\S])/',date('Y-m-d',time()-3600*24*2).' $1',$time);
            }else{
                $time = date('Y-m-d H:i');
            }
        }
        $time=strtotime($time);
        return $time;
    }
}

