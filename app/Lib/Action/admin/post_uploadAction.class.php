<?php 
/**
* ====================================================================
*/
class post_uploadAction extends backendAction {

    public function _initialize() {
        parent::_initialize();
    }
    public function index() {

        $this->display();
    }

    public function _before_upload() {

    }

    public function _before_upload_cate() {
        $mod = D($this->_name);
        $mod->create();
        require_once(APP_PATH .'Lib/Action/admin/Excel/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('UTF-8');
        $data->read($_FILES['file']['tmp_name']);
        $id = 1000;
        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            if($i==1) continue;
            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                $arr[$i]['id'] = $id;
                $arr[$i]['name'] = $data->sheets[0]['cells'][$i][5];
                $arr[$i]['alias'] = $data->sheets[0]['cells'][$i][6];
                $arr[$i]['pid'] = 1;
                $arr[$i]['status'] = 1;
            }
            $mod->add($arr[$i]);
            $id++;
        }
    }

    public function _before_upload_cate2() {
        $mod = D($this->_name);
        $mod->create();
        require_once(APP_PATH .'Lib/Action/admin/Excel/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('UTF-8');
        $data->read($_FILES['file']['tmp_name']);
        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            if($i==1) continue;
            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                $arr[$i]['id'] = $data->sheets[0]['cells'][$i][5];
                $arr[$i]['name'] = $data->sheets[0]['cells'][$i][4];
                $arr[$i]['pid'] = $this->get_pid_by_pname($data->sheets[0]['cells'][$i][6]);
                $arr[$i]['status'] = 1;
            }
            $mod->add($arr[$i]);
        }
    }

    public function _before_upload_post() {
//        error_reporting(E_ALL);

        $mod = D('post');
        $mod->create();
        require_once(APP_PATH .'Lib/Action/admin/Excel/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('UTF-8');
        $data->read($_FILES['file']['tmp_name']);

        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            if($i==1) continue;
            if(empty($data->sheets[0]['cells'][$i][5])) continue;
            $id = intval($data->sheets[0]['cells'][$i][4]);
            $url = $data->sheets[0]['cells'][$i][6];
            $post_time = $data->sheets[0]['cells'][$i][9];
            $post_time = $this->get_format_time($post_time);
            $info = $data->sheets[0]['cells'][$i][17];
            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                $arr[$i]['id'] = $id;
                $arr[$i]['title'] = $data->sheets[0]['cells'][$i][5];
                $arr[$i]['url'] = base64_decode($url);
                $arr[$i]['img'] = $data->sheets[0]['cells'][$i][7];
                $arr[$i]['uname'] = $data->sheets[0]['cells'][$i][8];
                $arr[$i]['post_time'] = strtotime($post_time);
                $arr[$i]['mall_id'] = $data->sheets[0]['cells'][$i][10];
                $arr[$i]['rate_good'] = $data->sheets[0]['cells'][$i][13];
                $arr[$i]['rate_bad'] = $data->sheets[0]['cells'][$i][14];
                $arr[$i]['slogan'] = $data->sheets[0]['cells'][$i][15];
                $arr[$i]['prices'] = $data->sheets[0]['cells'][$i][16];
                $arr[$i]['info'] = trim($info);
                $arr[$i]['comments'] = $data->sheets[0]['cells'][$i][18];
                $arr[$i]['favs'] = $data->sheets[0]['cells'][$i][19];
                $arr[$i]['hits'] = $data->sheets[0]['cells'][$i][20];
                $arr[$i]['seo_keys'] = $data->sheets[0]['cells'][$i][21];
                $arr[$i]['seo_desc'] = $data->sheets[0]['cells'][$i][22];
                $arr[$i]['key_id'] = $id;
                $arr[$i]['add_time'] = time();
                $arr[$i]['status'] = 1;
                $arr[$i]['collect_flag'] = 1;
            }
            $mod->add($arr[$i]);

        }
//        print_r($arr);
    }


    public function _before_upload_post_cate_re() {
        $mod = D('post_cate_re');
        $mod->create();
        require_once(APP_PATH .'Lib/Action/admin/Excel/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('UTF-8');
        $data->read($_FILES['file']['tmp_name']);
        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            if($i==1) continue;
            $id = $data->sheets[0]['cells'][$i][4];
            $code = $data->sheets[0]['cells'][$i][5];
            if(empty($code)) continue;
            $cid = $this->get_cate_id($code);
            if(empty($cid)) continue;
            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                $arr[$i]['post_id'] = $id;
                $arr[$i]['cate_id'] = $cid;
            }
            $mod->add($arr[$i]);
        }
