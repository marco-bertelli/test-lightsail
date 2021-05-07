 <?php

class clienti
{
	//importati da Vittorio
	static function get_byPr($id)
    {
		//echo "SELECT * FROM clienti WHERE pr LIKE '%$id%' order by id DESC";
		
		$qs=mysql_query("SELECT * FROM clienti WHERE pr LIKE '%$id%' order by id DESC");
		$items=array();
		while ($row = mysql_fetch_array($qs))
			array_push($items,$row);
            return $items;
    }
	static function get_CSV()
    {
		//echo "SELECT * FROM clienti WHERE pr LIKE '%$id%' order by id DESC";
		
		$qs=mysql_query("SELECT  `id` ,  `nome` ,  `tipologia` ,  `via` ,  `citta` ,  `provincia` ,  `cap` ,  `mail` ,  `pec` ,  `nazione` ,  `attivita` ,  `telefono1` ,  `telefono2` ,  `telefono3` ,  `piva` ,  `cod_fiscale` 
		FROM  `clienti` ");
		$items=array();
		while ($row = mysql_fetch_assoc($qs))
			array_push($items,$row);
            return $items;
    }
	static function check_create($CF, $PIVA)
    {
		if ( $CF == "" && $PIVA == "" ) return "";
		else if ($PIVA == "" ) $qs= mysql_query("SELECT * FROM clienti WHERE cod_fiscale='$CF' order by id DESC ");
		else if ($CF == "" ) $qs= mysql_query("SELECT * FROM clienti WHERE piva = '$PIVA' order by id DESC ");
		else $qs= mysql_query("SELECT * FROM clienti WHERE piva = '$PIVA' OR cod_fiscale='$CF' order by id DESC ");
		$items=array();
		while ($row = mysql_fetch_array($qs))
			array_push($items,$row);
            return $items;
    }
    static function associa ($id_pr, $id_cliente)
    {
       // echo "cliente id ->". $id_cliente."<br>";
        //echo "cliente pr ->". $id_pr."<br>";
		$cliente=clienti::get($id_cliente);
		if ($cliente["pr"]!=''){
			$arrayId= explode (",", $cliente["pr"]);
			if (!in_array($id_pr, $arrayId)){				
				$valore =$cliente["pr"].",".$id_pr;
				$stringa="UPDATE clienti SET pr='$valore' WHERE id='$id_cliente'";
			}
			else return;
		}
		else $stringa="UPDATE clienti SET pr='$id_pr' WHERE id='$id_cliente'";
		mysql_query ($stringa) or die ("Error in query: ".mysql_error());
	}
	static function unlinkPR ($id_pr, $id_cliente)
    {
       // echo "cliente id ->". $id_cliente."<br>";
        //echo "cliente pr ->". $id_pr."<br>";
		$cliente=clienti::get($id_cliente);
		$newPrlist=str_replace($id_pr, '', $cliente["pr"]);
		$newPrlist=str_replace(',,', ',', $newPrlist);
		$stringa="UPDATE clienti SET pr='$newPrlist' WHERE id='$id_cliente'";
		echo ($stringa);
		mysql_query ($stringa) or die ("Error in query: ".mysql_error());
	}
		/*if ($cliente["pr"]!=''){
			$valore =$cliente["pr"].",".$id_pr;
			$stringa="UPDATE clienti SET pr='$valore' WHERE id='$id_cliente'";
		}
		else*/
	//OLD
	static function get_all()
    {
        
        
		
		$qs= mysql_query("SELECT id, nome, tipologia, citta, provincia, via, inuse FROM clienti order by id DESC");

	   $items=array();
	   
		while ($row = mysql_fetch_array($qs))
			array_push($items,$row);
            return $items;
    }
	static function get_all_old()
    {
		
		$qs= mysql_query("SELECT * FROM archivio order by id DESC");

	   $items=array();
	   
		while ($row = mysql_fetch_array($qs))
			array_push($items,$row);
            return $items;
    }
	static function get_by_session($qstring, $qoffset)
    {
        
		$stringaperquery=$qstring." OFFSET ".$qoffset;
		//var_dump ($stringaperquery);
        $qs= mysql_query( $stringaperquery) or die(mysql_error());

	   $items=array();
	   while ($row = mysql_fetch_array($qs))
		array_push($items,$row);
            return $items;
    }
	
	static function get($id)
    {
        $utente=$_SESSION["user"];
		//var_dump ($_SESSION);
        $qs= mysql_query("SELECT * FROM clienti where id='$id' limit 1");
        mysql_query("UPDATE clienti SET last_user='$utente' where id='$id' limit 1") or die ("Error in query: ".mysql_error());
	    return mysql_fetch_array($qs);
    }
    
    static function get_ass($id)
    {
        $utente=$_SESSION["user"];
        //var_dump ($_SESSION);
        $qs= mysql_query("SELECT * FROM clienti where id='$id' limit 1");
       
        return mysql_fetch_assoc($qs);
    }
	
	static function update ($id, $array)
    {
        $stringa="UPDATE clienti SET";
        foreach ($array as $key=>$value){
            $stringa=$stringa." ".$key."='".$value."',";
        }
        $stringa= trim ($stringa, ",");
        $stringa=$stringa." where id='$id' limit 1";
		//var_dump($stringa);
        mysql_query ($stringa) or die ("Error in query: ".mysql_error());
    }
    
	static function reset ()
	{
		
		mysql_query ("update `clienti` SET inuse=0 WHERE 1")
			or die(mysql_error());
		echo "resetted";
		//$item=clienti::get($id);
		return $id;
			
	}
		
	static function create ($nome, $CF, $PIVA, $pr)
	{
		
		mysql_query ("INSERT INTO `clienti` (`id`, `nome`, `cod_fiscale`, piva, pr)
			VALUES (NULL, '$nome', '$CF', '$PIVA', '$pr')")
			or die(mysql_error());
		$id=mysql_insert_id();
		
		//$item=clienti::get($id);
		return $id;
			
	}
	static function delete ($id)
	{
		mysql_query ("DELETE FROM clienti WHERE id = '$id' LIMIT 1");
		/*$location=$_SERVER['DOCUMENT_ROOT']."/teys/news/".$id;
		var_dump ($location);
		rmdir($location);*/
	}
    
    static function get_target($id)
    {
        
        $qs= mysql_query("SELECT * FROM clienti where id='$id' limit 1");

        return mysql_fetch_array($qs);
    }
    
     static function set_target($id)
    {
        
        $qs= mysql_query("UPDATE clienti SET ");

        return mysql_fetch_array($qs);
    }
	static function pick_gruppo()
    {
        
        $qs= mysql_query("SELECT id , nome  FROM clienti  ");

       $items=array();
        while ($row = mysql_fetch_assoc($qs))
            array_push($items,$row);
            return $items;
    }
}	

