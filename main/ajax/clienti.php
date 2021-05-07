<?
session_start();

$modulo=$_POST["modulo"];
$metodo=$_POST["metodo"];
$id=$_POST["target"];
$valori=array();
$valori=$_POST["data"];

require_once ("../dbconnect.php");
require_once("../model/".$modulo.".php");
require_once('../model/agenti.php');
require_once('../model/settings.php');

         
 
 switch ($metodo){
	  
	case "goto":
	 a:
	 
     //**********************************************************************************************/
     //riempio tutte le variabili per clienti e agenti, magari mettiamole in una funzione per chiarezza
	         $item=$modulo::get($id	);
                     if (!empty($item)){
					$items_agenti = agenti::get_azienda($id);
                    $tipologia = settings::get("tipologia");
                    $ruoli = settings::get("ruoli");
                    $titoli = settings::get("titoli");
                    $regioni = settings::get("regioni");			
					 }
			/*for ($i=0;$i<count($items_agenti);$i++){
                $list_int_id[$i]=$items_agenti[$i]["interessi"];
            }
             if (!empty($list_int_id)){$interessi_agenti = agenti::get_interessi($list_int_id); }
			 //var_dump ($interessi_agenti); */
             
    //**********************************************************************************************/
	require_once ("../views/clienti_upd.php");
    
	 
	break;
    case "stampa":
    if ($_SESSION["role"]== "admin") $items=$modulo::get_all();    
	else $items=$modulo::get_byPR($_SESSION["id_utente"]);    
	require_once ("../views/clienti.php");
    break;
	case "reset":
     //var_dump($modulo);
	 
     $items=clienti::reset();    
    break;
	case "delete":
     //var_dump($modulo);                                          
    
	if ($_SESSION["role"]== "admin") clienti::delete($id);    
	else clienti::unlinkPR($_SESSION["id_utente"], $id);    
	
	$message='Cliente cancellato';
     
    break;
	case "unlink":
     //var_dump($modulo);                                          
    clienti::unlinkPR($_SESSION["id_utente"], $id);
	$message='Cliente cancellato';
     
    break;
	case "tocsv":
		$items = clienti::get_CSV();
		$json = json_encode($items);
		echo $json;
		
		function array_to_csv_download($items, $filename = "export.csv", $delimiter=";") {
                header('Content-Type: application/csv');
				header('Content-Disposition: attachment; filename="'.$filename.'";');

				// open the "output" stream
				// see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
				$f = fopen('php://output', 'w');

				foreach ($items as $line) {
					fputcsv($f, $line, $delimiter);
				}
				
             
                fpassthru($f);
            
		}
		 
		  //$items = clienti::export_csv_mail();
		  // array_to_csv_download($items);
	break;
	case "associa_cliente":
		$cliente=clienti::get($id);
		clienti::associa($_SESSION["id_utente"], $id);
		require_once('mailAssocia.php');
		$message='cliente associato con successo';
		goto a;
	break;
	case "check_create":
		if ($valori!='')
		{
			
			$arraytosave=array();
			foreach ($valori as $valore){ $arraytosave[$valore["name"]]=$valore["value"];}
            foreach ($arraytosave as $key => $input_arr) {$arraytosave[$key] = addslashes($input_arr);} 		
			//var_dump($arraytosave);			
			$check=clienti::check_create($arraytosave["CF"], $arraytosave["PIVA"]);
			//var_dump ($check);
			if (empty($check))echo "1";
			else require_once ("../views/blocks/check_block.php");
		}
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
            clienti::update($id, $arraytosave);
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
            $id=clienti::create($arraytosave["nome"], $arraytosave["CF"], $arraytosave["PIVA"], $_SESSION["id_utente"]);
            $message='Cliente creato con successo'; 
			echo "<script type='text/javascript'>localStorage.setItem('goto_id', ".$id.");</script>";
			goto a;
			//require_once ("../views/clienti_updTest.php");
		}
		
	else echo "<br>";
		//	$message="Valori non ricevuti";
	break;
	
    case "refresh":    
    $refresh_item=$modulo::get_ass($id);
    echo json_encode($refresh_item); 
    break;
    case "pick":
        if ($id == "gruppo") {
            $picks = $modulo::pick_gruppo();        
            require_once ("../modals/scelta_clienti.php");
            //var_dump($picks);
        }     
    break;
	case "pick_cliente":
          $item=$modulo::get($id);
          echo json_encode($item);
       
    break;
	//CALENDAR TWEAKS
	case "calendarCheck_create":
		if ($valori!='')
		{
			
			$arraytosave=array();
			foreach ($valori as $valore){ $arraytosave[$valore["name"]]=$valore["value"];}
            foreach ($arraytosave as $key => $input_arr) {$arraytosave[$key] = addslashes($input_arr);} 		
			//var_dump($arraytosave);			
			$check=clienti::check_create($arraytosave["CF"], $arraytosave["PIVA"]);
			//var_dump ($check);
			if (empty($check))echo "1";
			else require_once ("../views/blocks/calendarCheck_block.php");
		}
	break;
	case "calendarCreate":
		if ($valori!='')
		{
			$arraytosave=array();
			foreach ($valori as $valore){ $arraytosave[$valore["name"]]=$valore["value"];}
            foreach ($arraytosave as $key => $input_arr) {$arraytosave[$key] = addslashes($input_arr);} 		
			//var_dump($arraytosave);			
            $id=clienti::create($arraytosave["nome"], $arraytosave["CF"], $arraytosave["PIVA"], $_SESSION["id_utente"]);
			$cliente=clienti::get($id);
            $message='Cliente creato con successo'; 
			echo json_encode($cliente);
		}
		else json_encode("errore","Nessun Valore Ricevuto");
		//	$message="Valori non ricevuti";
	break;
	case "calendarAssocia_cliente":
		$cliente=clienti::get($id);
		clienti::associa($_SESSION["id_utente"], $id);
		$cliente=clienti::get($id);
		
		require_once('mailAssocia.php');
		echo json_encode($cliente);
		
	break;
 }
 
 
 /******FUNZIONI PHP GESTIONE**********************/
 
  function modelli () { 
      
      
   
  } 
 
 
 /************************************************/
 ?>