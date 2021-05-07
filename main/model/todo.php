 <?php

class agenti
{
    
    
    
    static function get_all_codice()
    {
        
        $qs= mysql_query("SELECT  *  FROM agenti WHERE 1 ");

       $items_agenti=array();
        while ($row = mysql_fetch_array($qs))
            array_push($items_agenti,$row);
            return $items_agenti;
    }
     static function update_codice ($agente_id, $agente_codice )
    {
         
        mysql_query ("UPDATE agenti SET  interessi='$agente_codice'  where id='$agente_id' LIMIT 1")or die(mysql_error());;
    }
    
    
    
    
    static function get_all()
    {
        
        $qs= mysql_query("SELECT * FROM agenti ");

       $items_agenti=array();
        while ($row = mysql_fetch_array($qs))
            array_push($items_agenti,$row);
            return $items_agenti;
    }
	static function get_azienda($id)
    {
        
        $qs= mysql_query("SELECT * FROM agenti WHERE azienda='$id' ");

       $items_agenti=array();
        while ($row = mysql_fetch_array($qs))
            array_push($items_agenti,$row);
            return $items_agenti;
    }
    
    static function get($id)
    {
        
        $qs= mysql_query("SELECT * FROM agenti where id='$id' limit 1");

        return mysql_fetch_array($qs);
    }
    
   /* static function update ($agente_id, $agente_azienda, $agente_nome , $agente_cognome, $agente_settore,  $agente_telefono, $agente_mail, $agente_note)
    {
         
        mysql_query ("UPDATE agenti SET nome='$agente_nome', azienda='$agente_azienda',  cognome='$agente_cognome', settore='$agente_settore', note='$agente_note' , telefono='$agente_telefono', mail='$agente_mail'  where id='$agente_id' LIMIT 1");
    }*/
    static function update ($id, $array)
    {
        $stringa="UPDATE agenti SET";
        foreach ($array as $key=>$value){
            $stringa=$stringa." ".$key."='".$value."',";
        }
        $stringa= trim ($stringa, ",");
        $stringa=$stringa." where id='$id' limit 1";
        //var_dump($stringa);
        mysql_query ($stringa) or die ("Error in query: ".mysql_error());
    }
    static function update2 ($id, $array)
    {
        //mysql_query ("UPDATE clienti SET nome='$nome', tipologia='$tipologia', via='$via', citta='$citta', provincia='$provincia' , cap='$cap', nazione='$nazione', note='$note', piva='$piva', cod_fiscale='$cod_fiscale', ultimo_contatto='$ultimo_contatto', corso_carrellistico='$corso_carrellistico', tipo_cliente='$tipo_cliente',  mail='$mail', potenziale='$potenziale', fornitore='$fornitore', numero_carrelli='$numero_carrelli', esito_visita='$esito_visita' where id='$id' LIMIT 1")        or die(mysql_error()); 
        $stringa="UPDATE clienti SET";
        foreach ($array as $key=>$value){
            //var_dump($key); echo"-->"; var_dump($value); echo"<br>";
            $stringa=$stringa." ".$key."='".$value."',";
        }
        $stringa= trim ($stringa, ",");
        $stringa=$stringa." where id='$id' limit 1";
        //mysql_query ("UPDATE foto SET rullino='$rullino', numFoto='$numFoto', settore='$settore', soggetto='$soggetto', data='$data', vistoDa='$vistoDa' where id='$id' LIMIT 1");
        //var_dump($stringa);
        mysql_query ($stringa) or die ("Error in query: ".mysql_error());
    }
    
                               
    static function create ($id_azienda, $nome, $cognome, $mail)
    {
        
        mysql_query ("INSERT INTO `agenti` (`id`, `azienda`, `nome`, `cognome`, `mail`)
            VALUES (NULL, '$id_azienda','$nome','$cognome','$mail')")
            or die(mysql_error());
		$agenteid=mysql_insert_id();
		$sum=$id_azienda.$agenteid;
		//echo $sum;
		mysql_query ("UPDATE `agenti` set interessi=$sum WHERE id='$agenteid'") or die("Error in query: ".mysql_error());
		
		return $agenteid;
    }
	
    static function delete ($agente_id)
    {
        mysql_query ("DELETE FROM agenti WHERE id = '$agente_id' LIMIT 1");
        /*$location=$_SERVER['DOCUMENT_ROOT']."/teys/news/".$id;
        var_dump ($location);
        rmdir($location);*/
    }
     static function get_from_azienda($array)
    {
        
        $stringaperquery="SELECT * FROM agenti WHERE azienda in (";
        
        for ($i=0;$i<count($array);$i++){ $stringaperquery=$stringaperquery.$array[$i].",";}
        
        $stringaperquery= trim ($stringaperquery, ",");
        $stringaperquery=$stringaperquery.")";
        
        //var_dump($stringaperquery);
        
        $qs= mysql_query($stringaperquery);

         $items_agenti=array();
        while ($row = mysql_fetch_array($qs))
            array_push($items_agenti,$row);
            return $items_agenti;
    }
	 static function get_interessi($array)
    {
        
        $stringaperquery="SELECT * FROM interessi_agenti WHERE codice in (";
        
        for ($i=0;$i<count($array);$i++){ $stringaperquery=$stringaperquery.$array[$i].",";}
        
        $stringaperquery= trim ($stringaperquery, ",");
        $stringaperquery=$stringaperquery.")";
        
        //var_dump($stringaperquery);
        
        $qs= mysql_query($stringaperquery);

         $interessi_agenti=array();
        while ($row = mysql_fetch_array($qs))
            array_push($interessi_agenti,$row);
            return $interessi_agenti;
    }
}    

