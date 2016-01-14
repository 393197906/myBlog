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
          $count = $article->where(array('ofid'=>$id))->count();
          $page = PAGE($count,PAGENUM); //实例化分页类
       		$data = $article->where(array('ofid'=>$id))->order("posttime desc")->limit($page->firstRow.','.$page->listRows)->select();
       		$pid = $node->where(array("id"=>$id))->getField('pid');
       		$nodeList = $node->field("id,cname")->where(array('pid'=>$pid))->select(); //取得同胞节点数据
          $recommendData = $article->field('id,title,content')->where(array('ofid'=>$id,'recommend'=>'1'))->limit('0,5')->select(); //推荐数据
       	}else{  
          $count = $article->where(array('ofid'=>array('in',$arr)))->count();
          $page = PAGE($count,PAGENUM); //实例化分页类
       		$data = $article->where(array('ofid'=>array('in',$arr)))->order("posttime desc")->limit($page->firstRow.','.$page->listRows)->select();
          $recommendData = $article->field('id,title,content')->where(array('ofid'=>array('in',$arr),'recommend'=>'1'))->limit('0,5')->select(); //推荐数据
       	}

       	$mianbao = array();
       	$this->mianbao($id,$mianbao);  
        $this->assign('mianbao',$mianbao); //面包屑的导航
        $this->assign("nodeList",$nodeList); //标签
        $this->assign("articleList",$data);  //内容
        $this->assign('recommend',$recommendData); //推荐数据
        $this->assign('page',$page->show());
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

       //评论
       $commentData = $this->getCommentData($id);
       $this->assign('comment',$commentData);
       $this->display();
    }

    //ajax 子评论
    public function ajaxComment2(){
      $pid = I('post.pid');
      $data = M()->table("comment2 c,user u")
                                          ->field("c.id,c.pid,c.uid,c.touid,c.content,c.posttime,u.pickname,u.logo")
                                          ->where("c.uid=u.id")
                                          ->where(array("c.pid"=>$pid))
                                          ->order("posttime desc")
                                          ->select();
     $cou = count($data);                               
     for($j=0;$j!=$cou;$j++){
         $data[$j]['touserpickname'] = M("user")->where(array('id'=>$data[$j]['touid']))->getField('pickname');
     }
     $str ="";
     for($i=0;$i!=$cou;$i++){
                      
                      $str.="<hr>";
                      $str.='<div class="row">';
                      $str.= ' <div class="col-md-2 text-center center-block">';
                      $str.=   ' <input type="hidden" name=\'uid\' value="'.$data[$i]['uid'].'">';
                      $str.=   '<img src="/myblog/Public/images/'.$data[$i]['logo'].'" class="youke" alt="Responsive image">';
                      $str.=    '<p>'.$data[$i]['pickname'].'</p>' ;
                      $str.=  '</div>';
                      $str.=  '<div class="col-md-7" style="padding-top:10px;">';
                      $str.=    '<p>';
                      if($data[$i]['uid']!=$data[$i]['touid']){
                          $str.=    "回复 {$data[$i]['touserpickname']} : " ;
                      }
                      $str.=  $data[$i]['content'];
                      $str.=    '</p>';
                      $str.=   ' <p class="posttime">'.date("Y-m-d H:i:s",$data[$i]['posttime']).'</p> ';
                      $str.=  '</div>';
                      $str.=  ' <div class="col-md-3 text-center" style="padding-top:10px;"> ';
                      $str.=   ' <a href="#" class="hf">回复</a> ';
                      $str.=  '</div>';
                      $str.= '</div> '; 
      }   
      $this->ajaxReturn($str);
    }
    //获取评论数据
    private function getCommentData($id,$num=2){
      $commentData = M()->table("comment c,user u")
                      ->field("c.id,c.uid,c.ofid,c.content,c.posttime,u.pickname,u.logo")
                      ->where("c.uid=u.id")
                      ->where(array('c.ofid'=>$id))->order("posttime desc")->select();
       $count = count($commentData);
       for($i=0;$i!=$count;$i++){
          $childNum = M('comment2')->where(array("pid"=>$commentData[$i]['id']))->count('id'); //子评论数目
          $commentData[$i]['childnum'] = $childNum;  //子评论数目加入数组
          $commentData[$i]['childyu'] = $childNum-$num; //大于零前台显示
          $commentData[$i]['child'] = M()->table("comment2 c,user u")
                                          ->field("c.id,c.pid,c.uid,c.touid,c.content,c.posttime,u.pickname,u.logo")
                                          ->where("c.uid=u.id")
                                          ->where(array("c.pid"=>$commentData[$i]['id']))
                                          ->order("posttime desc")
                                          ->limit('0,'.$num)
                                          ->select();
          if($childNum>$num){$cou=$num;}else{$cou=$childNum;}                                 
          for($j=0;$j!=$cou;$j++){
              $commentData[$i]['child'][$j]['touserpickname'] = M("user")->where(array('id'=>$commentData[$i]['child'][$j]['touid']))->getField('pickname');
          } 
       }       
       // dump($commentData);
       return $commentData;        
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

    //搜索页
    public function search(){
       $search = I('get.search');
       $article = M('article');
       $where['title']=array('like','%'.$search.'%');
       $count = $article->where($where)->count();
       $page = PAGE($count,PAGENUM,PATH.'/search');
       $data = $article->where($where)->order("posttime desc")->limit($page->firstRow.','.$page->listRows)->select(); //搜索结果
       $empty = "<h1 class='text-center' style='color:#d9534f'>搜索结果为空</h1>";
       //推荐数据
       $recommendData = $article->where(array('recommend'=>'1'))->limit('0,5')->order("posttime desc")->select();
       $this->assign('recommend',$recommendData);
       $this->assign('empty',$empty);
       $this->assign('searchList',$data);
       $this->assign('page',$page->show());
       $this->display();

    }

    //评论
    public function comment(){
        $data = I('post.');
        //测试用user
        $data['uid'] = '15';
        $data['posttime']=time();
        $comment = D('comment');

        if($comment->create($data)){
            $status = $comment->add($data);
            if($status){
              $this->success("评论成功");
            }else{
              $this->error("评论失败");
            }
        }else{
          $this->error($comment->getError());
        }
    }
    //评论2
     public function comment2(){
        $data = I('post.');
        //测试用user
        $arr = array('15','16','17');
        $num = rand(0,2);
        $data['uid'] = $arr[$num];
        $data['posttime']=time();
        $comment = D('comment2');

        if($comment->create($data)){
            $status = $comment->add($data);
            if($status){
              $this->success("评论成功");
            }else{
              $this->error("评论失败");
            }
        }else{
          $this->error($comment->getError());
        }
    }

}


