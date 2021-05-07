<?
session_start();

$modulo=$_POST["modulo"];
$metodo=$_POST["metodo"];
$id=$_POST["target"];
$valori=array();
$valori=$_POST["data"];

require_once ("../dbconnect.php");
require_once("../model/".$modulo.".php");
require_once('../model/stand.php');
         
 
 switch ($metodo){
      
    case "goto":
     a:
     
     //**********************************************************************************************/
     //riempio tutte le variabili per clienti e agenti, magari mettiamole in una funzione per chiarezza
             $item=$modulo::get($id    );
                         if (!empty($item)){                                  
                        $stands=stand::getbycliente($id);           
                     }
    //**********************************************************************************************/
    require_once ("../views/utenti_upd.php");
    
     
    break;
    case "stampa":
                                              
     $items=$modulo::get($id); 
        var_dump($items);    
     require_once ("../views/utenti.php");
    break;
    case "reset":
     //var_dump($modulo);                                          
     $items=clienti::reset();    
    break;
    case "delete":
     //var_dump($modulo);                                          
    clienti::delete($id);
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
            $id=clienti::create($arraytosave["nome"], $arraytosave["citta"]);
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