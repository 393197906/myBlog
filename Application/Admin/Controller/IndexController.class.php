<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function _initialize(){

        $session = session("admin");
        if(empty($session)){
            $this->redirect("Login/index");
        }
    }

    public function index()
    {   
        $this->redirect("Code/index");
        $url = "main";
        $menu = "index-left";
        $this->assign("left",$menu);
        $this->assign("url",$url);
        $this->display();
    }

    public function main(){
        $this->display();

    }

}