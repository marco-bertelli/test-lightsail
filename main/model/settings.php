 <?php

class settings
{
	static function get_items($cat='',$order_by='cat DESC')
    {
        $cat = mysql_real_escape_string($cat);
		
        if ($cat!='')
			$qs= mysql_query("SELECT * FROM clienti where cat='$cat' order by $order_by");
		else
			//$qs= mysql_query("SELECT * FROM gapmac order by $order_by");

		$items=array();
		while ($row = mysql_fetch_array($qs))
			array_push($items,$row);
		
	    return $items;
    }
	static function get_all()
    {
        
       $qs= mysql_query("SELECT * FROM settings order by id ASC");

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
	
	
	
	static function get($ref)
    {
        
        $qs= mysql_query("SELECT * FROM settings WHERE riferimento='$ref' limit 1");
		$tosplit=mysql_fetch_array($qs);
		
		$splitted=explode("," , $tosplit[2]);
        sort($splitted, SORT_NATURAL | SORT_FLAG_CASE);
	    return $splitted;
    }
	
	static function update ($id, $valori)
    {
        $stringa="UPDATE settings SET scelte='$valori' WHERE id='$id'";
       
        mysql_query ($stringa) or die ("Error in query: ".mysql_error());
    }
    
	
		
	static function create ($nome)
	{
		mysql_query ("INSERT INTO `clienti` (`id`, `nome`)
			VALUES (NULL, '$nome')")
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
}	

