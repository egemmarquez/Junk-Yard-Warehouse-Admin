<?php
include('variables.php');
//# FileName="Connection_php_mysql.htm"

//# Type="MYSQL"

//# HTTP="true"

//$hostname_modulatemedia = "localhost";

//$database_modulatemedia = "noticias";

//$username_modulatemedia = "root";

//$password_modulatemedia = "nightmare18";

//$modulatemedia = mysql_pconnect($hostname_modulatemedia, $username_modulatemedia, $password_modulatemedia) or trigger_error(mysql_error(),E_USER_ERROR); 

# FileName="Connection_php_mysql.htm"

# Type="MYSQL"

# HTTP="true"

$hostname_modulatemedia = 'localhost';

$database_modulatemedia = 'yonke_beta';

$username_modulatemedia = 'root';

$password_modulatemedia = 'mysql';

$modulatemedia = mysql_pconnect($hostname_modulatemedia, $username_modulatemedia, $password_modulatemedia) or trigger_error(mysql_error(),E_USER_ERROR); 




?>