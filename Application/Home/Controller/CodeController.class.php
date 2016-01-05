<?php
namespace Home\Controller;
use Think\Controller;
class CodeController extends Controller
{
    public function index() {
        $id = I('get.id');
        $article = D('article');
        $node = D('node');
        $nodeList = $node->field("id,cname")->where(array('pid'=>$id))->select();   //取得子节点数据
      	
      	$con = count($nodeList);
       	for($i=0;$i!=$con;$i++){
       		$arr[]=$nodeList[$i]['id'];
       	}

       	if(empty($nodeList)){  
       		$data = $article->where(array('ofid'=>$id))->select();
       		$pid = $node->where(array("id"=>$id))->getField('pid');
       		$nodeList = $node->field("id,cname")->where(array('pid'=>$pid))->select(); //取得同胞节点数据
          $recommendData = $article->field('id,title,content')->where(array('ofid'=>$id,'recommend'=>'1'))->select(); //推荐数据
       	}else{   
       		$data = $article->where(array('ofid'=>array('in',$arr)))->select();
          $recommendData = $article->field('id,title,content')->where(array('ofid'=>array('in',$arr),'recommend'=>'1'))->select(); //推荐数据
       	}

       	$mianbao = array();
       	$this->mianbao($id,$mianbao);  
        $this->assign('mianbao',$mianbao);
        $this->assign("nodeList",$nodeList);
        $this->assign("articleList",$data);
        $this->assign('recommend',$recommendData);
        $this->display();
    }
    //文章页
    public function detail(){
    	 $id = I('get.id');
       $article  =  D('article');
       //每次访问阅读量+1
       $article->where(array('id'=>$id))->setInc('view');
       $data = $article ->where(array('id'=>$id))->find();
       $recommendData = $article->field('id,title')->where(array('ofid'=>$data['ofid'],'recommend'=>'1'))->limit('0,5')->select(); //推荐数据
       //上一篇
       $data['fid'] = $article->where("id<".$id)->getField('id');
       //下一篇
       $data['nid'] = $article->where("id>".$id)->getField('id');
       $mianbao =array();
       $this->mianbao($data['ofid'],$mianbao);
       $this->assign('recommend',$recommendData);
       $this->assign('article',$data);
       $this->assign("mianbao",$mianbao);//面包屑导航
       $this->display();
    }
    //点赞
    public function doRise(){
        $id = I('post.id');
        $sessName = "article".$id;
        $sess = session($sessName);
        if(!$sess){
          $status = M('article')->where(array('id'=>$id))->setInc('rise');
          if($status){
            session($sessName,true);
            $this->success("点赞成功");
          }else{
            $this->error("系统繁忙");
          }
        }else{
          $this->error("您已经赞过了");
        } 
    }

    //面包屑导航
    protected function mianbao($id,&$arr){
    	$data = M('node')->where(array('id'=>$id))->find();
    	array_push($arr, $data);
    	if($data['pid']!=0){
    		$this->mianbao($data['pid'],$arr);
    	}

    }

}


