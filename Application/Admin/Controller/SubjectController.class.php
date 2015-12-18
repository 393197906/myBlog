<?php
namespace Admin\Controller;

use Think\Controller;

class SubjectController extends Controller
{
    public function _initialize() {
        
        $session = session("admin");
        if (empty($session)) {
            $this->redirect("Login/index");
        }
    }
    
    public function index() {
        $this->assign('left', "subject-left");
        $this->assign('url', 'subjectList');
        $this->display("Index/index");
    }
    
    public function subjectList() {
        $node = D('node');
        $data = $node->where(array("pid" => '0'))->select();
        self::DG_getList($data);
        $this->assign("subjectList", $data);
        $this->display();
    }
    
    public static function DG_getList(&$arr) {
         //递归取数据
        $count = count($arr);
        for ($i = 0; $i != $count; $i++) {
            $arr[$i]['zi'] = M('node')->where(array('pid' => $arr[$i]['id']))->select();
            self::DG_getList($arr[$i]['zi']);
            
            //递归
            
            
        }
    }
    
    public function doAddSubject() {
        $node = D('node');
        $data = I('post.');
        if ($node->create($data)) {
            $status = $node->add($data);
            if ($status) {
                $this->success("专题添加成功");
            } 
            else {
                $this->error("专题添加失败");
            }
        } 
        else {
            $this->error($node->getError());
        }
    }
    
    public function doDeleteSubject() {
        $id = I('post.id');
        session('fh', 0);
        $status = M('node')->where(array('id' => $id))->delete();
        $this->DG_deleteList($id);
        $fh = session('fh');
        if($status){
            $this->success("专题及其相关子专题删除成功");
        }else{
            $this->error("专题及其相关子专题删除失败");
        }
        
    }
    
    protected function DG_deleteList($id) {
         //递归删数据
        $data = M('node')->field('id')->where(array('pid' => $id))->select();
        $status = M('node')->where(array('pid' => $id))->delete();
        if (!$status) {
            ++$_SESSION['fh'];
        }
        if(empty($data)){return;}
        $cou = count($data);
        for ($i = 0; $i != $cou; $i++) {
            $this->DG_deleteList($data[$i]["id"]);
        }
    }
}
