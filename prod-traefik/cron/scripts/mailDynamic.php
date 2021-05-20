<?

		/*if (isset ($_POST["name"]))
		{
            
            $nome            = @$_REQUEST['name'];
            $email            = @$_REQUEST['email'];       
            $oggetto            = @$_REQUEST['subject'];
            $message           = @$_REQUEST['message'];*/
     
			$mail             = new PHPMailer();
			
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
			$mail->Subject    =  $subject;
			$mail->MsgHTML($htmlMail);
			
			//impostazione indirizzi condivisa
			// require_once("mailAdresses.php");
			// $address = "pcremascoliweb@gmail.com";
			$mail->AddAddress($address);
			
			if(!$mail->Send()) {
			  //qua ci va una variabile per gestire l'errore in pagina e non degli echo che finiscono in cima fuori template
			   $risultato =  "Mailer Error: " . $mail->ErrorInfo;
			} else {
			  $risultato =  "Message sent!";
			}
		
?>