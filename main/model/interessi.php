 <?php

class interessi
{
   
    
    static function get($id)
    {
        
        $qs= mysql_query("SELECT * FROM interessi where id='$id' limit 1");

        return mysql_fetch_array($qs);
    }
	static function get_ref($ref)
    {
        
        $qs= mysql_query("SELECT * FROM interessi WHERE riferimento='$ref' limit 1");

        return mysql_fetch_array($qs);
    }
    
    static function get_all()
    {
        
        

       $qs= mysql_query("SELECT * FROM interessi order by sigla_interesse asc");

       $items=array();
       
        while ($row = mysql_fetch_array($qs))
            array_push($items,$row);
            return $items;
    }
    
    static function update ($id, $array)
    {
       
        $stringa="UPDATE interessi SET";
        foreach ($array as $key=>$value){
            //var_dump($key); echo"-->"; var_dump($value); echo"<br>";
            $stringa=$stringa." ".$key."='".$value."',";
        }
        $stringa= trim ($stringa, ",");
        $stringa=$stringa." where id='$id' limit 1";
        //var_dump($stringa);
        mysql_query ($stringa) or die ("Error in query: ".mysql_error());
    }
    
    
        
    static function create ($sigla, $descrizione, $interesse)
    {
        mysql_query ("INSERT INTO `interessi` (`id`, `sigla_interesse`, `descrizione_interesse`, `tipo_interesse` )
            VALUES (NULL, '$sigla','$descrizione','$interesse')")
            or die(mysql_error());
			$id=mysql_insert_id();
			$new = interessi::get($id);
            return $new;
        
            
    }
    static function delete ($id)
    {
        mysql_query ("DELETE FROM interessi WHERE id = '$id' LIMIT 1");
        /*$location=$_SERVER['DOCUMENT_ROOT']."/teys/news/".$id;
        var_dump ($location);
        rmdir($location);*/
    }
}    