//        print_r($arr);
    }

    public function _before_upload_post_tag() {
        $mod = D('post_tag');
        $mod->create();
        require_once(APP_PATH .'Lib/Action/admin/Excel/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('UTF-8');
        $data->read($_FILES['file']['tmp_name']);
        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            if($i==1) continue;
            $id = $data->sheets[0]['cells'][$i][4];
            $tid = $data->sheets[0]['cells'][$i][5];
            if(empty($tid)) continue;
            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                $arr[$i]['post_id'] = $id;
                $arr[$i]['tag_id'] = $tid;
            }
            $mod->add($arr[$i]);
        }
    }

    public function _before_upload_tag() {
        $mod = D('tag');
        $mod->create();
        require_once(APP_PATH .'Lib/Action/admin/Excel/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('UTF-8');
        $data->read($_FILES['file']['tmp_name']);
        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            if($i==1) continue;
            $id = $data->sheets[0]['cells'][$i][5];
            $name = $data->sheets[0]['cells'][$i][6];
            if(empty($id)) continue;
            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                $arr[$i]['id'] = $id;
                $arr[$i]['name'] = $name;
            }
            $mod->add($arr[$i]);
        }
    }

    public function  _before_upload_mall_cate(){
        $mod = D('mall_cate');
        $mod->create();
        require_once(APP_PATH .'Lib/Action/admin/Excel/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('UTF-8');
        $data->read($_FILES['file']['tmp_name']);
        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            if($i==1) continue;
            $id = $data->sheets[0]['cells'][$i][4];
            $name = $data->sheets[0]['cells'][$i][5];
            $seo_title = $data->sheets[0]['cells'][$i][6];
            $seo_keys = $data->sheets[0]['cells'][$i][7];
            $seo_desc = $data->sheets[0]['cells'][$i][8];
            if(empty($id)) continue;
            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                $arr[$i]['id'] = $id;
                $arr[$i]['title'] = $name;
                $arr[$i]['seo_title'] = $seo_title;
                $arr[$i]['seo_keys'] = $seo_keys;
                $arr[$i]['seo_desc'] = $seo_desc;
            }
            $mod->add($arr[$i]);
        }
    }

    public function  _before_upload_shop_cate(){
        $mod = D('shop_cate');
        $mod->create();
        require_once(APP_PATH .'Lib/Action/admin/Excel/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('UTF-8');
        $data->read($_FILES['file']['tmp_name']);
        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            if($i==1) continue;
            $id = $data->sheets[0]['cells'][$i][4];
            $name = $data->sheets[0]['cells'][$i][5];
            $seo_title = $data->sheets[0]['cells'][$i][6];
            $seo_keys = $data->sheets[0]['cells'][$i][7];
            $seo_desc = $data->sheets[0]['cells'][$i][8];
            if(empty($id)) continue;
            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                $arr[$i]['id'] = $id;
                $arr[$i]['title'] = $name;
                $arr[$i]['seo_title'] = $seo_title;
                $arr[$i]['seo_keys'] = $seo_keys;
                $arr[$i]['seo_desc'] = $seo_desc;
            }
            $mod->add($arr[$i]);
        }
    }

    public function  _before_upload_mall_cate_re(){
        $mod = D('mall_cate_re');
        $mod->create();
        require_once(APP_PATH .'Lib/Action/admin/Excel/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('UTF-8');
        $data->read($_FILES['file']['tmp_name']);
        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            if($i==1) continue;
            $id = $data->sheets[0]['cells'][$i][4];
            $cid = $data->sheets[0]['cells'][$i][5];
            if(empty($cid)) continue;
            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                $arr[$i]['mall_id'] = $id;
                $arr[$i]['cate_id'] = $cid;
            }
            $mod->add($arr[$i]);
        }
    }

    public function  _before_upload_mall(){
        $mod = D('mall');
        $mod->create();
        require_once(APP_PATH .'Lib/Action/admin/Excel/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('UTF-8');
        $data->read($_FILES['file']['tmp_name']);
        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            if($i==1) continue;
            $id = $data->sheets[0]['cells'][$i][11];
            $title = $data->sheets[0]['cells'][$i][4];
            $img = $data->sheets[0]['cells'][$i][5];
            $domain = "http://".$data->sheets[0]['cells'][$i][6];
            $abst = $data->sheets[0]['cells'][$i][7];
            $email = $data->sheets[0]['cells'][$i][8];
            $tel = $data->sheets[0]['cells'][$i][9];
            $addr = $data->sheets[0]['cells'][$i][10];
            $aid = $data->sheets[0]['cells'][$i][11];
            $seo_title = $data->sheets[0]['cells'][$i][12];
            $seo_keys = $data->sheets[0]['cells'][$i][13];
            $seo_desc = $data->sheets[0]['cells'][$i][14];

            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {

                $arr[$i]['id'] = $id;
                $arr[$i]['title'] = $title;
                $arr[$i]['img'] = $img;
                $arr[$i]['domain'] = $domain;
                $arr[$i]['abst'] = $abst;
                $arr[$i]['info'] = $abst;
                $arr[$i]['email'] = $email;
                $arr[$i]['tel'] = $tel;
                $arr[$i]['addr'] = $addr;
                $arr[$i]['aid'] = $aid;
                $arr[$i]['seo_title'] = $seo_title;
                $arr[$i]['seo_keys'] = $seo_keys;
                $arr[$i]['seo_desc'] = $seo_desc;
                $arr[$i]['add_time'] = time();
            }
            $mod->add($arr[$i]);
        }
    }

    public function  _before_upload_shop(){
        $mod = D('shop');
        $mod->create();
        require_once(APP_PATH .'Lib/Action/admin/Excel/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('UTF-8');
        $data->read($_FILES['file']['tmp_name']);
        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            if($i==1) continue;
            $id = $data->sheets[0]['cells'][$i][11];
            $title = $data->sheets[0]['cells'][$i][4];
            $img = $data->sheets[0]['cells'][$i][5];
            $domain = $data->sheets[0]['cells'][$i][6];
            $abst = $data->sheets[0]['cells'][$i][7];
            $email = $data->sheets[0]['cells'][$i][8];
            $tel = $data->sheets[0]['cells'][$i][9];
            $addr = $data->sheets[0]['cells'][$i][10];
            $aid = $data->sheets[0]['cells'][$i][11];
            $seo_title = $data->sheets[0]['cells'][$i][12];
            $seo_keys = $data->sheets[0]['cells'][$i][13];
            $seo_desc = $data->sheets[0]['cells'][$i][14];

            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {

                $arr[$i]['id'] = $id;
                $arr[$i]['title'] = $title;
                $arr[$i]['img'] = $img;
                $arr[$i]['domain'] = $domain;
                $arr[$i]['abst'] = $abst;
                $arr[$i]['info'] = $abst;
                $arr[$i]['email'] = $email;
                $arr[$i]['tel'] = $tel;
                $arr[$i]['addr'] = $addr;
                $arr[$i]['aid'] = $aid;
                $arr[$i]['seo_title'] = $seo_title;
                $arr[$i]['seo_keys'] = $seo_keys;
                $arr[$i]['seo_desc'] = $seo_desc;
                $arr[$i]['add_time'] = time();
            }
            $mod->add($arr[$i]);
        }
    }

    /*mall cid*/
    public function  _before_upload_mall_re(){
        $mod = D('mall');
        $mod->create();
        require_once(APP_PATH .'Lib/Action/admin/Excel/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('UTF-8');
        $data->read($_FILES['file']['tmp_name']);
        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            if($i==1) continue;
            preg_match("/category\/([\s\S]*)/", $data->sheets[0]['cells'][$i][5], $cb);
            $cid = $cb[1];
            $id = $data->sheets[0]['cells'][$i][4];
            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                if(!empty($id) && !empty($cid)){
                    $mod->where("aid=$id")->setField('cid',$cid);
                }
            }
        }
    }

    public function  _before_upload_shop_re(){
        $mod = D('shop');
        $mod->create();
        require_once(APP_PATH .'Lib/Action/admin/Excel/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('UTF-8');
        $data->read($_FILES['file']['tmp_name']);
        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            if($i==1) continue;
            preg_match("/category\/([\s\S]*)/", $data->sheets[0]['cells'][$i][5], $cb);
            $cid = $cb[1];
            $id = $data->sheets[0]['cells'][$i][4];
            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                if(!empty($id) && !empty($cid)){
                    $mod->where("aid=$id")->setField('cid',$cid);
                }
            }
        }
    }

    public function  _before_upload_mall_comment(){

    }


    public function  _before_upload_jky_item(){
        $mod = D('jky_item');
        $mod->create();
        require_once(APP_PATH .'Lib/Action/admin/Excel/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('UTF-8');
        $data->read($_FILES['file']['tmp_name']);
        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            if($i==1) continue;
            $title = $data->sheets[0]['cells'][$i][4];
            $title = str_replace('&nbsp;','',$title);
            if(empty($title)) continue;
            $slogan = $data->sheets[0]['cells'][$i][5];
            $uname = $data->sheets[0]['cells'][$i][6];
            $img = $data->sheets[0]['cells'][$i][8];
            $info = $data->sheets[0]['cells'][$i][9];
            $url = "http://gouhuasuan.net".$data->sheets[0]['cells'][$i][11];
            $seo_title = $data->sheets[0]['cells'][$i][12];
            $seo_keys = $data->sheets[0]['cells'][$i][13];
            $seo_desc = $data->sheets[0]['cells'][$i][14];
            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                $arr[$i]['title'] = $title;
                $arr[$i]['slogan'] = $slogan;
                $arr[$i]['uname'] = $uname;
                $arr[$i]['img'] = $img;
                $arr[$i]['info'] = $info;
                $arr[$i]['url'] = $url;
                $arr[$i]['seo_title'] = $seo_title;
                $arr[$i]['seo_keys'] = $seo_keys;
                $arr[$i]['seo_desc'] = $seo_desc;
                $arr[$i]['add_time'] = time();
                $arr[$i]['stime'] = time();
                $arr[$i]['etime'] = time()+3600*24*30;
            }
            $mod->add($arr[$i]);
        }
    }



    protected function get_pid_by_pname($pname){
        $r = D($this->_name)->where("name='$pname'")->find();
        return $r['id'];
    }

    protected function get_format_time($time){
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
        return $time;
    }

    protected function get_cate_id($code){
        $r = D('post_cate')->where("code='$code'")->find();
        return $r['id'];
    }
}