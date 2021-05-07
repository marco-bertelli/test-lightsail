<?

$modulo=$_POST["modulo"];
$metodo=$_POST["metodo"];
$id=$_POST["target"];
$valori=array();
$valori=$_POST["data"];
session_start();
//var_dump($_SESSION);

require_once ("../dbconnect.php");
require_once("../model/eventi.php");
require_once("../model/stand.php");
 
 switch ($metodo){
	  
	
    case "stampa":
	//session_destroy();
     require_once ("../views/file_system.php");
    break;
	case "block":
		$stringa="INSERT INTO files (id, file, user, data) VALUES (NULL, '$id', '".$_SESSION["user"]."', NOW())";
		mysql_query ($stringa) or die ("Error in query: ".mysql_error()); 
	break;
	case "check":
		$stringa="SELECT * FROM files where file='$id'";
		//echo $stringa;
		$qs = mysql_query ($stringa) or die ("Error in query: ".mysql_error());
		$check=mysql_fetch_array($qs);
		//var_dump ($check);
		if (!is_array($check)){
			$stringa="INSERT INTO files (id, file, user, data) VALUES (NULL, '$id', '".$_SESSION["user"]."', NOW())";
			mysql_query ($stringa) or die ("Error in query: ".mysql_error()); 
			$stringa="free";
			echo json_encode($stringa);
			
		}
		else echo json_encode($check["user"]);
		
		/*if ($check[0]=='1'){
			echo "<script type='text/javascript'>localStorage.setItem('blocked_user', '".$check["last_user"]."');localStorage.setItem('blocked_id', '$target');console.log($target+' è bloccato');</script>";
			
		}
		else echo "<script type='text/javascript'>localStorage.removeItem('blocked_id');console.log($target+' sbloccato');</script>";*/
	break;
	case "reset":
     //var_dump($modulo);                                          
     $items=clienti::reset();    
    break;
	case "delete":
	//echo (getcwd());
    //var_dump($_POST["path"]);
	unlink("../".$_POST["path"]);	 
    break;
	case "editData":
		if ($id!='')
		{
			$item=$modulo::get($id);
			$arraytosave=array();
			$arraytosave["start"]=$inizio;			
			$arraytosave["end"]=$fine;			
			//var_dump($arraytosave);			
            eventi::update($id, $arraytosave);
            echo  'Data Modificata<br>';
			
			/*$eventi = eventi::get_all();
            $file="../js_sw/calendar/test.json";
			file_put_contents($file, json_encode ($eventi)) or die ("jsonecondebroken");
			
			echo "<script type='text/javascript'>$('#calendar').fullCalendar( 'refetchEvents' );</script>";
            echo "evento modificato<br>";*/
			
		}
	else $message="Valori non ricevuti";
	break;
	case "edit":
		if ($valori!='')
		{
			$item=$modulo::get($id);
			$arraytosave=array();
			foreach ($valori as $valore){ $arraytosave[$valore["name"]]=$valore["value"];}
            foreach ($arraytosave as $key => $input_arr) {$arraytosave[$key] = addslashes($input_arr);} 		
			//var_dump($arraytosave);			
            eventi::update($id, $arraytosave);
			
			$eventi = eventi::get_all();
            $file="../js_sw/calendar/test.json";
			file_put_contents($file, json_encode ($eventi)) or die ("jsonecondebroken");
			
			echo "<script type='text/javascript'>$('#calendar').fullCalendar( 'removeEvents' );$('#calendar').fullCalendar( 'refetchEvents' );</script>";
			/*echo "<script type='text/javascript'>
			var eventReloaded=$('#calendar').fullCalendar( 'clientEvents',".$id." );
			console.log(eventReloaded);
			$('#calendar').fullCalendar( 'updateEvent', eventReloaded );</script>";*/
            echo 'Valori salvati con successo<br>';
			
		}
	else $message="Valori non ricevuti";
	break;
	case "create":
		if ($title!='')
		{
			
		
			//var_dump($arraytosave);			
            $id=eventi::create($title, $inizio, $fine, $note);
			echo "<script type='text/javascript'>$('#messages').attr('data-last', ".$id.");</script>";
			
			//console.log("id last created"+$("#messages").attr("data-last"));
			
           // $message='Evento creato con successo<br>';  
			//goto a;
             
             
			
		}
	else $message="Valori non ricevuti";
	break;
	
 }
 
 
 ?>