# SetupUno 
## Arduino SetupUno website (OnePage and Form to subscribe to the event with database including mailing).

### /config.ph File Scheme :
	<?php
		/* SMTP config */
	$hsmtp='your.smtp.host';
	$usmtp='contact@something.com';
	$psmtp='yourpassword';
	$posmtp=ThePort;
	$fsmtp='TheFrom';

		/* Subscribe Config */
	$dbname='mysql:host=host;dbname=dataBaseName';
	$user='databaseUserName';
	$pass='PasswordForDB';
 	
	?>




### Don't forget to replace in line 11 of /mail/mail.php :
	include('/global/path/to/config.php');
