 <?php

class utenti
{
    
    static function get_all()
    {
        
        $qs= mysql_query("SELECT * FROM utenti ");

       $items_utenti=array();
        while ($row = mysql_fetch_array($qs))
            array_push($items_utenti,$row);
            return $items_utenti;
    }   
    static function get($id)
    {       
        $qs= mysql_query("SELECT * FROM utenti where id='$id' limit 1");

        return mysql_fetch_array($qs);
    }
    
    static function update ($id, $array)
    {
        echo "puppa2";
        $stringa="UPDATE utenti SET";
        foreach ($array as $key=>$value){
            $stringa=$stringa." ".$key."='".$value."',";
        }
        $stringa= trim ($stringa, ",");
        $stringa=$stringa." where id='$id' limit 1";
        mysql_query ($stringa) or die ("Error in query: ".mysql_error());
    }
                              
    static function create ($id_fiera ,$nome_utenti,  $tipo, $id_cliente)
    {
    
            mysql_query ("INSERT INTO `utenti` (`id`, `id_fiera`,`nome_utenti`,`tipo`, `id_cliente`)
            VALUES (NULL, '$id_fiera','$nome_utenti','$tipo','$id_cliente')") or die(mysql_error());
            $id=mysql_insert_id();
        $new=utenti::get($id);
        return $id;
    }
    static function delete ($id)
    {
        mysql_query ("DELETE FROM utenti WHERE id = '$id' LIMIT 1");
       
    }
    
}    

