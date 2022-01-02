<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
include('Net/SSH2.php');
$ssh = new Net_SSH2(' your server here ');
if (!$ssh->login('root', ' your passowrd here ')) {
    exit('Login Failed');
}


echo $ssh->read('root@localhost:-#');
$ssh->setTimeout(5);
$ssh = new Net_SSH2('your server here ');
if (!$ssh->login('root', ' your passowrd here ')) {
    exit('Login Failed');
}
echo $ssh->exec('aitextgen generate --prompt "'.$_POST["userinput"].'" test.txt -n 1');

$ssh = new Net_SSH2('your server here ');
if (!$ssh->login('root', ' your passowrd here ')) {
    exit('Login Failed');
}
echo $ssh->read('root@localhost:-#');
?>
