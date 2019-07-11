<?php 
    define('host','127.0.0.1');
    define('user','root');
    define('password','isidro01');
    define('db','Fiscal_Pro');

    $cn = mysqli_connect(host,user,password,db);

    if(!$cn)
    {
        die('Error al intentar conectar con la base de datos');
    }


    function connect()
    {
        $cn = mysqli_connect(host,user,password,db);

        if(!$cn)
        {
            die('Error al intentar conectar con la base de datos');
        }
        return $cn;
    }
?>