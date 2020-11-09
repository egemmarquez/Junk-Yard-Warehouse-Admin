<?PHP

class conexion {	
var $host = "localhost";
var $db = "yonke_beta";
var $username = "root";
var $password = "mysql";
var $databaseconnect;
function __construct() {

if (!mysql_connect($this->host, $this->username, $this->password))
{

die();
}
else
{
mysql_select_db($this->db);
}


}

}



?>