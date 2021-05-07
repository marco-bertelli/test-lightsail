<?

$modulo=$_POST["modulo"];
$metodo=$_POST["metodo"];
$id=$_POST["target"];

$valori=$_POST["data"];

require_once ("../dbconnect.php");
require_once("../model/".$modulo.".php");
require_once('../model/agenti.php');
require_once('../model/interessi.php');
/*require_once('../model/industrie.php');
require_once('../model/ruoli.php');
require_once('../model/titoli.php');
require_once('../model/regioni.php');
require_once('../model/origini.php');
require_once('../model/interessi_agenti.php');
require_once('../model/trattative.php');*/
            
 
 switch ($metodo){
	 
	case "goto":
	 a:
     //**********************************************************************************************/
     //riempio tutte le variabili per clienti e agenti, magari mettiamole in una funzione per chiarezza
	        $item=$modulo::get($id);
            if (!empty($item)){
                    $items_agenti = agenti::get_azienda($id);
					$trattative = trattative::get_all_byazienda($id);
                    $tipologia = tipologia::get_all();
                    $interessi = interessi::get_all();
                    $ruoli = ruoli::get_all();
                    $titoli = titoli::get_all();
                    $regioni = regioni::get_all();
                    $responsabili = responsabili::get_all();
	                //var_dump($items_agenti);
             }
    //**********************************************************************************************/
	require_once ("../views/clienti_upd.php");
    
	 
	break;
    case "stampa":
     //var_dump($modulo);                                          
	$items=$modulo::get_all(); 
	
	// $stringa = 'SELECT * FROM utenti';
	// $qs = mysql_query($stringa);
		// $items=array();
		// while ($row = mysql_fetch_array($qs))
			// array_push($items,$row);
	// var_dump($items);
	// foreach ($items as $item){
		// echo $item["nome_utente"];
		// echo "<br>";
		// mysql_query("UPDATE utenti SET name='".$item["nome_utente"]."' WHERE id='".$item['id']."'");
		// echo "UPDATE utenti SET name='".$item["nome_utente"]."' WHERE id='".$item['id']."'";
	// }
	//$arrayId= explode (",", $valore);
	 // if (!in_array($id_pr, $arrayId)){echo "aggiungo"; $valore =$valore.",".$id_pr;}
	// $arrayId= explode (",", $valore);
	 // if (!in_array($id_pr, $arrayId)){echo "aggiungo"; $valore =$valore.",".$id_pr;}
	// var_dump($arrayId);
     require_once ("../views/settings.php");
    break;
	case "delete":
     //var_dump($modulo);                                          
    clienti::delete($id);
	$message='Cliente cancellato';
     
    break;
	case "edit":
		if ($valori!='')
		{
			
			/*$arraytosave=array();
			foreach ($valori as $valore){ $arraytosave[$valore["name"]]=$valore["value"];}
            foreach ($arraytosave as $key => $input_arr) {$arraytosave[$key] = addslashes($input_arr);} 	*/	
			//var_dump($arraytosave);
			$valor=addslashes($valori);
            settings::update($id, $valori);
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
            $id=clienti::create($arraytosave["nome"]);
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