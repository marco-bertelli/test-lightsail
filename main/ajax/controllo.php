<?
if ($_POST["modulo"]!="home"){
	session_start();
	//var_dump($_SESSION);
$target=$_POST["target"];
$metodo=$_POST["metodo"];
$modulo=$_POST["modulo"];
require_once ("../dbconnect.php");
require_once("../model/".$modulo.".php");

//echo "SONO IN CONTROLLO METODO -> ".$metodo." - CON MODULO -> ".$modulo." - CON TARGET -> ".$target."       <BR>";
 
 /******FUNZIONI PHP CONTROLLO APERTURA**********************/
	 
  switch ($metodo){
	 
	case "block":
		
		$stringa="UPDATE ".$modulo." SET inuse=1, last_user='".$_SESSION["user"]."' where id='$target'";
		//var_dump($stringa);
		mysql_query ($stringa) or die ("Error in query: ".mysql_error()); 
		
	break;
	case "unblock":
		$stringa="UPDATE ".$modulo." SET inuse=0 where id='$target'";
		//var_dump($stringa);
		mysql_query ($stringa) or die ("Error in query: ".mysql_error()); 
	break;
	case "check":
		$stringa="SELECT inuse, last_user FROM ".$modulo." where id='$target'";
		$qs = mysql_query ($stringa) or die ("Error in query: ".mysql_error());
		$check=mysql_fetch_array($qs);
		//var_dump ($check);
		if ($check[0]=='1'){
			echo "<script type='text/javascript'>localStorage.setItem('blocked_user', '".$check["last_user"]."');localStorage.setItem('blocked_id', '$target');console.log($target+' è bloccato');</script>";
			
		}
		else echo "<script type='text/javascript'>localStorage.removeItem('blocked_id');console.log($target+' sbloccato');</script>";
	break;
  }
}
 else echo "<script type='text/javascript'>localStorage.removeItem('controllo');</script>";
 /************************************************/
 ?>