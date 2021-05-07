 <?php 
 class Controller 
{
  function __construct()
  {
  }
    function index()
    {
    //var_dump (RELATPATH);
    //echo getcwd() . "\n";
    //echo $_SERVER["DOCUMENT_ROOT"];
    //DB/ 
    require_once ("dbconnect.php");
session_start();       
      // var_dump(BASEPATH);
	//var_dump ($_SESSION);
	setlocale(LC_ALL, 'it_IT.UTF8');
    //USERS
	require_once('model/users.php');
	$user = new Users();
		
		

	
	//LOGOUT
	if( isset( $_SESSION['logged'] ) and $_SESSION['logged'] == true and  isset( $_GET['logout'] ) )
    {
      $user->logout();
    }
	//LOGIN
	if( isset( $_POST['username'] ) )
    {
      $user->login( $_POST['username'], $_POST['password'] );
      $_SESSION['BASEPATH'] = BASEPATH;
      if( !$user->logged() )
      {
        echo  'Username o password sbagliati';
      }
    }
      

	if ( !$user->logged()) {
    
    require_once("views/head.php");
	require_once ("views/user.php");
	
	}
	else {
		
		require_once("views/head.php");
		
		require_once("model/eventi.php");
		$eventi = eventi::get_all();
        $file="js_sw/calendar/test.json";
        file_put_contents($file, json_encode ($eventi)) or die ("jsonecondebroken");
		require_once("views/headerc.php");
			
	
		echo "<script type='text/javascript'>localStorage.setItem('active_user', '".$_SESSION["user"]."' );
		localStorage.setItem('user_id', '".$_SESSION["id_utente"]."' );
		localStorage.setItem('role', '".$_SESSION["role"]."' );
		localStorage.setItem('username', '".$_SESSION["username"]."' );
		localStorage.setItem('BASEPATH', '".BASEPATH."' );
		</script>";
		require_once("controller/Mobile_Detect.php");
		//$detect = new Mobile_Detect;
		// if ( $detect->isMobile() ) {
		// 	echo "<script>localStorage.readonly= 'readonly'; console.log('readonly', localStorage.readonly);</script>";
		// }
		// else {
		// 	echo "<script>localStorage.readonly= ''; console.log('readonly', localStorage.readonly);</script>";
		// }
		//require_once("views/".$page.".php");      
		//require_once("views/footer.php");	
			
			
	}


    }
    
}
