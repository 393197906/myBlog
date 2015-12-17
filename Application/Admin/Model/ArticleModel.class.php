<?php

namespace Admin\Model;

use Think\Model;

class ArticleModel extends Model
{
    protected $_validate = array (array ('title', 'require', '需要填写标题！'), // 用户名必须
                                  //array ('phone', '', '该手机号码已经注册！', 1, 'unique', 1), // 验证手机号码是否已经存在
                                  array ('pid', 'require', '需要选择专题！'), // 专题必须
                                  array ('keyword', 'require', '需要填写关键字！'), // 关键字必须
                                  array ('abstract', 'require', '需要填摘要！'), // 摘要必须
                                  array ('content', 'require', '内容不能为空！'), // 内容必须

    );


    public function getDataList($firstRow,$listRow,$pid){

        if(empty($pid)){
          $data = $this->field("id,title,readnum,author,recommend,posttime,classname")->limit($firstRow.','.$listRow)->order('recommend desc,posttime desc')->select();
        }else{
          $data = $this->field("id,title,readnum,author,recommend,posttime,classname")->order('recommend desc,posttime desc')->where(array('pid'=>$pid))->limit($firstRow.','.$listRow)->select();
        }
        
        return $data;

    }


    public function getDataNum($pid){
        if(empty($pid)){
          $num = $this->field("id,title,readnum,author,recommend,posttime,classname")->count();
        }else{
          $num = $this->field("id,title,readnum,author,recommend,posttime,classname")->where(array('pid'=>$pid))->count();
        }
        
        return $num;
    }


}


?>