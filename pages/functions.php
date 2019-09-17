<?php
    function connect($host='localhost', $username='root', $password = '', $dbname='trips')
    {
        $link = mysql_connect($host, $username, $password);
        mysql_select_db($dbname);
        mysql_query( 'set names "utf8"');
        $err = mysql_errno();
        echo $err;
        if(!$err){
            echo 'access deny';
        }

    }
    function check_errors()
    {
        $err = mysql_errno();
        if($err){
            echo "<h3><span style='color:red;'>Error $err</span></h3>";
            return false;
        }
        return true;
    }
    function register($login, $password, $email)
    {
        echo $email;
        $name = trim(htmlspecialchars($login));
        $pass = md5(trim(htmlspecialchars($password)));
        $mail = trim(htmlspecialchars($email));
        if($name == '' || $pass == '' || $mail == ''){
            echo "<h3><span style='color:red;'>All fields needs fill</span></h3>";
            return false;
        }
        $ins = "insert into users(login, password, email, role_id) values('$name', '$pass', '$mail', 2)";
        echo $ins;
        mysql_query($ins);
        return check_errors();
    }
?>