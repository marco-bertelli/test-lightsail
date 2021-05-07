<?php

class eventi
{
   
    static function get_all()
    {
        
        $qs= mysql_query("SELECT * FROM eventi");

       $eventi=array();
        while ($row = mysql_fetch_array($qs))
            array_push($eventi,$row);
            return $eventi;
    }
    
    static function get($id)
    {
        
        $qs= mysql_query("SELECT * FROM eventi where id='$id' limit 1");

        return mysql_fetch_array($qs);
    }
    
    //prendo il cliente per assegnarlo all 'evento 
    
       static function pick_cliente($id)
    {
        $qs= mysql_query("SELECT id , nome  FROM clienti WHERE pr LIKE '%$id%' order by id DESC");

       $items=array();
        while ($row = mysql_fetch_assoc($qs))
            array_push($items,$row);
            return $items;
    }
    
   // static function update ($id, $title, $start, $end, $color, $textColor)
    static function update ($id, $array)
    {
        $stringa="UPDATE eventi SET";
        foreach ($array as $key=>$value){
            $stringa=$stringa." ".$key."='".$value."',";
        }
        $stringa= trim ($stringa, ",");
        $stringa=$stringa." where id='$id' limit 1";
        //var_dump($stringa);
        mysql_query ($stringa) or die ("Error in query: ".mysql_error());
		//mysql_query ("UPDATE eventi SET title='$title', start='$start', end='$end',  color='$color', textColor='$textColor' where id='$id' LIMIT 1")or die(mysql_error()); 
    }
    
    static function create_from_storico ($title, $note, $azione, $inizio,$id_storico){
		
    $query ="INSERT INTO `eventi` (`id`, `title`, `note`, `start`, `end`, `color`, `backgroundColor`, `borderColor`, `textColor`, azione, id_storico )
            VALUES (NULL, '$title','$note','$inizio','$inizio','green','','','','$azione','$id_storico')";
			
	mysql_query ($query)
			or die(mysql_error()); 
		
		$id_evento= mysql_insert_id();
		echo $id_evento."-> id evento da mettere in storico";
		 mysql_query ("UPDATE storico SET id_evento='$id_evento' WHERE id='$id_storico' LIMIT 1")or die (mysql_error());
	
	}
        
     static function get_all_pr()
    {
        
        $qs= mysql_query("SELECT * FROM utenti");

       $utenti=array();
        while ($row = mysql_fetch_array($qs))
            array_push($utenti,$row);
            return $utenti;
    }
    static function create ($title, $inizio, $fine, $note, $cliente, $pr, $color, $pr_name)
    {
        $query ="INSERT INTO `eventi` (`id`, `title`, `note`, `start`, `end` , id_cliente , id_pr , color, pr_name )
            VALUES (NULL, '$title','$note','$inizio','$fine' , '$cliente' , '$pr', '$color', '$pr_name')";
		mysql_query ($query)
            or die(mysql_error());
	echo "Nuovo elemento aggiunto al calendario<br>";
        return mysql_insert_id();
            
    }
	
    static function delete ($id)
	{
        mysql_query ("DELETE FROM eventi WHERE id = '$id' LIMIT 1");
        /*$location=$_SERVER['DOCUMENT_ROOT']."/teys/news/".$id;
        var_dump ($location);
        rmdir($location);*/
    }
	//METODI TODO
	static function createTodo ($title, $id_evento)
    {
        $query ="INSERT INTO `todo` (`id`, `titolo`, done ,`id_evento` )
            VALUES (NULL, '$title',0,'$id_evento')";
		//echo $query;
		mysql_query ($query)or die(mysql_error());
		$id=mysql_insert_id();
		$todo=eventi::getTodo($id);
        return $todo;
            
    }
	static function deleteTodo ($id)
	{
        mysql_query ("DELETE FROM todo WHERE id = '$id' LIMIT 1");
        /*$location=$_SERVER['DOCUMENT_ROOT']."/teys/news/".$id;
        var_dump ($location);
        rmdir($location);*/
    }
	static function getTodo($id)
    {
        
        $qs= mysql_query("SELECT * FROM todo where id='$id' limit 1");

        return mysql_fetch_array($qs);
    }
	
}    