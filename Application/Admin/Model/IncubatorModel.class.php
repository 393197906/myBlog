<?php

namespace Admin\Model;

use Think\Model;

class IncubatorModel extends Model
{
    protected $_validate = array (array ('title', 'require', '需要填写标题！'), //标题
                                  array ('name', 'require', '需要填写园区名称！'), // 园区名称必须
                                  array ('address', 'require', '需要填写园区详细地址！'), // 园区详细地址必须
                                  array ('favourpolicy', 'require', '需要填写优惠政策！'), // 园区优惠政策必须
                                  array ('condition', 'require', '需要填写园区条件！'), // 园区条件必须
                                  array ('content', 'require', '需要填写园区介绍内容！'), // 园区介绍必须


    );

    //取得园区数据条数
    public function getDataNum(){
        $num = $this->field("id")->count();
        return $num;
    }
    //取得园区列表
    public function getDataList($firstRow,$listRow){
        $data = $this->field("id,name,posttime,recommend, province,city,phone")->order('recommend desc,id desc')->limit($firstRow.','.$listRow)->select();
        return $data;
    }

    //取得单个园区数据
    public function getDataId($id){
        $data = $this->where(array("id"=>$id))->find();
        return $data;
    }

    //园区LOGO上传
    public function upload($file){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      './Uploads/incubatorpic/'; // 设置附件上传根目录
        // 上传单个文件
        $info   =   $upload->uploadOne($file);
        return $info;
    }


}


?>