<?php
//echo "<script type='text/javascript'>console.log('giro');</script>";
session_start();
if($_POST) {
    // A list of permitted file extensions
    $allowed = array('png', 'jpg', 'gif','zip', 'pdf', 'docx', 'doc', 'dwg');
	$typedir = $_POST["typedir"]; //cartella interna alla commessa da uplodare
    $CommAnnoDir = $_POST["CommAnnoDir"];
    $OffDir = $_POST["OffDir"];
    $PreDir = $_POST["PreDir"];
    
    //var_dump($OffDir);
    
    
    if ($typedir == "Offerte") {
       $intDir = $OffDir."/";        
    } else if ($typedir == "Preventivi") {
       $intDir = $PreDir."/"; 
    } else {        
       $intDir = $CommAnnoDir."/".$typedir."/";   
    }
	//var_dump($intDir);
     
    /*  if (is_dir($intDir)) {
                    echo "La directory esiste";
                  } else {
                     Mkdir("/srv/datadisk01/home/fourthree/htdocs/standgreen/files/$uploaddir/",0777);
                    echo "Directory creata";
                  }
    
    

     $intDir="/srv/datadisk01/home/fourthree/htdocs/standgreen/files/$uploaddir/$typedir/";
             
                  if (is_dir($intDir)) {
                    echo "La directory esiste";
                  } else {
                     Mkdir("/srv/datadisk01/home/fourthree/htdocs/standgreen/files/$uploaddir/$typedir/",0777);
                    echo "Directory creata";
                  }

    NON SERVE PIU CONTROLLARE LE DIRECTORY CONTROLLO GIA FATTO*/
    
	require_once("../../dbconnect.php");
    if(isset($_FILES['upl'])){
		$nomefile=$_FILES['upl']['name'];
		//var_dump ($nomefile);
		$stringa="SELECT * FROM files where file='$nomefile'";
		//echo $stringa;
		$qs = mysql_query ($stringa) or die ("Error in query: ".mysql_error());
		$check=mysql_fetch_array($qs);
		//var_dump ($check);
		if (!is_array($check)){
			$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
			if(!in_array(strtolower($extension), $allowed)){
				echo '{"status":"error"}';
				exit;
			}

			if(move_uploaded_file($_FILES['upl']['tmp_name'], $intDir.$_FILES['upl']['name'])){
				echo '{"status":"success"}';
				exit;
			}
		}
		else if ($check["user"]==$_SESSION["user"]){
			$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
			if(!in_array(strtolower($extension), $allowed)){
				echo '{"status":"error"}';
				exit;
			}

			if(move_uploaded_file($_FILES['upl']['tmp_name'], $intDir.$_FILES['upl']['name'])){
				echo '{"status":"success"}';
				exit;
			}
		}
		else echo "file già aperto da ".$check["user"];
    }
}
//echo '{"status":"error2"}';
//exit;