<?php
error_reporting(E_ALL ^ E_NOTICE);
define('IN_SCRIPT',true);

require_once('settings.php');
$settings['verzija']='1.3';

if(empty($_REQUEST['a'])) {
    $a='';
} else {
    $a=htmlspecialchars($_REQUEST['a']);
}

if ($settings['autosubmit'] && ($a=='addnew' || $a=='reply')) {

    session_start();

    if (!empty($_SESSION['block'])) {
        printTopHTML();
        problem('You are not allowed to post on this message board!');
    }

    if (empty($_SESSION['checked'])) {
        $_SESSION['checked']='N';
        $_SESSION['secnum']=rand(10000,99999);
        $_SESSION['checksum']=crypt($_SESSION['secnum'],$settings['filter_sum']);
    }
    if ($_SESSION['checked'] == 'N')
    {
        print_secimg();
    }
    elseif ($_SESSION['checked'] == $settings['filter_sum'])
    {
        $_SESSION['checked'] = 'N';
        $mysecnum=pj_isNumber($_POST['secnumber']);

        if(empty($mysecnum))
        {
            print_secimg(1);
        }

        require('secimg.inc.php');
        $sc=new PJ_SecurityImage($settings['filter_sum']);
        if (!($sc->checkCode($mysecnum,$_SESSION['checksum']))) {
            print_secimg(2);
        }

        $_SESSION['checked']='';

    }
    else
    {
        problem('Internal script error. Wrong session parameters!');
    }

}

printTopHTML();

if ($a) {

    if (!empty($_SESSION['block'])) {
        problem('You are not allowed to visit this forum!');
    }

    if ($a=='delete') {
        $num=pj_isNumber($_REQUEST['num'],'Internal script error: Wrong data type for $num');
        $up=pj_isNumber($_REQUEST['up'],'Internal script error: Wrong data type for $num');
        confirmDelete($num,$up);
    }
    if ($a=='confirmdelete') {
        $pass=pj_input($_REQUEST['pass'],'Please enter your admin password!');
        $num=pj_isNumber($_REQUEST['num'],'Internal script error: Wrong data type for $num');
        $up=pj_isNumber($_REQUEST['up'],'Internal script error: Wrong data type for $num');
        doDelete($pass,$num,$up);
    }

    $name=pj_input($_POST['name'],'Please enter your name!');
    $message=pj_input($_POST['message'],'Please write a message!');

    if(!empty($_POST['email']))
    {
        $email=pj_input($_POST['email']);
            if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
            {
                problem('Please enter a valid e-mail address!');
            }
        $char = array('.','@');
        $repl = array("&#46;","&#64;");
        $email=str_replace($char,$repl,$email);
    }
    else {$email='NO';}

    /* Check the message with JunkMark(tm)? */
    if ($settings['junkmark_use'])
    {
        $junk_mark=JunkMark($email,$message);

        if ($junk_mark >= $settings['junkmark_limit'])
        {
            $_SESSION['block'] = 1;
            problem('You are not allowed to post on this message board!');
        }
    }

    if ($a=='addnew')
    {
        $subject=pj_input($_POST['subject'],'Please write a subject!');
        addNewTopic($name,$email,$subject,$message);
    }
    elseif ($a=='reply')
    {
        $subject=pj_input($_POST['subject'],'Please write a subject!');
        $orig['id']=pj_isNumber($_POST['orig_id'],'Internal script error: Wrong data type for orig_id');
        $orig['name']=pj_input($_POST['orig_name'],'Internal script error: No orig_name');
        $orig['sub']=pj_input($_POST['orig_subject'],'Internal script error: No orig_subject');
        $orig['date']=pj_input($_POST['orig_date'],'Internal script error: No orig_date');
        addNewReply($name,$email,$subject,$message,$orig['id'],$orig['name'],$orig['sub'],$orig['date']);
    }
    else {problem('Internal script error: No valid action');}
}

?>