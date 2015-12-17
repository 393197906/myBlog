<?php
/**
 * Created by PhpStorm.
 * User: NilTor
 * Date: 2015/9/17
 * Time: 16:32
 */

function sendMsg($mobile, $param, $action)
{
    $apiKey = "b2eae31ddc8846f4b6dc2756e7c90280";
    $appId  = "A1Ix6m6939m4 ";
    //定义模板数组
    $template['reg']      = '92D59E0924BU';
    $template['resetpwd'] = 'ASDFAWESESES';
    $templateId           = $template[$action];
    $url                  = "https://sms.zhiyan.net/sms/template_send.json";
    $json_arr             = array ("mobile"     => $mobile,
                                   "param"      => $param,
                                   "templateId" => $templateId,
                                   "appId"      => $appId,
                                   "apiKey"     => $apiKey,
                                   "extend"     => "",
                                   "uid"        => ""
    );
    $array                = json_encode($json_arr);

    $ch  = curl_init();
    $res = curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    //echo($result);
    return $result;
}

function randNum($length)
{
    $begin = pow(10, $length - 1);
    $end   = pow(10, $length) - 1;

    return rand($begin, $end);
}

function subtext($text, $length)
{
    $status = utf8_str($text);
    switch ($status) {
        case "纯英文":
            if (strlen($text) > floor($length * 1.8)) {
                return substr($text, 0, floor($length * 1.8)) . "...";
            }
            return $text;
        case "纯汉字":
        case "汉英混合":
            if (mb_strlen($text, 'utf8') > $length) {
                return mb_substr($text, 0, $length, 'utf8') . '...';
            }
            return $text;
    }

}

function utf8_str($str)
{
    $mb = mb_strlen($str, 'utf-8');
    $st = strlen($str);
    if ($st == $mb) {
        return '纯英文';
    }
    if ($st % $mb == 0 && $st % 3 == 0) {
        return '纯汉字';
    }
    return '汉英混合';
}

//分页函数
function  PAGE($count, $pageNum = 12)
{
    $Page = new \Think\Page($count, $pageNum);// 实例化分页类 传入总记录数和每页显示的记录数

    $Page->setConfig('prev', '上一页');
    $Page->setConfig('next', '下一页');
    $Page->setConfig('theme', "%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%");
    return $Page;

}

//后台分页函数
function  PAGEADMIN($count,$pageNum=12){
    $Page       = new \Think\Pageadmin($count,$pageNum);// 实例化分页类 传入总记录数和每页显示的记录数

    $Page->setConfig('prev','上一页');
    $Page->setConfig('next','下一页');
    $Page->setConfig('first',"首页");
    $Page->setConfig('last',"尾页");
    $Page->setConfig('theme',"%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%");
    return $Page;

}



//验证长度
function checklength($str, $min = 50, $max = 300)
{
    $length = mb_strlen($str);
    if ($length < $min || $length > $max) {
        return FALSE;
    } else {
        return TRUE;
    }
}

//获取消息状态
function getMsgStatu($uid)
{
    if (empty($uid)) {
        return;
    }
    $where['receiverid']  = $uid;
    $where['statu']       = 1;
    $where['receiverdel'] = 0;
    $number               = M('message')->where($where)->count();
    session('msg.totalnumber', $number);
}

//出生日期反向转换（筛选）
 function ageGroupReverse($str){

    switch($str){
        case '75后':
            $date['start']=strtotime('1975-01-01');
            $date['end']=strtotime('1979-12-31');
            break;

        case '80后':
            $date['start']=strtotime('1980-01-01');
            $date['end']=strtotime('1984-12-31');
            break;

        case '85后':
            $date['start']=strtotime('1985-01-01');
            $date['end']=strtotime('1989-12-31');
            break;

        case '90后':
            $date['start']=strtotime('1990-01-01');
            $date['end']=strtotime('2037-01-01');
            break;
    }

    return $date;

}

//注册时间转换
function regTime($date)
{
    $timec   = time() - ($date - 24 * 60 * 60);  //计算时间差
    $timeday = 24 * 60 * 60;
    $year    = floor($timec / (365 * $timeday));
    $timec %= (365 * 24 * 60 * 60);
    $month = floor($timec / (30 * $timeday));
    $timec %= (30 * 24 * 60 * 60);
    $day = floor($timec / ($timeday));
    if ($year <= 0) {
        $year = "";
    } else {
        $year = $year . "年";
    }
    if ($month <= 0 && $year <= 0) {
        $month = "";
    } else {
        $month = $month . "月";
    }

    return $year . $month . $day . "天";
}


//登录时间转换
function loginTime($date)
{
    $timeday = 24 * 60 * 60;
    $str     = '';
    if ($date > strtotime(date("Y:m:d") . " 00:00:00")) {
        $str = "今天登录过";
    } elseif ($date > (strtotime(date("Y:m:d") . " 00:00:00") - $timeday)) {
        $str = "昨天登录过";
    } elseif ($date > (strtotime(date("Y:m:d") . " 00:00:00") - 2 * $timeday)) {
        $str = "三天内登录过";
    } elseif ($date > (strtotime(date("Y:m:d") . " 00:00:00") - 6 * $timeday)) {
        $str = "一周内登录过";
    } elseif ($date > (strtotime(date("Y:m:d") . " 00:00:00") - 29 * $timeday)) {
        $str = "一月内登录过";
    } elseif ($date > (strtotime(date("Y:m:d") . " 00:00:00") - 89 * $timeday)) {
        $str = "三月内登录过";
    } elseif ($date > (strtotime(date("Y:m:d") . " 00:00:00") - 364 * $timeday)) {
        $str = "一年内登录过";
    } else {
        $str = "失踪已久";
    }


    return $str;
}

    //年龄段
 function ageGroup($date)
{
    $str = '';
    if ($date < strtotime("1950-01-01")) {
        $str = "老人家";
    } elseif ($date < strtotime("1960-01-01")) {
        $str = "50后";
    } elseif ($date < strtotime("1970-01-01")) {
        $str = "60后";
    } elseif ($date < strtotime("1980-01-01")) {
        $str = "70后";
    } elseif ($date < strtotime("1990-01-01")) {
        $str = "80后";
    } elseif ($date < strtotime("2000-01-01")) {
        $str = "90后";
    } elseif ($date < strtotime("2010-01-01")) {
        $str = "00后";
    } else {
        $str = "小鲜肉";
    }

    return $str;
}