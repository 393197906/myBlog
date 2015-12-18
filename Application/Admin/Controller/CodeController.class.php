<?php
namespace Admin\Controller;

use Think\Controller;

class CodeController extends Controller
{
    public function _initialize() {
        
        $session = session("admin");
        if (empty($session)) {
            $this->redirect("Login/index");
        }
    }
    
    public function index() {
        $id = I('get.id', '1');
        $node = D('node');
        $nodeName = $node->where(array('id' => $id))->getField('cname');
        $list = $node->where(array('pid' => $id))->select();
        SubjectController::DG_getList($list);
        $this->assign('nodeName', $nodeName);
        $this->assign('list', $list);
        $this->assign('left', 'Blocks/left');
        $this->assign('url', "lists");
        session('nodeId', $id);
         //初始化实用
        $this->display("Index/index");
    }
    
    public function lists() {
        $id = I('get.id');
        $article = D('article');
        if (empty($id)) {
            $id = session('nodeId');
            $arr = M('node')->field('id')->where(array('pid' => $id))->select();
            $cou = count($arr);
            $idArr = array();
            for ($i = 0; $i != $cou; $i++) {
                array_push($idArr, $arr[$i]['id']);
            }
            $data = $article->where(array('ofid' => array('in', $idArr)))->select();
        } 
        else {
            $data = $article->where(array('ofid' => $id))->select();
        }
        $subject = M('node')->where(array(id => $id))->find();
        $this->assign('subject', $subject);
         //栏目信息
        $this->assign('dataList', $data);
         //列表信息
        $this->display('Blocks/list');
    }
   
    //添加文章显示页
    public function addArticle() {
        $id = I('get.id');
        $node = D('node');
        if(!empty($id)){
            $pid = $node->where(array('id' => $id))->getField('pid');
        }else{
            $pid = session('nodeId');
        }
        $subject = $node->where(array('pid' => $pid))->select();
        $this->assign('subject', $subject);
        $this->display('Blocks/addArticle');
    }
    
    //添加文章
    public function doAddArticle() {
        $data = I('post.');
        $data['ofid'] = M('node')->where(array('cname' => $data['label']))->getField('id');
        $data['author'] = "god";
        $data['posttime'] = time();
        $article = D('article');
        
        if ($article->create($data)) {
            $status = $article->add($data);
            if ($status) {
                $this->success("文章添加成功");
            } 
            else {
                $this->error("文章添加失败");
            }
        } 
        else {
            $this->error($article->getError());
        }
    }

    //推荐文章
    public function doRecommendArticle(){
        $id = I('post.id');
        $article = M('article');
        $status = $article->where(array('id'=>$id))->getField('recommend');

        if($status){
            $statu =  $article->where(array('id'=>$id))->save(array('recommend'=>'0'));
            if($statu){
                $info =array("取消推荐成功",'0');
                $this->success($info);
            }else{
                $info=array("取消推荐失败",'0');
                $this->error($info);
            }
        }else{
             $statu =  $article->where(array('id'=>$id))->save(array('recommend'=>'1'));
            if($statu){
                $info =array("推荐成功",'1');
                $this->success($info);
            }else{
                $info=array("推荐失败",'0');
                $this->error($info);
            }
        }
    }

    //删除文章
    public function doDelArticle(){
        $id = I('post.id');
        $status = M('article')->where(array('id'=>$id))->delete();
        if($status){
            $this->success("文章删除成功");
        }else{
            $this->error("文章删除失败");
        }
    }


    public function editArticle(){
        $id = I('get.id');
        $node = D('node');
        $pid = $node->where(array('id' => $id))->getField('pid');
        $subject = $node->where(array('pid' => $pid))->select();
        $this->assign('subject', $subject);

        $data = M('article')->where(array('id'=>$id))->find();     
        $this->assign('article',$data);
        $this->display("Blocks/editArticle");
    }
}
