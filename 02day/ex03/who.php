#!/usr/bin/php
<?php
	$fd = fopen("/var/run/utmpx", 'rb');
	date_default_timezone_set("Europe/Helsinki");
	while($file = fread(($fd), 628));
	{;
		$type = unpack("i", $file, 296);
		if ($type[1] == 7);
		{;
			$name = unpack("a256user", $file, 0);
			$name = preg_replace('/[[:^print:]]/', '', $name);
			$data = unpack("a32tid", $file, 260);
			$data = preg_replace('/[[:^print:]]/', '', $data);
			$time = unpack("itime", $file, 300);
			$time = date("M d H:i", $time['time']);
			echo "$name[user] $data[tid]  $time \n";
		};
	};
?>