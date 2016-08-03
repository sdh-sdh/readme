<?php

	//获取商品状态的函数
	function getState($state){
		switch($state){
			case 1:
				return '新品发布';
			case 2:
				return '本季热卖';
			case 3:
				return '热门推荐';
			case 4:
				return '流行热卖';
			case 5:
				return '经典搭配';
			case 6:
				return '2015新款';
			case 7:
				return '暂时下架';
		}
	}
	//获取性别的函数
	function getSex($sex){
		switch($sex){
			case 0:
				return '女';
			case 1:
				return '男';
			case 2:
				return '保密';
		}
	}

	//商品审核
	function getAudit($audit){
		switch($audit){
			case 0:
				return '审核中';
			case 1:
				return '审核已通过';
			case 2:
				return '审核失败';
		}
	}

	//网站配置开关显示的函数
	function getSwitch($switch){
		switch($switch){
			case 0:
				return '开';
			case 1:
				return '关';
		}

	}

	//图片自定义函数
	function getFileName(){
		return time().rand(1,100200);
	}

	//用户需求函数
	function getStore($store){
		switch($store){
			case 0:
				return '无';
			case 1:
				return '申请店铺';
			case 2:
				return '店铺审核通过';
		}
	}