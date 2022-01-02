<?php


$connection = ssh2_connect(' your server here ', 22);
ssh2_auth_password($connection, 'root', ' your password here ');
$stream = ssh2_exec($connection, 'cat *.txt');
$errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);
echo "<font size=2>";
stream_set_blocking($errorStream, true);
stream_set_blocking($stream, true);
echo stream_get_contents($stream);
fclose($stream);
fclose($errorStream);

?>
