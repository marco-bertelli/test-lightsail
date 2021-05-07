<?php
//$connessione = mysql_connect("localhost", "fourthree", "43431983")
       // or die("Connessione non riuscita: " . mysql_error);
   // mysql_select_db('fourthree01',$connessione)
       // or die('Connessione del database non riuscita');
        
        
        $connessione = mysql_connect("ls-6e366fc5e7cc04c2a48abd523d501bf42ac193ae.crgngrnjz2fw.eu-central-1.rds.amazonaws.com", "dbmasteruser", "`0rozYOe`g=-y.P)%3(E[?UFZzGo.I>>")
        or die("Connessione non riuscita: " . mysql_error);
        mysql_select_db('fourthree09',$connessione)
        or die('Connessione del database non riuscita');