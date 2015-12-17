<?php

namespace Admin\Model;

use Think\Model;

class SubjectModel extends Model
{
    protected $_validate = array (array ('name', 'require', '需要填写专题名称！'), // 专题名名必须
                                  array ('name', '', '该专题已经存在！', 1, 'unique', 1), // 专题名是否已经存在
                                );

    public function getData(){
        $data = $this->order("id")->select();

        return $data;
    }


}


?>