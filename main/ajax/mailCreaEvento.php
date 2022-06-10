<?
require_once('../phpmailer/class.phpmailer.php');
		include("../phpmailer/class.smtp.php");			// optional, gets called from within class.phpmailer.php if not already loaded
	//Chek range data per amministratori in aggiunta
	$inRange=false;
	$today = new DateTime('now');
	$twoMonthsNow= date_add($today, date_interval_create_from_date_string('60 days'));
	$today = new DateTime('now');

	// $checkStart = DateTime::createFromFormat('Y-m-d H:i:s', $evento["start"]);
	// $checkStart=$checkStart->format('c');
	// $checkEnd = DateTime::createFromFormat('Y-m-d H:i:s', $item["end"]);
	// $checkEnd=$checkEnd->format('c');
	var_dump ($date1, $today);
	var_dump($date1 >= $today && $date1 < $twoMonthsNow);
	if ($date1 > $today && $date1 < $twoMonthsNow) {
		$inRange = true;
	}
		/*if (isset ($_POST["name"]))
		{
            
            $nome            = @$_REQUEST['name'];
            $email            = @$_REQUEST['email'];       
            $oggetto            = @$_REQUEST['subject'];
            $message           = @$_REQUEST['message'];*/
     
			$mail             = new PHPMailer();
			
			//VOLENDO CON UN REQUIRE QUA BISOGNA METtERE L'HTML DELLA MAIL CON POST
			$body=  <<<EOT


<h4>{$message}</h4>


   
EOT;
			//$body             = file_get_contents('contents.html');
			//$body             = eregi_replace("[\]",'',$body);
            //GMAIL CONFIGURAZIONE PER PHP MAILER
            
            //ARUBA CONFIGURAZIONE 
            $mail->SMTPAuth   = true;                  // Abilitiamo l'autenticazione SMTP              
            $mail->IsSMTP(); // telling the class to use SMTP                    
            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->IsHTML(true);          
			
            //$mail->Host = "smtps.aruba.it";
			$mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587 or 465 or 25
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Username   = "system.vittorio@gmail.com"; // SMTP account username
			$mail->Password   = "laziojiboizqukau";        // SMTP account password

			$mail->SetFrom("Amministrazione", "Amministrazione");
			$mail->AddReplyTo("noreply", "noreply");
			$mail->Subject    = $_SESSION["username"]." crea l'evento: ".$title;
			//$mail->SetFrom($email, $nome);
			//$mail->AddReplyTo($email, $nome);
			//$mail->Subject    = $oggetto;
			$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test			
			$mail->MsgHTML("Data: ".$inizioMail." - " .$fineMail);
		
			//impostazione indirizzi condivisa
			require_once("mailAdresses.php");
			
			if(!$mail->Send()) {
			  //qua ci va una variabile per gestire l'errore in pagina e non degli echo che finiscono in cima fuori template
			   $risultato =  "Mailer Error: " . $mail->ErrorInfo;
			} else {
			  $risultato =  "Message sent!";
			}
		
?>