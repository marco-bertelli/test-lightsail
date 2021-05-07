<?php

		require_once('model/ricerca.php');
        require_once('model/clienti.php');
        require_once('model/agenti.php');
        switch ($_GET["s"])
        {
            case "start":
             
               
                $page ="ricerca";
            
            break;
			case "clienti":
             if (isset ($_POST["stringa"])){
					
                $items = ricerca::cercaC($_POST["target"], $_POST["stringa"]);
                $items_agenti = agenti::get_all();
				}
            
            break;
			case "corsi_carrellistici":
             
                $items = ricerca::cercaOfferte($_POST["target"], $_POST["stringa"]);
                $page ="corsi_carrelistici_offerte";
            
            break;
            case "potenziali":
             
                $items = ricerca::cercaP($_POST["target"], $_POST["stringa"]);
                $items_agenti = agenti::get_all();
                $page ="potenziali2";
            
            break;
            case "agenti":
             
                $items = ricerca::cercaA($_POST["target"], $_POST["stringa"]);
                $items_agenti = agenti::get_all();
                
            $page="clienti";
            
            break; 
            case "cercaMultipla":
             
                $items = ricerca::cercaMultipla($_POST["target"], $_POST["target_secondary"], $_POST["stringa"]);
                $items_agenti = agenti::get_all();
                $page ="clienti";
            
            break;
			case "cercaMultipla2":
             
                $items = ricerca::cercaMultipla2($_POST["target"], $_POST["target2"], $_POST["stringa"],  $_POST["stringa2"]);
               // $items_agenti = agenti::get_all();
                $page ="clienti";
            
            break;       			
        }