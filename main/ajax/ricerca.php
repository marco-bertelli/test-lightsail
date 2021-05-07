<?

$modulo=$_POST["modulo"];
$metodo=$_POST["metodo"];
$target=$_POST["target"];
$valori=array();
$valori=$_POST["data"];

	require_once ("../dbconnect.php");
    require_once('../model/ricerca.php');
    require_once('../model/clienti.php');     
 
 switch ($metodo){
	case "stampa":
    
	require_once ("../views/homesearch.php");
    break;
	
	case "search":
	foreach ($valori as $valore){ $arraytosave[$valore["name"]]=$valore["value"];}
    foreach ($arraytosave as $key => $input_arr) {$arraytosave[$key] = addslashes($input_arr);} 	
	//echo "sono in search con target ".$target." e valori"; var_dump ($arraytosave);
	//var_dump($target);
	if ($target=="clienti") $items=ricerca::cercaC($arraytosave["target"], $arraytosave["stringa"]);
	else if ($target=="fiere") $items=ricerca::cercaF($arraytosave["target"], $arraytosave["stringa"]);
	else if ($target=="montatori") $items=ricerca::cercaM($arraytosave["target"], $arraytosave["stringa"]);
		//$items=$modulo::get_all();    
	
	require_once ("../views/".$target.".php");
    
	 
	break;
    case "stampa_clienti":
     //var_dump($modulo);                                          
     $items=$modulo::get_all();    
     require_once ("../views/clienti.php");
    
     
    break;
 }