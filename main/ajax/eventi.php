<?
session_start();

$modulo=$_POST["modulo"];
$metodo=$_POST["metodo"];
$id=$_POST["target"];
$valori=array();
$valori=$_POST["data"];

require_once ("../dbconnect.php");
//require_once("../model/".$modulo.".php");
 require_once('../model/eventi.php');
require_once('../model/clienti.php');
//require_once('../model/settings.php');

         
 
 switch ($metodo){
	  
	case "goto":
	 a:
	 
     //**********************************************************************************************/
     //riempio tutte le variabili per eventi e agenti, magari mettiamole in una funzione per chiarezza
	         $item=$modulo::get($id);
                     if (!empty($item)){
						$qs=mysql_query("SELECT * FROM todo WHERE id_evento='".$_POST['id']."'");
						$todoList=array();
						while ($row = mysql_fetch_array($qs))
							array_push($todoList,$row);
                         // var_dump($item);
						$datetimeI = new DateTime($item["start"]);
						$item["inizio"] =  $datetimeI->format('d-m-Y H:i');
						$datetime2 = new DateTime($item["end"]);
						$item["fine"] =  $datetime2->format('d-m-Y H:i');
					 }

             
    //**********************************************************************************************/
	require_once ("../views/eventi_upd.php");
    
	 
	break;
    case "stampa":
//    if ($_SESSION["role"]== "admin") $items=$modulo::get_all();
//	else $items=$modulo::get_byPR($_SESSION["id_utente"]);
         $items=$modulo::get_all();
         //var_dump($items);
	require_once ("../views/eventi.php");
    break;
	case "reset":
     //var_dump($modulo);
	 
     $items=eventi::reset();
    break;
	case "delete":
     //var_dump($modulo);                                          
    
		eventi::delete($id);
		$message='Cliente cancellato';
     
    break;


	case "edit":
		if ($valori!='')
		{
			$item=$modulo::get($id);
			$arraytosave=array();
			foreach ($valori as $valore){ $arraytosave[$valore["name"]]=$valore["value"];}
            foreach ($arraytosave as $key => $input_arr) {$arraytosave[$key] = addslashes($input_arr);} 		
			//var_dump($arraytosave);
			//if ($item["nome"]!=$arraytosave["nome"]) echo "nome cambiato, bool rename ( string oldname , string newname [, resource context ] )";
            eventi::update($id, $arraytosave);
            $message='Valori salvati con successo';  
            
           
             
			
		}
	else $message="Valori non ricevuti";
	break;

	case "create":
		if ($valori!='')
		{
			$arraytosave=array();
			foreach ($valori as $valore){ $arraytosave[$valore["name"]]=$valore["value"];}
            foreach ($arraytosave as $key => $input_arr) {$arraytosave[$key] = addslashes($input_arr);} 		
			//var_dump($arraytosave);			
            $id=eventi::create($arraytosave["nome"], $arraytosave["CF"], $arraytosave["PIVA"], $_SESSION["id_utente"]);
            $message='Cliente creato con successo'; 
			echo "<script type='text/javascript'>localStorage.setItem('goto_id', ".$id.");</script>";
			goto a;
			//require_once ("../views/eventi_updTest.php");
		}
		
	else echo "<br>";
		//	$message="Valori non ricevuti";
	break;


 }
 
 
 /******FUNZIONI PHP GESTIONE**********************/
 
  function modelli () { 
      
      
   
  } 
 
 
 /************************************************/
 ?>