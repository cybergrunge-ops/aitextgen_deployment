<style> button{border:4px inset black; background-color:#222;color:#0FF} input{border:4px inset black; background-color:#222;color:#0FF} a{color:#0FF} </style>

<body style="background-color:#555;color:#0F0;font-family:mono"><center>
<h2>aitextgen oracle</h2>
custom deployment by <a href="https://cybergrunge.net">cybergrunge.net</a><br>
code by <a href="https://github.com/minimaxir/aitextgen">minimaxir</a><br><br>

<form method="post" action="aitextgen.php">  	
  Input: <input type="text" name="userinput" value="" style="width:400px">	
  <br>
Temperature: <input type="range" min="1" max="45" value="7" name="temp"><br>
Top_k: <input type="range" min="1" max="145" value="40" name="topk">
<br>
  <input type="submit" name="submit" value="Create Texts">  
</form>
83d2338.online-server.cloud
<div style="padding:5px;width:600px; height:300px;background-color:#aaa;color:black;overflow-y:scroll">

<?php

if($_SERVER['REQUEST_METHOD']=="POST"){

$topkv = str_replace(['"', "'", ".", ".", "`", "\\", "/". ";", ":", "(", ")"], '', $_POST["topk"]);
$tempv = strip_tags( $_POST['temp'] * 0.1);
$userinput = str_replace(['"', "'", ".", ".", "`", "\\", "/". ";", ":", "(", ")"], '', $_POST["userinput"]);

$connection = ssh2_connect('YOUR SERVER', 22); ssh2_auth_password($connection, 'username', 'password');
$stream = ssh2_exec($connection, "cd /var/www/html \n aitextgen generate --prompt '" . $userinput . "' --to_file False --temperature " . $tempv . " --top_k ". $topkv ." \n");
stream_set_blocking($stream, true); 
echo str_replace(['[1m','[0m'],'', stream_get_contents($stream));

fclose($stream); 
} 

?>
</div>

<br><br>
	</center>
<div style="color:black;position:absolute;left:0px;width:300px;top:0px;"><font size=2>
