<?
	$address4 = "pcremascoliweb@gmail.com";      //indirizzo a cui deve andare la mail
	$address5 = "massenzana.paolo@gmail.com";      //indirizzo a cui deve andare la mail
	$address6 = "mczulli@gmail.com";      //indirizzo a cui deve andare la mail
	// $address = "pcremascoliweb@gmail.com";      //indirizzo a cui deve andare la mail
	
	$address = "p.pasini@davittorio.com";      //indirizzo a cui deve andare la mail finale
	$address2 = "f.gritti@davittorio.com";
	$address3 = "v.teodori@davittorio.com";      //indirizzo a cui deve andare la mail finale
	$address7 = "eventi@davittorio.com";
	$address8 = "s.marocchi@davittorio.com";
	
	$mail->AddAddress($address);
	$mail->AddAddress($address2);
	$mail->AddAddress($address3);
	$mail->AddAddress($address7);
	$mail->AddAddress($address8);
	// $mail->AddAddress($address4);
	// $mail->AddAddress($address5);
	if ($inRange){
		$addressRange= "paolone43@hotmail.com";      //indirizzo a cui deve andare la mail finale
		$addressRange1= "f.indalizio@davittorio.com";      //indirizzo a cui deve andare la mail finale
		// $addressRange2= "produzione@davittorio.com";      //indirizzo a cui deve andare la mail finale
		// $mail->AddAddress($addressRange);
		$mail->AddAddress($addressRange1);
		// $mail->AddAddress($addressRange2);
	}
