<?php
//$connessione = mysql_connect("localhost", "fourthree", "43431983")
       // or die("Connessione non riuscita: " . mysql_error);
   // mysql_select_db('fourthree01',$connessione)
       // or die('Connessione del database non riuscita');
        
        
        $connessione = mysql_connect("localhost", "fourthree", "43431983")
        or die("Connessione non riuscita: " . mysql_error);
    mysql_select_db('fourthree14',$connessione)
        or die('Connessione del database non riuscita');