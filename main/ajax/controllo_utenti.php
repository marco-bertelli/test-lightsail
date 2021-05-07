<?

//$target=$_POST["target"];
//$metodo=$_POST["metodo"];

require_once ("../dbconnect.php");
require_once("../model/users.php");
session_start();
//session_destroy();
//var_dump($_SESSION);
$user = new Users();
//echo "user -> ";
if ( !$user->logged()) echo "block";
else echo "controlled";
 /******FUNZIONI PHP CONTROLLO APERTURA**********************/

 /************************************************/