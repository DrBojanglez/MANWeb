<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../bootstrap.min.css" rel="stylesheet" >

<!-- This is to test committing changes to GitHub -->

    <title>Middle Aged Noobs!</title>
  </head>
  <body style="background-image: url('inc/man.jpg');background-repeat: no-repeat;background-color: black;background-position: top;background-size: 150%;opacity: 0.9;background-attachment: fixed;">
  <div class="container">




<div class="row">




<?php

	
	

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('max_execution_time', 300); //300 seconds = 5 minutes. In case if your CURL is slow and is loading too much (Can be IPv6 problem)

error_reporting(E_ALL);

define('OAUTH2_CLIENT_ID', 'sampleid');
define('OAUTH2_CLIENT_SECRET', 'samplesecret');

$authorizeURL = 'https://discord.com/api/oauth2/authorize';
$tokenURL = 'https://discord.com/api/oauth2/token';
$apiURLBase = 'https://discord.com/api/users/@me';
$revokeURL = 'https://discord.com/api/oauth2/token/revoke';

session_start();

if(get('action') == 'logout') {
    logout($revokeURL, array(
        'token' => session('access_token'),
        'token_type_hint' => 'access_token',
        'client_id' => OAUTH2_CLIENT_ID,
        'client_secret' => OAUTH2_CLIENT_SECRET,
      ));
    unset($_SESSION['access_token']);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}



// Start the login process by sending the user to Discord's authorization page
if(get('action') == 'login') {

  $params = array(
    'client_id' => OAUTH2_CLIENT_ID,
    'redirect_uri' => 'yoururl',
    'response_type' => 'code',
    'scope' => 'identify guilds'
  );

  // Redirect the user to Discord's authorization page
  header('Location: https://discord.com/api/oauth2/authorize' . '?' . http_build_query($params));
  die();
}


// When Discord redirects the user back here, there will be a "code" and "state" parameter in the query string
if(get('code')) {

  // Exchange the auth code for a token
  $token = apiRequest($tokenURL, array(
    "grant_type" => "authorization_code",
    'client_id' => OAUTH2_CLIENT_ID,
    'client_secret' => OAUTH2_CLIENT_SECRET,
    'redirect_uri' => 'http://man.dudeboobs.com',
    'code' => get('code')
  ));
  $logout_token = $token->access_token;
  $_SESSION['access_token'] = $token->access_token;


  header('Location: ' . $_SERVER['PHP_SELF']);

}


