<?

$modulo=$_POST["modulo"];
$metodo=$_POST["metodo"];
$id=$_POST["target"];
$valori=array();
$valori=$_POST["data"];


//echo "inside modulo ". $modulo;

require_once ("../dbconnect.php");
require_once("../model/".$modulo.".php");

            
 
 switch ($metodo){
     
    
	 
	case "goto_inner":
	 a:
     //**********************************************************************************************/
     //riempio tutte le variabili per clienti e agenti, magari mettiamole in una funzione per chiarezza
		$items_agente=$modulo::get($id);
			//$interessi = interessi::get_all();
		  	$ruoli = settings::get("ruoli");
			$titoli = settings::get("titoli");
			//$interessi_agenti=interessi_agenti::get_all_agente($items_agente['interessi']);

	require_once ("../views/agenti.php");
	break;
	case "delete":
     //var_dump($modulo);        
	 //var_dump($id);
    $modulo::delete($id);
	$message='Cliente cancellato';
     
    break;
	case "del_interesse":
     //var_dump($modulo);        
	 //var_dump($id);
    interessi_agenti::delete($id);
	$message='Cliente cancellato';
     
    break;
	case "edit":
		if ($valori!='')
		{
			$item=$modulo::get($id);
			$arraytosave=array();
			foreach ($valori as $valore){ $arraytosave[$valore["name"]]=$valore["value"];}
            foreach ($arraytosave as $key => $input_arr) {$arraytosave[$key] = addslashes($input_arr);} 		
				$stringa_interessi = $arraytosave["stringa_interessi"];
			unset($valori["stringa_interessi"]);		
            
                $codice = $item["interessi"] ;
				//var_dump($codice);			
            $modulo::update($id, $arraytosave);
              if ( $stringa_interessi != "" )
            {                               
                list($sigla, $descrizione, $tipo,) = explode('-', $stringa_interessi);
                
                //var_dump($sigla, $descrizione, $tipo, $codice);
                 $interessi_agente  =  interessi_agenti::create($codice, $sigla, $descrizione, $tipo);
                require_once('../views/interessi_agenti_block.php');
            }
            
           
            
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
			//var_dump($id);			
            $id=$modulo::create($id, $arraytosave["nome"], $arraytosave["cognome"], $arraytosave["telefono"]);
            $message='Cliente creato con successo'; 
            
           
             
			goto a;
             
             
			
		}
	else $message="Valori non ricevuti";
	break;
	case "inner_create":
		if ($valori!='')
		{
			$arraytosave=array();
			foreach ($valori as $valore){ $arraytosave[$valore["name"]]=$valore["value"];}
            foreach ($arraytosave as $key => $input_arr) {$arraytosave[$key] = addslashes($input_arr);} 		
			//var_dump($arraytosave);			
			//var_dump($id);			
            $id=$modulo::create($id, $arraytosave["nome"], $arraytosave["cognome"], $arraytosave["mail"]);
            $message='Cliente creato con successo';  
			
			goto a;
             
			
		}
	else $message="Valori non ricevuti";
	break;
	
 }
 
 
 /******FUNZIONI PHP GESTIONE**********************/
 
  function modelli () { 
      
      
   
  } 
 
 
 /************************************************/
 ?>