<?php
    function connect($host='localhost', $username='root', $password = '', $dbname='trips')
    {
        $link = mysqli_connect($host, $username, $password, $dbname);
        mysqli_query($link, 'set names "utf8"');
        $err = mysqli_errno($link);
        //echo $err;
        if(!$err){
           // echo 'access open';
        }
        return $link;
    }
    function check_errors()
    {
        $link = connect();
        $err = mysqli_errno($link);
        if($err){
            echo "<h3><span style='color:red;'>Error $err</span></h3>";
            return false;
        }
        return true;
    }
    function register($login, $password, $email)
    {
        $name = trim(htmlspecialchars($login));
        $pass = md5(trim(htmlspecialchars($password)));
        $mail = trim(htmlspecialchars($email));
        if($name == '' || $pass == '' || $mail == ''){
            echo "<h3><span style='color:red;'>All fields need fill</span></h3>";
            return false;
        }
        $ins = "insert into users(login, password, email, role_id) values('$name', '$pass', '$mail', 2)";
        $link = connect();
        mysqli_query($link, $ins);
        return check_errors();
    }
    function login($login, $password) 
    {
        $ins = 'select * from users';
        $link = connect();
        $select = mysqli_query($link, $ins);
        foreach ($select as $item) {
            if($login == $item['login'] && md5($password) == $item['password']&& $item['role_id'] == 1){
                $_SESSION['admin'] = $login;
                return true; 
            }
            else if($login == $item['login'] && md5($password) == $item['password']&& $item['role_id'] == 2){
                $_SESSION['user'] = $login;
                return true;
            }
        }
        return false;
    }
?>