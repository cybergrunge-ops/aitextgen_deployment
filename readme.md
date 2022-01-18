# aitextgen deployment

this is a simple way to deploy aitextgen to a server using php ssh2 execution

## requirements

VPS with apache, php and sudo

## how to use

* sudo install aitextgen on your server via ssh
* edit the php file to include your server name and login credentials
* just clone this repo to root dir on vps and then unpack it
* then visit ```http://foo.bar/aitextgen.php``` and viola.

## license

aitextgen is made by minimaxir i dont claim to have made it, he is the smart one.

this is just script kiddie crap - public domain.

note this is not a secure way to do things unless you have a firewall with whitelist. if you want security configure that yourself, i just use this on my own server to make a nicer interface than aitextgen's CLI because i dont know or want to learn python :)
