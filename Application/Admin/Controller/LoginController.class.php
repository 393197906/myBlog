<?php
namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function login()
    {

        $where['username'] = $_POST['username'];
        $where['password'] = $_POST['password'];
        $User              = M('user');
        $data              = $User->where($where)->find();
        $verify            = I('param.verify', '');
        if (!check_verify($verify)) {
            $this->error("验证码输入错误");
        } else {
            if ($data) {
                session('admin', $data);
                $this->success("登陆成功！", __MODULE__."/Index/index");
            } else {
                $this->error("账号或密码错误");
            }
        } 



    }

    /**
     *
     * 验证码生成
     */
    public function verify_c()
    {
        $config = array ('fontSize' => 100,    // 验证码字体大小
                         'length'   => 5,     // 验证码位数
                         'useNoise' => true, // 关闭验证码杂点
        );
        $Verify = new \Think\Verify($config);
        // 开启验证码背景图片功能 随机使用 ThinkPHP/Library/Think/Verify/bgs 目录下面的图片
        $Verify->useImgBg = TRUE;
        $Verify->entry();
    }


    public function index()
    {
        $this->display("login");
    }

    //退出登录
    public function logout(){
        session("admin",NULL);
        $this->success("登出成功","index");
    }
}