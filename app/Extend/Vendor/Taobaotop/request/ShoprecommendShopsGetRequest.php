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
class ShoprecommendShopsGetRequest
{
	private $count;
	private $ext;
	private $recommendType;
	private $sellerId;
	private $apiParas = array();
	public function setCount($count)
	{
		$this->count = $count;
		$this->apiParas["count"] = $count;
	}
	public function getCount()
	{
		return $this->count;
	}
	public function setExt($ext)
	{
		$this->ext = $ext;
		$this->apiParas["ext"] = $ext;
	}
	public function getExt()
	{
		return $this->ext;
	}
	public function setRecommendType($recommendType)
	{
		$this->recommendType = $recommendType;
		$this->apiParas["recommend_type"] = $recommendType;
	}
	public function getRecommendType()
	{
		return $this->recommendType;
	}
	public function setSellerId($sellerId)
	{
		$this->sellerId = $sellerId;
		$this->apiParas["seller_id"] = $sellerId;
	}
	public function getSellerId()
	{
		return $this->sellerId;
	}
	public function getApiMethodName()
	{
		return "taobao.shoprecommend.shops.get";
	}
	public function getApiParas()
	{
		return $this->apiParas;
	}
	public function check()
	{
		RequestCheckUtil::checkNotNull($this->count,"count");
		RequestCheckUtil::checkNotNull($this->recommendType,"recommendType");
		RequestCheckUtil::checkNotNull($this->sellerId,"sellerId");
	}
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
?>