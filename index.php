<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="refresh" content="3">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>--MONITORAMENTO--</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<center><img width=250 src=logo.png></center>
<?php

	$provedores = [
		"<img width=175 src=gdrive.png><br> GDRIVE <br>(Nuvem)" => "googledrive.com:443",
		"<img width=175 src=megaupload.png><br> MEGA <br>(Nuvem)" => "mega.io:443",
		"<img width=175 src=siteaerojet.png><br> AEROJET <br>(Site)" => "aerojet.com.br:443",	
		"<img width=175 src=siteaerojet.png><br> AEROJET MAIL <br>(SMTP)" => "177.70.110.120:587",
		"<img width=175 src=siteaerojet.png><br> AEROJET MAIL <br>(IMAP)" => "177.70.110.119:143",		
	];

?>
<?php

	$servidores = [
		"<img width=175 src=mv.png><br> SERVIDOR AD <br>(Remoto)" => "192.168.0.16:3389",
		"<img width=175 src=mv.png><br> SERVIDOR BD <br>(Remoto)" => "192.168.0.21:3389",
		"<img width=175 src=mv.png><br> SERVIDOR BD <br>(Conectividade)" => "192.168.0.21:3306",
		"<img width=175 src=mv.png><br> PC-SUPORTE <br>(Remoto)" => "192.168.0.19:3389",
		"<img width=175 src=servidor-dell-r210.png><br> SERVIDOR BKP-1 <br>(Maquina)" => "192.168.0.200:80",
		"<img width=175 src=servidor-ibm.png><br> SERVIDOR BKP-2 <br>(Maquina)" => "192.168.0.199:80",
		"<img width=175 src=sat.png><br> S@T <br>(Conectividade)" => "192.168.0.44:1883",
	];

?>
<?php

	$impressoras = [
		"<img width=175 src=impressoras/Impressora-Brother.png><br> LOJA <br>(IMP-02)" => "192.168.0.240",
		"<img width=175 src=impressoras/Impressora-Lexmark-x364dn.png><br> NATALIA <br>(IMP-04)" => "192.168.0.241",
		"<img width=175 src=impressoras/Impressora-HP-m1536.png><br> NEIDE <br>(IMP-05)" => "192.168.0.242",
		"<img width=175 src=impressoras/Impressora-m127fn.png><br> CLAUDIA <br>(IMP-06)" => "192.168.0.243",
		"<img width=175 src=impressoras/Impressora-Brother.png><br> ADM <br>(IMP-01)" => "192.168.0.244",
		"<img width=175 src=impressoras/Impressora-Brother.png><br> FINANCEIRO <br>(IMP-07)" => "192.168.0.245",
		"<img width=175 src=impressoras/Impressora-ws408.png><br> EXPEDIÇÃO" => "192.168.0.249",
	];

?>
<div class="center">
	<h1>MONITORAMENTO (PROVEDORES)</h1>

	<div class="cards">

	<?php
	foreach($provedores as $servidor => $ip)
	{
		// $retorno = shell_exec("C:\Windows\system32\ping -n 1 $ip"); - Este codigo não funciona em servidor compartilhado por questões de segurança.
		$retorno = @fsockopen($ip,53,$errCode,$errStr,2);
		
		// if (preg_match("/tempo</", $retorno) || preg_match("/tempo=/", $retorno))  - Este codigo não funciona em servidor compartilhado por questões de segurança.
		if ($retorno)
		{
			$status = "<img width=175 src=online.png>";
			$status2 = "online";
		} else {
			$status = "<img width=175 src=offline.png>";
			$status2 = "offline";
		}
	?>
		<div class="card <?=$status2?>">
			<div class="servidor"><?=$servidor?></div>
			<div class="ip"><?=$ip?></div>
			<div class="status"><?=$status?></div>
		</div>

	<?php
	}
	?>

	</div>

</div>
<div class="center">
	<h1>MONITORAMENTO (SERVIDORES)</h1>

	<div class="cards">

	<?php
	foreach($servidores as $servidor => $ip)
	{
		// $retorno = shell_exec("C:\Windows\system32\ping -n 1 $ip"); - Este codigo não funciona em servidor compartilhado por questões de segurança.
		$retorno = @fsockopen($ip,53,$errCode,$errStr,2);
		
		// if (preg_match("/tempo</", $retorno) || preg_match("/tempo=/", $retorno))  - Este codigo não funciona em servidor compartilhado por questões de segurança.
		if ($retorno)
		{
			$status = "<img width=175 src=online.png>";
			$status2 = "online";
		} else {
			$status = "<img width=175 src=offline.png>";
			$status2 = "offline";
		}
	?>
		<div class="card <?=$status2?>">
			<div class="servidor"><?=$servidor?></div>
			<div class="ip"><!--<?=$ip?>--></div>
			<div class="status"><?=$status?></div>
		</div>

	<?php
	}
	?>

	</div>

</div>
<div class="center">
	<h1>MONITORAMENTO (IMPRESSORAS)</h1>

	<div class="cards">

	<?php
	foreach($impressoras as $impressora => $ip)
	{
		// $retorno = shell_exec("C:\Windows\system32\ping -n 1 $ip"); - Este codigo não funciona em servidor compartilhado por questões de segurança.
		$retorno = @fsockopen($ip,80,$errCode,$errStr,2);
		
		// if (preg_match("/tempo</", $retorno) || preg_match("/tempo=/", $retorno))  - Este codigo não funciona em servidor compartilhado por questões de segurança.
		if ($retorno)
		{
			$status = "<img width=175 src=online.png>";
			$status2 = "online";
		} else {
			$status = "<img width=175 src=offline.png>";
			$status2 = "offline";
		}
	?>
		<div class="card <?=$status2?>">
			<div class="servidor"><?=$impressora?></div>
			<div class="ip"><!--<?=$ip?>--></div>
			<div class="status"><?=$status?></div>
		</div>

	<?php
	}
	?>

	</div>

</div>
</body>
</html>