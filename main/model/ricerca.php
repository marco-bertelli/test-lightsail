 <?php
class ricerca
{
	
	static function cercaC($target, $stringa)
    {
		$qs= mysql_query("SELECT * FROM clienti where LOWER($target) like LOWER('%$stringa%') ORDER BY LOWER($target) ASC")
		or die(mysql_error()); 
		$items=array();
		while ($row = mysql_fetch_array($qs))
			array_push($items,$row);
		
	    return $items;
    }
	static function cercaF($target, $stringa)
    {
		$qs= mysql_query("SELECT * FROM fiere where LOWER($target) like LOWER('%$stringa%') ORDER BY LOWER($target) ASC")
		or die(mysql_error()); 
		$items=array();
		while ($row = mysql_fetch_array($qs))
			array_push($items,$row);
		
	    return $items;
    }
	static function cercaM($target, $stringa)
    {
		$qs= mysql_query("SELECT * FROM montatori where LOWER($target) like LOWER('%$stringa%') ORDER BY LOWER($target) ASC")
		or die(mysql_error()); 
		$items=array();
		while ($row = mysql_fetch_array($qs))
			array_push($items,$row);
		
	    return $items;
    }
	static function cercaP($target, $stringa)
    {
		
		$qs= mysql_query("SELECT * FROM clienti where LOWER($target) like LOWER('%$stringa%') AND potenziale='si'")
		or die(mysql_error()); 
		$items=array();
		while ($row = mysql_fetch_array($qs))
			array_push($items,$row);
		
	    return $items;
    }
	static function cercaA($target, $stringa)
    {
		echo "".$target.$stringa;
		$qs= mysql_query("SELECT * FROM agenti RIGHT JOIN clienti on agenti.azienda=clienti.id where LOWER(agenti.$target) like LOWER('$stringa') GROUP BY clienti.id")
		or die(mysql_error()); 
		$items=array();
		while ($row = mysql_fetch_array($qs))
			array_push($items,$row);
		
	    return $items;
    }
	
	
}