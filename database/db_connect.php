<?php
    $DB['db_host'] = "localhost";
    $DB['db_user'] = "root";
    $DB['db_pass'] = "";
    $DB['db_name'] = "jontrodokan";

    foreach($DB as $key=>$value)
    {
        define(strtoupper($key), $value);
    }
    
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!$connect)
    {
        die("db error");
    }
?>