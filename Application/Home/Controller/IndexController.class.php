<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{   
    private $rowCowIndex = 10; //首页加载数据量
    public function index() {
        $data = M('article')->order("posttime desc")->limit('0,'.$this->rowCowIndex)->select();
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

      //动态分页
    public function pageList(){
       $firstRow = I('post.firstRow');
       $count  = M('article')->count(); //总条数
       if($firstRow>=$count){
        
        $this->error('complate');
       }
       $data = M('article')->limit($firstRow.','.$this->rowCowIndex)->order('posttime desc')->select();
       if($data){
        $str = '';
        $couData = count($data);
        for($i=0;$i!=$couData;$i++){
            $str.='<div class="row" style="padding-top:20px;">';
            $str.='                     <div class="col-md-9">';

            $str.='                   <a href="'.U(CONTENT.'/'.$data[$i]['id']).'}"><h3 style="padding-bottom: 3px;margin-top:3px;">'.$data[$i]['title'].'</h3></a> ';
            $str.='                   <p style="padding-bottom: 10px;">'.subtext(strip_tags(htmlspecialchars_decode($data[$i]['content'])),120).'</p> ';
            $str.='                   <p class="p-bottom">';
            $str.='                       <span class="glyphicon glyphicon-tag"></span>';
            $str.=                      $data[$i]['lable'];
            $str.='                           <span class="glyphicon glyphicon-thumbs-up" style="margin-left: 20px;"></span>';
            $str.=                           $data[$i]['rise'];
            $str.='                       <span style="margin-left: 20px;"> ';
            $str.='                           <span class="glyphicon glyphicon-eye-open"></span> ';
            $str.=                         $data[$i]['view']; 
            $str.='                       </span> ';
            $str.='                       <span style="margin-left: 20px;"> ';
            $str.='                           <span class="glyphicon glyphicon-calendar"></span> ';
            $str.=                        $data[$i]['posttime']; 
            $str.='                       </span>';
            $str.='                       <a href="'.U(CONTENT.'/'.$data[$i]['id']).'" style="float:right;text-decoration:none;">';
            $str.='                           阅读全文';
            $str.='                       </a>';
            $str.='                   </p>';
            $str.='               </div>';
            $str.='               <div class="col-md-3">';
            if(empty($vo['logo'])){
               $str.='<img src="/myblog/Public/images/shanzhijing.png" class="img-responsive ">';
            }else{
               $str.='<img src="'.$data[$i]['logo'].'" class="img-responsive ">';
            }
            $str.='               </div>';
            $str.='           </div>';

            $str.='           <hr class="hr-bottom">';
        } 
        
        $this->success($str);
       }else{
        $this->error("加载失败");
       }
    } 

}


