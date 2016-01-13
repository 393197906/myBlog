<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function index() {
        $data = M('article')->order("posttime desc")->select();
        $code = $this->getNodeList("编码");
        $fun = $this->getNodeList("娱乐");
        $bx = M('node')->where("cname = '魔兽' or cname = '暗黑破坏神'")->select();
        $this->assign('articleList',$data);
       	$this->assign('code',$code); 	
       	$this->assign('fun',$fun); 	
       	$this->assign('bx',$bx); 	
        $this->display();
    }

    private function getNodeList($cname){
    	$roleId = M('node')->where(array('cname'=>$cname))->getField('id');
        $role = M('node')->field('cname,id')->where(array('pid'=>$roleId))->select();
        return $role;
    }

}


