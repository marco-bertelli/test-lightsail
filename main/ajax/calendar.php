<?
session_start();
$modulo=$_POST["modulo"];
$metodo=$_POST["metodo"];
$id=$_POST["target"];
$inizio=$_POST['inizio'];
$fine=$_POST['fine'];
$note=$_POST['note'];
$title=$_POST['title'];
$cliente=$_POST['cliente'];
$pr=$_POST['pr'];
$pr_name=$_POST['pr_name'];
$color=$_POST['color'];
$valori=array();
$valori=$_POST["data"];
$confermato=$_POST["confermato"];



// var_dump($confermato);
require_once ("../dbconnect.php");
require_once("../model/eventi.php");
require_once("../model/clienti.php");
 
 switch ($metodo){
	  
	
    case "stampa":
		$eventi = eventi::get_all();
        $file="js_sw/calendar/test.json";
        file_put_contents($file, json_encode ($eventi)) or die ("jsonecondebroken");
     require_once ("../views/calendar.php");
    break;
	case "reset":
     //var_dump($modulo);                                          
     $items=clienti::reset();    
    break;
	case "delete":
		$evento=eventi::get($id);
		require_once('mailCancella.php');	 
		eventi::delete($id);
		$eventi = eventi::get_all();
        $file="../js_sw/calendar/test.json";
		file_put_contents($file, json_encode ($eventi)) or die ("jsonecondebroken");
		echo 'Evento cancellato';
		//echo "<script type='text/javascript'>$('#calendar').fullCalendar( 'removeEvents' );$('#calendar').fullCalendar( 'refetchEvents' );</script>";
		//stringa modale messaggi $("#message").modal('show', function (){$("#message").delay(500).modal('hide');});
     
    break;
	case "editData":
		if ($id!='')
		{
			$oldItem=$modulo::get($id);
			$arraytosave=array();
			$arraytosave["start"]=$inizio;			
			$arraytosave["end"]=$fine;			
			//var_dump($arraytosave);			
            eventi::update($id, $arraytosave);
            echo  'Data Modificata<br>';
			$item=$modulo::get($id);
			require_once('mailModifica.php');
			//var_dump($arraytosave);    
			/*$eventi = eventi::get_all();
            $file="../js_sw/calendar/test.json";
			file_put_contents($file, json_encode ($eventi)) or die ("jsonecondebroken");
			
			echo "<script type='text/javascript'>$('#calendar').fullCalendar( 'refetchEvents' );</script>";
            echo "evento modificato<br>";*/
			
		}
	else $message="Valori non ricevuti";
	break;
	 /*<option value="Cantalupa">Cantalupa</option>
                                                <option value="Cariplo">Cariplo</option>
                                                <option value="Gairdino">Gairdino</option>
                                                <option value="Manifestazioni">Manifestazioni</option>
                                                <option value="San Pellegrino">San Pellegrino</option>
	 <option value="#f37054"     <? if ($_POST['sfondo'] == "#f37054") echo "selected='selected'" ?> >Rosso</option>
		<option value="#A9D86E" <? if ($_POST['sfondo'] == "#A9D86E") echo "selected='selected'" ?> >Verde</option>
		<option value="#a1a1a1" <? if ($_POST['sfondo'] == "#a1a1a1") echo "selected='selected'" ?> >Grigio</option>
		<option value="#232ccb" <? if ($_POST['sfondo'] == "#232ccb") echo "selected='selected'" ?> >Blu</option>
		<option value="#1FB5AD" <? if ($_POST['sfondo'] == "#1FB5AD") echo "selected='selected'" ?> >Azzurro</option>
		<option value="#a48ad4" <? if ($_POST['sfondo'] == "#a48ad4") echo "selected='selected'" ?> >Fucsia</option>
		<option value="#FCB322" <? if ($_POST['sfondo'] == "#FCB322") echo "selected='selected'" ?> >Arancio</option>*/
	case "edit":
		if ($valori!='')
		{
			$oldItem=$modulo::get($id);
			
			$arraytosave=array();
			foreach ($valori as $valore){ $arraytosave[$valore["name"]]=$valore["value"];}
            foreach ($arraytosave as $key => $input_arr) {$arraytosave[$key] = addslashes($input_arr);} 
            $date = DateTime::createFromFormat('d-m-Y H:i', $arraytosave["start"]);
            $arraytosave["start"]=$date->format('c');
            $date = DateTime::createFromFormat('d-m-Y H:i', $arraytosave["end"]);
            $arraytosave["end"]=$date->format('c');
			//var_dump($arraytosave);
			$mailSent=0;
			if ( $arraytosave["inviato"] == 'true' && $oldItem["inviato"] !='true') echo '<script type="text/javascript">console.log("mando mail da opzionare")</script>';
			if ( $arraytosave["opzionato"] == 'true' && $oldItem["opzionato"] !='true'){
				if ($arraytosave["id_pr"]!="") {
					$qs= "SELECT * FROM utenti WHERE id='".$arraytosave["id_pr"]."' limit 1";
					$query= mysql_query($qs);
					$selected_user= mysql_fetch_array($query);
					
					if ($selected_user["mail"]!="") {
						$address=$selected_user["mail"];
						$subject="Evento ".$arraytosave["title"]." opzionato";
						$htmlMail="Tipo Evento: ".$arraytosave["tipo"].
							"<br>Data: ".$arraytosave["start"]." - " .$arraytosave["end"].
							"<br> Location : ".$arraytosave["location"].
							"<br> Partecipanti : ".$arraytosave["partecipanti"];
							require_once('mailDynamic.php');
							$mailSent=1;
					} 
					else echo "utente non ha mail";
				}
				else echo "evento non ha pr";
			}
			if ( $arraytosave["confermato"] == 'true' && $oldItem["confermato"] !='true'){
				if ($arraytosave["id_pr"]!="") {
					$qs= "SELECT * FROM utenti WHERE id='".$arraytosave["id_pr"]."' limit 1";
					$query= mysql_query($qs);
					$selected_user= mysql_fetch_array($query);
					
					if ($selected_user["mail"]!="") {
						$address=$selected_user["mail"];
						$subject="Evento ".$arraytosave["title"]." confermato";
						$htmlMail="Tipo Evento: ".$arraytosave["tipo"].
							"<br>Data: ".$arraytosave["start"]." - " .$arraytosave["end"].
							"<br> Location : ".$arraytosave["location"].
							"<br> Partecipanti : ".$arraytosave["partecipanti"];
							require_once('mailDynamic.php');
							$mailSent=1;
					
					} 
					else echo "utente non ha mail";
				}
				else echo "evento non ha pr";
				
			} 
            if (isset($arraytosave['titoloTodo']))	{ unset($arraytosave['titoloTodo']); }	
			// if ($_SESSION["role"]=="admin"){
			
			if (isset($arraytosave['location']) && ($arraytosave['location']!=$oldItem["location"] || $arraytosave['inviato']!=$oldItem["inviato"]) && $arraytosave['inviato']=='true')
			{
				if ($arraytosave["location"]=="Cantalupa") $arraytosave["color"]="#f400a1";
				if ($arraytosave["location"]=="Cariplo") $arraytosave["color"]="#1FB5AD";
				if ($arraytosave["location"]=="Giardino") $arraytosave["color"]="#A9D86E";
				if ($arraytosave["location"]=="Manifestazioni") $arraytosave["color"]="#ef761d";
				if ($arraytosave["location"]=="Gallia") $arraytosave["color"]="#232ccb";
				if ($arraytosave["location"]=="Evento Esterno") $arraytosave["color"]="#B80000";
				if ($arraytosave["location"]=="RistoGolf") $arraytosave["color"]="#DE9A3F";
			}
			if ($arraytosave["inviato"]!='true' && $arraytosave["confermato"]!='true'){
				$arraytosave["color"]="#a1a1a1";
			}		
			
            eventi::update($id, $arraytosave);
			
			$item = $modulo::get($id);
			$sendMailCounter = 0 ;
			$campiModificati = "" ;
			//Tolgo le chiavi numeriche a mano per timore che cambiando la get rompo qualcosa
			foreach($item as $key => $value){
				if(is_numeric($key)) unset($item[$key]);
			}
			foreach($oldItem as $key => $value){
				if(is_numeric($key)) unset($oldItem[$key]);
			}
			
			foreach ($oldItem as $key => $value) {
				if ($item[$key] != $value){ 
					// echo "vecchio: ".$value."- nuovo: ". $item[$key]. $key ."<br>";
					 // echo  $key ;
					if ($key == "start" || $key == "end") $campiModificati.="Data ";
					else $campiModificati.= $key." ";
					$sendMailCounter++;
				}
			};
			echo "Sono stati modificati i seguenti campi : <b>$campiModificati</b>";
			if ($sendMailCounter!=0) require_once('mailModifica.php');
			$eventi = eventi::get_all();
            $file="../js_sw/calendar/test.json";
			file_put_contents($file, json_encode ($eventi)) or die ("jsonecondebroken");
			
			//echo "<script type='text/javascript'> $('#calendar').fullCalendar( 'removeEvents' ); $('#calendar').fullCalendar( 'refetchEvents' );</script>";
			/*echo "<script type='text/javascript'>
			var eventReloaded=$('#calendar').fullCalendar( 'clientEvents',".$id." );
			console.log(eventReloaded);
			$('#calendar').fullCalendar( 'updateEvent', eventReloaded );</script>";*/
           
			
		}
	else $message="Valori non ricevuti";
	break;
	case "create":
		if ($title!='')
		{
			$title=addslashes($title);
			$note=addslashes($note);
			$inizioMail = $inizio;
			$fineMail = $fine;
            $date1 = DateTime::createFromFormat('d-m-Y H:i', $inizio);
			$inizio=$date1->format('c');
            $date2 = DateTime::createFromFormat('d-m-Y H:i', $fine);
			$fine=$date2->format('c');
			$qs= "SELECT * FROM utenti WHERE id='$pr' limit 1";
			$query= mysql_query($qs);
			$selected_user= mysql_fetch_array($query);
			//var_dump($inizio);
            //$date = new DateTime($fine);     
			//var_dump($fine);
            $id=eventi::create($title, $inizio, $fine, $note, $cliente, $pr, $color, $selected_user["name"]);
			
			$eventi = eventi::get_all();
			require_once('mailCreaEvento.php');
            $file="../js_sw/calendar/test.json";
			file_put_contents($file, json_encode ($eventi)) or die ("jsonecondebroken");
			//echo "<script type='text/javascript'>$('#calendar').fullCalendar( 'removeEvents' );$('#calendar').fullCalendar( 'refetchEvents' );</script>";
		}
	else $message="Valori non ricevuti";
	break;
	case "createTodo":
		if ($_POST!='')
		{
            $todo=eventi::createTodo($_POST["titolo"],$_POST["id_evento"]);
			//var_dump($todo);
            require_once ("../views/blocks/todo.php");
			//echo "<script type='text/javascript'>$('#calendar').fullCalendar( 'removeEvents' );$('#calendar').fullCalendar( 'refetchEvents' );</script>";
		}
	else $message="Valori non ricevuti";
	break;
	case "deleteTodo":
		//var_dump($modulo);      
		eventi::deleteTodo($id);

		//echo 'Evento cancellato';
		//echo "<script type='text/javascript'>$('#calendar').fullCalendar( 'removeEvents' );$('#calendar').fullCalendar( 'refetchEvents' );</script>";
		//stringa modale messaggi $("#message").modal('show', function (){$("#message").delay(500).modal('hide');});
     
    break;
	case "updateTodo":
		$check=$_POST["check"];
		$stringa="UPDATE todo SET done=$check WHERE id = '$id' LIMIT 1";
		mysql_query ($stringa)or die(mysql_error());
		//echo $stringa;
	break;
	
	
    case "pick": 
    
             if ($_SESSION["role"]== "admin") $picks=clienti::get_all();    
             else $picks=clienti::get_byPR($_SESSION["id_utente"]);  
            //$picks = eventi::pick_cliente($id);        
            require_once ("../modals/scelta_cliente.php");
            //var_dump($picks);            
    break;
     case "pick_pr":      
            $prs = eventi::get_all_pr();        
            require_once ("../modals/scelta_pr.php");
            //var_dump($prs);            
    break;
	
 }
 
 
 ?>