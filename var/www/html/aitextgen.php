<?php
if($_SERVER['REQUEST_METHOD']=="POST"){

if(isset($_POST['temp'])){$temp1 = "-temperature ".($_POST['temp']*0.1);}else{$temp1="";};
	
	set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
	include('Net/SSH2.php');
	$ssh = new Net_SSH2(' YOUR SERVER HERE');
	if (!$ssh->login('root', ' YOUR PASSWORD HERE')) {
    	exit('Login Failed');
	}
	$ssh->read('root@localhost:-#');
	$ssh->setTimeout(5);
	$ssh = new Net_SSH2('YOUR SERVER HERE');
	if (!$ssh->login('root', 'YOUR PASSWORD HERE')) {
    	exit('Login Failed');
	}
	$ssh->exec('aitextgen generate --prompt "'.$_POST["userinput"].'" '.$temp1.' test.txt -n 1');
	$ssh = new Net_SSH2('YOUR SERVER HERE');
	if (!$ssh->login('root', 'YOUR PASSWORD HERE')) {
    	exit('Login Failed');
	}
	$ssh->read('root@localhost:-#');
echo "text has successfully been created! now click LoadCreatedTexts to see result here. thanks";
}
?>


<style>
	button{border:4px inset black; background-color:#222;color:#0FF}
	input{border:4px inset black; background-color:#222;color:#0FF}
	a{color:#0FF}
</style>

<body style="background-color:#555;color:#0F0;"><center>

<script>
function loadtxt(){document.getElementById("1").src = "readtext.php";}
function removetxt(){document.getElementById("1").src = "remove.php";}
</script>

	<h2>aitextgen oracle</h2>
custom deployment by <a href="https://cybergrunge.net">cybergrunge.net</a><br>
code by <a href="https://github.com/minimaxir/aitextgen">minimaxir</a><br>
<br>

<form method="post" action="aitextgen.php">  	
  Input: <input type="text" name="userinput" value="">	
  <br>
Temperature: <input type="range" min="1" max="25" value="8" name="temp">
<br>
  <input type="submit" name="submit" value="Create Texts">  
</form>

<button onclick="removetxt()">destroy texts</button> 
<button onclick="loadtxt()">Load created text #1</button><br><br>
<iframe id="1" src="" style="background-color:#ccc"></iframe>

<br><br>
	</center>
<div style="color:black;position:absolute;left:0px;width:300px;top:0px;"><font size=2>
Very slow implementation with php. its VERY slow.<br><br>
if other people are using it at the same time as you, you might get interference from their queries. we will consider this a feature.<br><br>
	<u>"create Texts"</u> - creates a text file on my server of ai generated text.<br><br>
	<u>"Load Created Texts"</u> - loads 1st text  found if it exists already.<br><br>
	<u>"destroy Texts"</u> - destroys all existing texts. you have to do this if there is an existing text, cause LoadCreatedTexts will always jsut return the first txt file there is.<br><br>
