<?php

class interessi_agenti
{
    static function get_all_codice()
    {
        
        $qs= mysql_query("SELECT  *  FROM interessi_agenti WHERE 1 ");

       $interessi_agenti=array();
        while ($row = mysql_fetch_array($qs))
            array_push($interessi_agenti,$row);
            return $interessi_agenti;
    }
     static function update_codice ($agente_id, $agente_codice )
    {
         
        mysql_query ("UPDATE interessi_agenti SET  codice='$agente_codice'  where id='$agente_id' LIMIT 1")or die(mysql_error());;
    } 
    
    
    static function get_from_agenti($array)
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
    static function get($id)
    {
        
        $qs= mysql_query("SELECT * FROM interessi_agenti where id='$id' limit 1");

        return mysql_fetch_array($qs);
    } 
    
     static function get_all_agente($interessi)
    {
        
        $qs= mysql_query("SELECT * FROM interessi_agenti where codice='$interessi' ");

         $interessi_agenti=array();
        while ($row = mysql_fetch_array($qs))
            array_push($interessi_agenti,$row);
            return $interessi_agenti;
    } 
    
     static function update ($codice, $sigla, $descrizione, $tipo)
    {
         
        mysql_query ("UPDATE interessi_agenti SET codice='$codice', sigla='$sigla',  descrizione='$descrizione', tipo='$tipo'  where codice='$codice' LIMIT 1");
    }
    
                               
    static function create ($codice, $sigla, $descrizione, $tipo)
    {
		$qs="INSERT INTO `interessi_agenti` (`id`, `codice`, `sigla`, `descrizione`, `tipo`)
            VALUES (NULL, '$codice','$sigla','$descrizione','$tipo')";
        mysql_query ($qs) or die(mysql_error());
        
        $new_id=mysql_insert_id();
        $nuovo_interesse = interessi_agenti::get($new_id);
        return $nuovo_interesse;
        //var_dump($qs);
    }
    static function delete ($id)
    {
        mysql_query ("DELETE FROM interessi_agenti WHERE id = '$id' LIMIT 1");
        /*$location=$_SERVER['DOCUMENT_ROOT']."/teys/news/".$id;
        var_dump ($location);
        rmdir($location);*/
    }
}    

