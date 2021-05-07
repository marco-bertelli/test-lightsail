<?php

class Users 
{
  var $username;

  function __construct()
  {
  }

  function logout()
  {
    $_SESSION['logged'] = false;
	$_SESSION['user'] = Null;
  }

  function logged()
  {
    return ( isset( $_SESSION['logged'] ) and $_SESSION['logged'] == true );
  }
  
  function login( $username, $password )
  {
	$qs= "SELECT * FROM utenti WHERE nome_utente='$username' limit 1";
	$query= mysql_query($qs);
	$selected_user= mysql_fetch_array($query);
	//var_dump ($selected_user);
	
	if( $selected_user["nome_utente"] == $username and $selected_user["password"] == $password )
      {
        $this->username = $_POST['username'];
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $this->username;
        $_SESSION['role'] = $selected_user["role"];
		$_SESSION['username'] = $selected_user["name"];
         $_SESSION['id_utente'] = $selected_user["id"];
		$timeqs="UPDATE utenti SET last_login=NOW() WHERE nome_utente='$username'";
		mysql_query($timeqs) or die ("Error in query: ".mysql_error());; 
		//echo "logged";
        return true;
      }
   /*foreach( $users as $user )
    {
      list( $name, $pass ) = explode( ":", $user );
 
      if( $name == $username and $pass == $password )
      {
        $this->username = $_POST['username'];
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $this;
        return true;
      }
    }*/

    return false;
  }
}


