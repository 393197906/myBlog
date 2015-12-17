<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/9/17
 * Time: 10:37
 */
function check_verify($code, $id = ""){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

function judge(){
    $var='1';
    if(!$_SESSION) {
        redirect(U('Login/login'));
        $var='0';
    }else{
        return $var;
    }
}

//数据保存用户基本信息
function user($id){
    $User=D('user');
    if($id!=null){
        return $User->where('id='.$id)->find();
    }else{
        return $User->where('id='.$_SESSION['user']['id'])->find();
    }
}
function user_founder(){
    $User=D('user_founder');
    return $User->where('id='.$_SESSION['user']['uid'])->select();

}
function project($id){
    $User=D('project');
    if($id!=null){
        return  $User->where('id='.$id)->find();
    }else{
        return  $User->where('uid='.$_SESSION['user']['id'])->find();
    }
}