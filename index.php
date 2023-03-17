<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="refresh" content="3">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MONITORAMENTO</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php

	$servidores = [
		"SERVIDOR AD <br>(Remoto)" => "192.168.0.16:3389",
		"SERVIDOR BD <br>(Remoto)" => "192.168.0.21:3389",
		"SERVIDOR BD <br>(Conectividade)" => "192.168.0.21:3306",
		"PC-SUPORTE <br>(Remoto)" => "192.168.0.19:3389",
		"SERVIDOR BKP-1 <br>(Maquina)" => "192.168.0.200:80",
		"SERVIDOR BKP-2 <br>(Maquina)" => "192.168.0.199:80",
	];

?>
<?php

	$impressoras = [
		"IMPRESSORA - LOJA <br>(IMP-02)" => "192.168.0.240",
		"IMPRESSORA - NATALIA <br>(IMP-04)" => "192.168.0.241",
		"IMPRESSORA - NEIDE <br>(IMP-05)" => "192.168.0.242",
		"IMPRESSORA - CLAUDIA <br>(IMP-06)" => "192.168.0.243",
		"IMPRESSORA - ADM <br>(IMP-01)" => "192.168.0.244",
		"IMPRESSORA - FINANCEIRO <br>(IMP-07)" => "192.168.0.245",
		"ETIQUETADORA<br>(EXPEDIÇÃO)" => "192.168.0.249",
	];

?>
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
			$status = "<img width=150 src=online.png>";
		} else {
			$status = "<img width=150 src=offline.png>";
		}
	?>
		<div class="card <?=$status?>">
			<div class="servidor"><?=$servidor?></div>
			<div class="ip"><?=$ip?></div>
			<div class="status"><?=$status?></div>
		</div>

	<?php
	}
	?>

	</div>

</div><br><br><br><br><br>
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
			$status = "<img width=150 src=online.png>";
		} else {
			$status = "<img width=150 src=offline.png>";
		}
	?>
		<div class="card <?=$status?>">
			<div class="servidor"><?=$impressora?></div>
			<div class="ip"><?=$ip?></div>
			<div class="status"><?=$status?></div>
		</div>

	<?php
	}
	?>

	</div>

</div>
</body>
</html>
