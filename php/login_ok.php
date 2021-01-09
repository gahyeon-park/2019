<?php
    if(!isset($_POST['user_id']) || !isset($_POST['user_pw'])) exit;

    $user_id = $_POST['user_id'];
    $user_pw = $_POST['user_pw'];
    $members = array('user1' => array('pw' => 'pw1', 'name' => '박가현'),
                    'user2' => array('pw' => 'pw2', 'name' => '지효남'),
                    'user3' => array('pw' => 'pw3', 'name' => '가나다'));

    if(!isset($members[$user_id])) {
        echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.'); history.back();</script>";
        exit;        
    }
    
    if($members[$user_id]['pw'] != $user_pw) {
        echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.'); history.back();</script>";
        exit;        
    }

    setcookie('user_id', $user_id, time() + (86400 * 30), '/');
    setcookie('user_name', $members[$user_id]['name'], time() + (86400 * 30), '/');
?>
<meta http-equiv='refresh' content='0;url=./cookiePractice.php'>
