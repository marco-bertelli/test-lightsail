<?
//starto la session per prendere il basepath
session_start();
$modulo=$_POST["modulo"];
$metodo=$_POST["metodo"];
$id=$_POST["target"];
$valori=array();
$valori=$_POST["data"];

require_once("../dbconnect.php");

require_once('../model/stand.php');
require_once('../model/montatori.php');
require_once('../model/clienti.php');
require_once('../model/archivio.php');
require_once('../model/settings.php');




            
 
 switch ($metodo){
     case "id_insert":
    
     //**********************************************************************************************/
   
             /* $valori = stand::get_all();
              $clienti = clienti::get_all();
              foreach ($valori as $valore){
                    foreach ($clienti as $cliente){
                        if ($valore['cliente'] == $cliente['nome'] ) {
                           var_dump($valore['cliente']); 
                          //stand::id_insert($valore['id'], $cliente['id']);  
                            
                        }// fine if
                  
                    } //fine for clienti 
              }//fine foreach commesse
               
              
    //**********************************************************************************************/
     require_once ("../views/temp_commesse.php");     
    break; 
    case "create":
        
        
             /* $rootdir =   $_SESSION['BASEPATH'];
             //controllo quante offerte ci sono per sapere il numero che devo creare
                 if (is_dir ("$rootdir/home/tecnico/Commesse/Commesse_2017/"))$commesse = scandir ("$rootdir/home/tecnico/Commesse/Commesse_2017/");else $offerte='vuoto';
                 //var_dump($offerte); 
                 $count = 0;
                  for ($i=2;$i<count($commesse);$i++) {
                     $myArray = explode('_', $commesse[$i]);
                     var_dump($myArray);
                     $pippo = substr($myArray[0], 2, 3);
                     $stand=stand::create2($id, $pippo, $myArray[1], $myArray[2], $myArray[3], $myArray[4]); 
                            
                  }
            
            
            
            
            //$arraytosave=array();
            //foreach ($valori as $valore){ $arraytosave[$valore["name"]]=$valore["value"];}
            //foreach ($arraytosave as $key => $input_arr) {$arraytosave[$key] = addslashes($input_arr);}         
            //var_dump($arraytosave);            
           // $id=$modulo::create($arraytosave["ragione sociale"]);
            //$stand=$modulo::create($id, $arraytosave["nome_stand"], $arraytosave["tipo"], $arraytosave["id_Fiera"]);
        
            
            
             require_once ("../views/temp_commesse.php");  */
             
             
             /* $rootdir =   $_SESSION['BASEPATH'];
               $valori = stand::get_all();
                var_dump($valori);
               $confronto = "";
                foreach ($valori as $valore){
                   //$valore = (string)$valore;
                     $myArray = explode('_', $valore['nome']);
                     var_dump($myArray);
                     $pippo = substr($myArray[0], 2, 3);
                      if ($pippo != $confronto)   {
                     $stand=stand::create2( $pippo, $myArray[1], $myArray[2], $myArray[3], $myArray[4]); 
                     }
                     $confronto = $pippo;      
                  }
            
            
              */
                              
            //$arraytosave=array();
            //foreach ($valori as $valore){ $arraytosave[$valore["name"]]=$valore["value"];}
            //foreach ($arraytosave as $key => $input_arr) {$arraytosave[$key] = addslashes($input_arr);}         
            //var_dump($arraytosave);            
           // $id=$modulo::create($arraytosave["ragione sociale"]);
            //$stand=$modulo::create($id, $arraytosave["nome_stand"], $arraytosave["tipo"], $arraytosave["id_Fiera"]);
        
            
                                              
           //**********REPLACE ID************************************************************************************/
   
              /*$valori = stand::get_all();
              $clienti = clienti::get_all();
              foreach ($valori as $valore){
                    foreach ($clienti as $cliente){
                        if ($valore['cliente'] == $cliente['nome'] ) {
                           var_dump($valore['cliente']);
                          //stand::id_insert($valore['id'], $cliente['id']);  
                           $id_cliente=$cliente["id"];
                           $id_commessa=$valore["id"];
					   $query= mysql_query("UPDATE commesseTot SET id_cliente='$id_cliente' where id='$id_commessa' limit 1");
                        }// fine if
                  
                    } //fine for clienti 
              }//fine foreach commesse
               
              
              //**********************************************************************************************/
            
               //**********REPLACE ID e CREAZIONE FIERE************************************************************************************/
   
              /*$valori = stand::get_all();
              $clienti = clienti::get_all();
              foreach ($valori as $valore){
                       
                         stand::create5($valore['id'], $valore['fiera'], $valore['citta']);
                        
                   
              }//fine foreach commesse
               
              
              //**********************************************************************************************/
              
               //**********REPLACE ID CLIENTE e CREAZIONE CLIENTE************************************************************************************/
   
              /*$valori = stand::get_all();
              //$clienti = clienti::get_all();
              foreach ($valori as $valore){
                       
                         stand::create6($valore['id'], $valore['cliente']);
                        
                   
              }//fine foreach commesse
               
              
              //**********************************************************************************************/
			   //**********AGGIORNAMENTO CLIENTI NUOVI DAI VECCHI************************************************************************************/
   
           /* $clientiOld = archivio::get_all();
            $clienti = clienti::get_all();
			$count=0;
            foreach ($clienti as $cliente){
				$nome_cliente= $cliente["nome"];
				$query= mysql_query("SELECT * FROM archivio where nome='$nome_cliente' limit 1");
				if (mysql_num_rows($query)!=0 ) {
				echo "cliente matchato ->";
				$clienteOld=mysql_fetch_assoc($query);
				$id =$cliente["id"];
				unset($clienteOld["id"]);
                var_dump($cliente);
				//foreach ($cliente as $clienteVariabile) { $clienteVariabile = addslashes($clienteVariabile);} 
				clienti::update($id, $clienteOld);
				echo $count;
				$count++;
				echo "<br>";
				echo "<br>";
				}
            }//fine foreach
				echo "<br>";
				echo "<br>";
				echo $count;
              
              //**********************************************************************************************/
			   //**********AGGIORNAMENTO CLIENTI NUOVI DAI VECCHI Singolare************************************************************************************/
   
           
            
            
				/*$query= mysql_query("SELECT * FROM archivio where id='237' limit 1");
				$clienteOld=mysql_fetch_assoc($query);
				unset($clienteOld["id"]);
				unset($clienteOld["nome"]);
                var_dump($clienteOld);
				foreach ($clienteOld as $key => $input_arr) {$clienteOld[$key] = addslashes($input_arr);} 		
				clienti::update(45, $clienteOld);
				
              
              //**********************************************************************************************/
			  //**********TOGLI PRIME 2 Cifre dall'anno************************************************************************************/
   
				/*$variabile2="home/commerciale/Preventivi/Preventivi_2016";
				$variabile2="../home/commerciale/Preventivi/Preventivi_2016";
				var_dump ($variabile1=scandir ($variabile2));
				$counter=0;
				for ($i=0;$i<count($variabile1);$i++){
					
					echo $variabile1[$i];
					echo "<br>";
					if (substr($variabile1[$i], 0, 2)=="16")
					{ 
					$nuova=substr($variabile1[$i], 2, strlen($variabile1[$i]));
					rename($variabile2."/".$variabile1[$i], $variabile2."/".$nuova);
					echo $nuova[$i];
					echo "<br>";
					//$variabile1[$counter]=substr($superfigo, 0, 2);
					}
				}
				
				/*foreach ($variabile1 as $superfigo){
					if (substr($superfigo, 0, 2)=="16")
					{ 
					echo "aaa";
					$variabile1[$counter]=substr($superfigo, 0, 2);
					}
					$counter++;
				}
            
				
              
              //**********************************************************************************************/
             //**********IMporta clienti non in array************************************************************************************/
            /* $rootdir =   $_SESSION['BASEPATH'];
             $stands = stand::get_all();
             foreach ($stands as $stand) {
                var_dump($stand) ; 
                echo "<br>";  
                
                     
             $anno = $Stand['anno'];
             $sban = substr($anno, -2, 2);
               
             $CommDir="$rootdir/home/tecnico/Commesse/Commesse_$anno";
          
             $CommAnnoDir="$CommDir/".$sban.$Stand['id_commessa']."_".$Stand['nome_stand'];
             $OffDir="$rootdir/home/commerciale/Offerte/Offerte_$anno";
             $PreDir="$rootdir/home/commerciale/Preventivi/Preventivi_$anno";
             $GraDir="$CommAnnoDir/Grafica";
             $DocDir="$CommAnnoDir/Documenti";
             $MatDir="$CommAnnoDir/Materiale da cliente";
             $OrdDir="$CommAnnoDir/Ordini e preventivi";
             $peDir="$CommAnnoDir/PP";
             $ppDir="$CommAnnoDir/PE";  
             if (is_dir($CommDir)) { $message="directory esiste";} else { Mkdir($CommDir,0777); }
             if (is_dir($CommAnnoDir)) { $message="directory esiste";} else { Mkdir($CommAnnoDir,0777); }
             if (is_dir($OffDir)) { $message="directory esiste" ; } else { Mkdir($OffDir,0777); }
             if (is_dir($PreDir)) { $message="directory esiste" ; } else { Mkdir($PreDir,0777); }
             if (is_dir($DocDir)) { $message="directory esiste" ; } else { Mkdir($DocDir,0777); }
             if (is_dir($GraDir)) { $message="directory esiste" ; } else { Mkdir($GraDir,0777); }
             if (is_dir($MatDir)) { $message="directory esiste" ; } else { Mkdir($MatDir,0777); }
             if (is_dir($OrdDir)) { $message="directory esiste" ; } else { Mkdir($OrdDir,0777); }
             
             if (is_dir($peDir)) { $message="directory esiste" ; } else { Mkdir($peDir,0777); }
             if (is_dir($peDir)) { $message="directory esiste" ; } else { Mkdir($peDir."/Dettagli",0777); }
             if (is_dir($peDir)) { $message="directory esiste" ; } else { Mkdir($peDir."/PE pdf",0777); }            
             if (is_dir($peDir)) { $message="directory esiste" ; } else { Mkdir($peDir."/RENDER definitivi",0777); }
             
             
             if (is_dir($ppDir)) { $message="directory esiste" ; } else { Mkdir($ppDir,0777); }
               if (is_dir($ppDir)) { $message="directory esiste" ; } else { Mkdir($ppDir."/Render PP",0777); }
                    
              //rename("$PreDir/Modello.xls", "$PreDir/".$sban.$Stand['id_commessa']."_".$Stand['nome_stand'].".xls");
                $file = "$PreDir/Modello_Revisionato.xls";
                $newfile = "$PreDir/".$sban.$Stand['id_commessa']."_".$Stand['nome_stand'].".xls";

                if (!copy($file, $newfile)) {
                    echo "failed to copy";
                }
                 
                 
                 
             }
   
				/*$clientiOld=clienti::get_all_old();
				$array =  array(323, 237,236,704, 176,32, 252, 655, 48, 365, 317, 361, 244, 605, 239, 32, 647, 652, 437, 346, 710, 39, 667, 264, 439, 98, 232, 461, 590);
				//var_dump($array);
				foreach($clientiOld as $client){
				foreach ($client as $key => $input_arr) {$client[$key] = addslashes($input_arr);}
					if (!in_array($client["id"], $array)){
						echo $client["id"];
						echo "<br>";
						
						mysql_query ("INSERT INTO `clienti` (`id`, `nome`, tipologia, via, citta, provincia, cap, mail, nazione, attivita, tipologia2, telefono1, telefono2, regione, codicebo, piva, cod_fiscale, note, tipo_cliente)
										VALUES (NULL, '".$client["nome"]."','".$client["tipologia"]."', '".$client["via"]."', '".$client["citta"]."',
										'".$client["provincia"]."', '".$client["cap"]."', '".$client["mail"]."', '".$client["nazione"]."', '".$client["attivita"]."', '".$client["tipologia2"]."',
										'".$client["telefono1"]."', '".$client["telefono2"]."', '".$client["regione"]."', '".$client["codicebo"]."', '".$client["piva"]."', '".$client["cod_fiscale"]."', '".$client["note"]."', '".$client["tipo_cliente"]."')") or die(mysql_error());
										
						
					}
				}

				
$rootdir =   $_SESSION['BASEPATH'];
//$file_to_upload = "http://www.magnoliatv.it/cast/mcast/2016/01/26/Ruisi_Andrea_Pic.jpg" ;
$file_to_upload = "http://www.magnoliatv.it/cast/mcast/2016/01/27/108.JPG" ;

$header = get_headers($file_to_upload, 1);

print_r ($header)."\n" ;


$nome_file_src = basename($file_to_upload);

print " File to Upload = ".$file_to_upload."\n";
echo "<br>";
print "Basename = ".$nome_file_src."\n" ;
echo "<br>";
$content = file_get_contents($file_to_upload);
		file_put_contents($rootdir, $content);
//if ( $header['Content-Length'] > 0 && $header['Content-Type'] == 'image/jpeg' )
/*if ( $header['Content-Length'] > 0 && ( $header['Content-Type'] == 'text/html; charset=iso-8859-1' || $header['Content-Type'] == 'image/jpeg') )
	{

	$uploaded_file_name = $file_to_upload;


	$path_start_pos = 11;

	if ( substr($uploaded_file_name,strpos($uploaded_file_name,$nome_file_src)-$path_start_pos-1,1) != "/" )
		$path_start_pos = 8;

		$dst_dir = substr($uploaded_file_name,strpos($uploaded_file_name,$nome_file_src)-$path_start_pos,$path_start_pos);
                    //log_message('error', 'dst_dir: '.$dst_dir);
                    $path_file_src = substr($uploaded_file_name,strpos($uploaded_file_name,$nome_file_src)-$path_start_pos);
                    $path_file_dst = $path_file_src;
                    $nome_file_dst_tmp = substr($path_file_dst,$path_start_pos-1,-4);
                    $nome_file_dst = str_replace('.', '', $nome_file_dst_tmp);
                    $path_file_dst = str_replace($nome_file_dst_tmp, $nome_file_dst, $path_file_dst);
                    echo $nome_file_src.' - '.$dst_dir.' - '.$path_file_src." - ".$path_file_dst."\n";
					echo "<br>";
	

	}


copy($file_to_upload, $rootdir.$path_file_dst);*/

// phpinfo(INFO_MODULES);




echo file_get_contents('http://webservices.dotnethell.it/codicefiscale.asmx/CalcolaCodiceFiscale?Nome=Barbara&Cognome=Scaringella&ComuneNascita=SAN%20BASILE&DataNascita=05/06/1971&Sesso=F');











            
				
              
              //**********************************************************************************************/
            
             require_once ("../views/temp_commesse.php");   
    break; 
   
 }


 ?>
 
 