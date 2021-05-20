<?php 
$connessione = mysql_connect("ls-6e366fc5e7cc04c2a48abd523d501bf42ac193ae.crgngrnjz2fw.eu-central-1.rds.amazonaws.com", "dbmasteruser", "`0rozYOe`g=-y.P)%3(E[?UFZzGo.I>>")
				or die("Connessione non riuscita: " . mysql_error);
				mysql_select_db('fourthree09',$connessione)
				or die('Connessione del database non riuscita');
				
			$today = new DateTime('now');
			// var_dump ($today);
			// echo "<br>";
			$twoWeeksNow= date_add($today, date_interval_create_from_date_string('14 days'));
			// var_dump ($twoWeeksNow);
			// echo "<br>";
			$today = new DateTime('now');
			$formatStart = $today->format('Y-m-d');
			$formatEnd = $twoWeeksNow->format('Y-m-d');
			// var_dump ($result);
			
			
			// echo "SELECT * FROM eventi WHERE DATE( start) <=  '$formatEnd' AND DATE( start) >=  '$formatStart' and (confermato = '0' OR confermato='')";
			// SELECT * FROM eventi WHERE  DATE( start) <=  '2017-05-12' AND DATE( start) >=  '2017-04-26' and (confermato = '0' OR confermato='')
			// $qs= mysql_query("SELECT * FROM eventi WHERE DATE( start ) = '$result' AND confermato = '0'");
			$qs= mysql_query("SELECT * FROM eventi WHERE DATE( start) <=  '$formatEnd' AND DATE( start) >=  '$formatStart' and (confermato = '0' OR confermato='') ORDER BY start ASC");

			$items=array();
			while ($row = mysql_fetch_array($qs))
				array_push($items,$row);
			$messaggio='<b>Eventi non ancora confermati in scadenza (Evento entro due settimane)<br> ordine cronologico</b><br>';
			foreach ($items as $item){
				// var_dump ($item);
				$messaggio .= "<br><br>EVENTO: <b>".$item["title"].
				"</b><br>Tipo Evento: ".$item["tipo"].
				"<br>Data: ".$item["start"]." - " .$item["end"].
				"<br> Location : ".$item["location"].
				"<br> Partecipanti : ".$item["partecipanti"];
				
				//mail per pr
				if ($item["id_pr"]!="") {
					$qs= "SELECT * FROM utenti WHERE id='".$item["id_pr"]."' limit 1";
					$query= mysql_query($qs);
					$selected_user= mysql_fetch_array($query);
					
					if ($selected_user["mail"]!="") {
						$address=$selected_user["mail"];
						$subject="Evento ".$item["title"]." in scadenza";
						$htmlMail="Tipo Evento: ".$item["tipo"].
							"<br>Data: ".$item["start"]." - " .$item["end"].
							"<br> Location : ".$item["location"].
							"<br> Partecipanti : ".$item["partecipanti"];
							require('mailDynamic.php');
							
					} 
					else echo "utente non ha mail";
				}
				else echo "evento non ha pr";
				
			}
			echo $messaggio;
			
			
			$mail= new PHPMailer();
			
			//VOLENDO CON UN REQUIRE QUA BISOGNA METTERE L'HTML DELLA MAIL CON POST
			$body=  <<<EOT
<h4>{$message}</h4>
EOT;
			//$body             = file_get_contents('contents.html');
			//$body             = eregi_replace("[\]",'',$body);
            //GMAIL CONFIGURAZIONE PER PHP MAILER
            
            //ARUBA CONFIGURAZIONE 
            $mail->SMTPAuth   = true;                  // Abilitiamo l'autenticazione SMTP              
            $mail->IsSMTP(); // telling the class to use SMTP                    
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            $mail->IsHTML(true);          
			
            //$mail->Host = "smtps.aruba.it";
			$mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587 or 465 or 25
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Username   = "pwebanalysis@gmail.com"; // SMTP account username
			$mail->Password   = "4343pa43";        // SMTP account password
			$mail->SetFrom("Amministrazione", "Amministrazione");
			$mail->AddReplyTo("noreply", "noreply");
			$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test			

			//$mail->SetFrom($email, $nome);
			//$mail->AddReplyTo($email, $nome);
			//$mail->Subject    = $oggetto;
			$mail->Subject    =  "Avviso Automatico: Eventi in scadenza non ancora confermati";
			$mail->MsgHTML($messaggio);
			
			//impostazione indirizzi condivisa
			// require_once("mailAdresses.php");
			// $mail->AddAddress($address);
			// $address = "p.pasini@davittorio.com";      //indirizzo a cui deve andare la mail finale
			$address2 = "f.gritti@davittorio.com";
			$address3 = "v.teodori@davittorio.com";      //indirizzo a cui deve andare la mail finale
			$address4 = "pcremascoliweb@gmail.com";      //indirizzo a cui deve andare la mail
			$address5 = "massenzana.paolo@gmail.com";      //indirizzo a cui deve andare la mail
			$address6 = "eventi@davittorio.com";      //indirizzo a cui deve andare la mail finale
			// $address6 = "mczulli@gmail.com";      //indirizzo a cui deve andare la mail
			
			$mail->AddAddress($address);
			$mail->AddAddress($address2);
			$mail->AddAddress($address3);
			$mail->AddAddress($address4);
			$mail->AddAddress($address5);
			$mail->AddAddress($address6);
			// $mail->AddAddress($address6);
	
			if(!$mail->Send()) {
			  //qua ci va una variabile per gestire l'errore in pagina e non degli echo che finiscono in cima fuori template
			   $risultato =  "Mailer Error: " . $mail->ErrorInfo;
			} else {
			  $risultato =  "Message sent!";
			}
			
			$messaggio = "<b><i>VITTORIO</i></b><br><br>" . $messaggio;
?>