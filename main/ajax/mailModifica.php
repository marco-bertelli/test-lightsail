<? if (!$mailSent){
	echo "carico i file che mancano";
require_once('../phpmailer/class.phpmailer.php');
		include("../phpmailer/class.smtp.php");			// optional, gets called from within class.phpmailer.php if not already loaded
}
	$inRange=false;
	$today = new DateTime('now');
	$twoMonthsNow= date_add($today, date_interval_create_from_date_string('60 days'));
	$today = new DateTime('now');
	// $formatStart = $today->format('Y-m-d');
	// $formatEnd = $twoWeeksNow->format('Y-m-d');
	
	// var_dump ($item);
	$checkStart = DateTime::createFromFormat('Y-m-d H:i:s', $item["start"]);
	// $checkStart=$checkStart->format('c');
	// $checkEnd = DateTime::createFromFormat('Y-m-d H:i:s', $item["end"]);
	// $checkEnd=$checkEnd->format('c');
	var_dump ($checkStart, $today);
	var_dump($date1 > $today && $date1 < $twoMonthsNow);
	if ($checkStart > $today && $checkStart < $twoMonthsNow) {
		$inRange = true;
	}
	if ( $oldItem["start"] == $item["start"] && $oldItem["end"]==$item["end"] && $oldItem["partecipanti"]==$item["partecipanti"] && $oldItem["tipo"]==$item["tipo"] ) $inRange = false;
	
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
			$mail->Password   = "0402marco";        // SMTP account password

			$mail->SetFrom("Amministrazione", "Amministrazione");
			$mail->AddReplyTo("noreply", "noreply");
			$mail->Subject    =  $_SESSION["username"]." modifica l'evento ".$item["title"];
			//$mail->SetFrom($email, $nome);
			//$mail->AddReplyTo($email, $nome);
			//$mail->Subject    = $oggetto;
			$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test			
			$mail->MsgHTML(
			"<b>Evento prima delle modifiche</b><br>Tipo Evento: ".$oldItem["tipo"].
			"<br>Data: ".$oldItem["start"]." - " .$oldItem["end"].
			"<br> Location : ".$oldItem["location"].
			"<br> Partecipanti : ".$oldItem["partecipanti"].
			"<br><br><b>Evento dopo le modifiche</b><br>Tipo Evento: ".$item["tipo"].
			"<br>Data: ".$item["start"]." - " .$item["end"].
			"<br> Location : ".$item["location"].
			"<br> Partecipanti : ".$item["partecipanti"].
			"<br><br>Sono stati modificati i seguenti campi : <b>$campiModificati</b>");
			
			//impostazione indirizzi condivisa
			require_once("mailAdresses.php");
			
			if(!$mail->Send()) {
			  //qua ci va una variabile per gestire l'errore in pagina e non degli echo che finiscono in cima fuori template
			   $risultato =  "Mailer Error: " . $mail->ErrorInfo;
			} else {
			  $risultato =  "Message sent!";
			}
		
?>