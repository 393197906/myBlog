<?php
namespace Home\Controller;
use Think\Controller;
class CodeController extends Controller
{
    public function index() {
        $id = I('get.id');
        $article = D('article');
        $node = D('node');
        $nodeList = $node->field("id,cname")->where(array('pid'=>$id))->select();
      	
      	$con = count($nodeList);
       	for($i=0;$i!=$con;$i++){
       		$arr[]=$nodeList[$i]['id'];
       	}

       	if(empty($nodeList)){
       		$data = $article->where(array('ofid'=>$id))->select();
       		$pid = $node->where(array("id"=>$id))->getField('pid');
       		$nodeList = $node->field("id,cname")->where(array('pid'=>$pid))->select();
       	}else{
       		$data = $article->where(array('ofid'=>array('in',$arr)))->select();
       	}

       	$mianbao = array();
       	$this->mianbao($id,$mianbao);
        $this->assign('mianbao',$mianbao);
        $this->assign("nodeList",$nodeList);
        $this->assign("articleList",$data);
        $this->display();
    }

    public function detail(){
    	$this->display();
    }

    protected function mianbao($id,&$arr){
    	$data = M('node')->where(array('id'=>$id))->find();
    	array_push($arr, $data);
    	if($data['pid']!=0){
    		$this->mianbao($data['pid'],$arr);
    	}

    }

}