if(session('access_token')) {
  $user = apiRequest($apiURLBase);
	$_SESSION["did"] = $user->id; 
	$did = $_SESSION["did"];
	$_SESSION["ava"] = $user->avatar; 
	$ava = $_SESSION["ava"];
	echo '<span class="navbar-brand "><img class="rounded float-start" style="width: 2em;" src="http://cdn.discordapp.com/avatars/' . $did . '/' . $ava . '.png">&nbsp'; 
	echo $user->username;
	echo '<font style="font-size: 8px;">#' . $user->discriminator . '<div class="float-end " style="padding-top: 10px;"><center><a href="?action=logout"><button style="font-size: 8px;" type="button" class="btn btn-secondary">Log Out</button></a></center></font></div></span>';



	
	?>
</div> 


















 <div class="col-md-12 col-xs-12" style=";">
	<center>

	  </center>
	  <br>
		  <div class="row" style=" padding-top: 5px;">
  <div class="col-12" style="background-color:white; color: black;">
  <center><strong>1/12</strong><br> PLAYER POOL</center>
  </div>
  </div>
  <div class="row">
  <div class="col-md-4 col-xs-1">
	  	<ul style="padding-top:15px; font-size:17px;"class="list-group list-group-flush">
			<li class="list-group-item list-group-item-success" style="background-image: url('http://cdn.discordapp.com/avatars/<?php echo $did; ?>/<?php echo $ava; ?>.png');background-repeat: no-repeat;background-position: center;background-size: cover;">
<?php
	echo '<div class="col"><img class="rounded float-start" style="width: 1.2em;" src="http://cdn.discordapp.com/avatars/' . $did . '/' . $ava . '.png">&nbsp'; 
	echo $user->username;
	echo '<font style="font-size: 8px;">#' . $user->discriminator . '</font></div>';
 ?>
 </li>
			<li class="list-group-item "><center><a href="?action=join"><button style="font-size: 9pt;" class="btn btn-outline-success btn-sm">Fill a Spot!</button></a></center></li>
			</ul>
			</div>

		</div>
		  <div class="row" style="padding-bottom: 20px; padding-top: 20px;">
  <div class="col-12" style="background-color:white; color: black;">
  <center>BRACKET</center>
  </div>
  </div>
		<div class="row">
 <center>
  <div class="row" >
  
	<div class="col-4" id="bracket">
	
		<div class="row">
<h6>Open<br><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span></h6>
		</div>
		<div class="row">
			<h6>Open<br><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span></h6>

		</div>
		<div class="row">
			&nbsp
		</div>
				<div class="row">
			&nbsp
		</div>
		<div class="row">
			<h6>Open<br><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span></h6>

		</div>
		<div class="row">
			<h6>Open<br><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span></h6>

		</div>
		
		
	</div>
	

	
	<div class="col-4" id="winquarter" style="padding-top:22px;">
	
		<div class="row">
			&nbsp
		</div>
		<div class="row">
			&nbsp
		</div>
		<div class="row">
			<h6>Winners<br><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span></h6>

		</div>
		<div class="row">
			<h6>Winners<br><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span></h6>

		</div>
		
	</div>
	
	<div class="col-4" id="final" style="padding-top:25px;">
	
		<div class="row">
			&nbsp
		</div>
		<div class="row">
			&nbsp
		</div>
		<div class="row" style="padding-top: 15px">
			<h6>Finals<br><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span></h6>

		</div>
		<div class="row">
			&nbsp
		</div>
		
	</div>
	

  </div>
  


  
  <div class="row">
  
	<div class="col-4" id="bracket">
	
		<div class="row">
			&nbsp
		</div>
		<div class="row">
			&nbsp
		</div>
		<div class="row">
			&nbsp
		</div>
				<div class="row">
			&nbsp
		</div>
		<div class="row">
			&nbsp
		</div>
		<div class="row">
			&nbsp
		</div>
		
		
	</div>
	
	<div class="col-4" id="loser">
	
		<div class="row">
			&nbsp
		</div>
		<div class="row">
			&nbsp
		</div>
		<div class="row">
			<h6>Losers<br><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span></h6>

		</div>
		<div class="row">
			<h6>Losers<br><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span></h6>

		</div>
		
	</div>
	
	<div class="col-4" id="loserfinal">
	
		<div class="row">
			&nbsp
		</div>
		<div class="row">
			&nbsp
		</div>
		<div class="row" style="padding-top: 15px">
			<h6>Finals<br><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span><span class="badge bg-secondary">spot</span></h6>

		</div>
		<div class="row">
			&nbsp
		</div>
		
	</div>
	

  </div>
  </center>
  </div>
    </div>
    <div class="col" style="padding:10%;">
	<p><strong>How M.A.N. plays Rocket League:</strong><br>
	<ul class="list-group list-group-flush">
		<li class="list-group-item">Pick-Up Tournament (2s or 3s depending on player pool)</li>
		<li class="list-group-item">randomize player sign up list to chose captains from the top so many (ex. 8 player pool in 2v2 tournament first 4 in random list would be captains).</li>
		<li class="list-group-item">randomize captain list for pick up order from the player pool and bracket placement.</li>
		<li class="list-group-item">the captains that chose last during the pick up phase will pick match 1's mode(soccer, hockey or hoops). after first seed, match one will be chosen by coin flip</li>
		<li class="list-group-item">Best of 3 Double elim winner picks soccer hockey hoops mode during matches.</li>
	</ul>
</p>
<p>
	<strong>Whats up for grabs this week:</strong><br><center>to the champs:</br>Aluminum ps4/xbox one thumb stick</br> M.A.N. Editions</br>
	<img style="max-width:190px;" src="https://gyazo.com/b947aad5d8b4dff561354d2aae6d758c.png"></center>
</p>
<center>
	<div class="alert alert-dark">
		pick up phase starts September 12, 2021 - 8:00am EST:
      <p style="font-size:3em" id="demo"></p>
	  <button class="btn btn-warning" style="font-size:1.45em;">sign up now!</button>
</div>
</center>

    </div>
  </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
<script>
// Set the date we're counting down to
var countDownDate = new Date("Sept 12, 2021 8:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>























	<?php
    print_r($user->id);
	;
	



} else {
  echo '<h3>Not logged in</h3>';
  echo '<p><a href="?action=login">Log In</a></p>';
}

if(get('action') == 'join') {
	
    include_once 'inc/dbh_inc.php';
	$sql = "INSERT INTO id (discid, avatar, username) VALUES ('$user->id', '$user->avatar', '$user->username');";
	mysqli_query($conn, $sql);
    die();
} 

if(get('action') == 'logout') {
  // This should logout you
  logout($revokeURL, array(
    'token' => session('access_token'),
    'token_type_hint' => 'access_token',
    'client_id' => OAUTH2_CLIENT_ID,
    'client_secret' => OAUTH2_CLIENT_SECRET,
  ));
  unset($_SESSION['access_token']);
  header('Location: ' . $_SERVER['PHP_SELF']);
  die();
}

function apiRequest($url, $post=FALSE, $headers=array()) {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

  $response = curl_exec($ch);


  if($post)
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

  $headers[] = 'Accept: application/json';

  if(session('access_token'))
    $headers[] = 'Authorization: Bearer ' . session('access_token');

  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $response = curl_exec($ch);
  return json_decode($response);
}

function logout($url, $data=array()) {
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
        CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded'),
        CURLOPT_POSTFIELDS => http_build_query($data),
    ));
    $response = curl_exec($ch);
    return json_decode($response);
	
}

function get($key, $default=NULL) {
  return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}

function session($key, $default=NULL) {
  return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}

?>


</div>


</body>
</html>
