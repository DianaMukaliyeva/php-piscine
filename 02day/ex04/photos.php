#!/usr/bin/php
<?php
	if ($argc == 2) {
		$folder = str_replace('https://', '', $argv[1]);
		$folder = str_replace('http://', '', $folder);
		$all_data = file_get_contents($argv[1]);

		preg_match_all('/<img[^>]*>/', $all_data, $matches);

		$img_array = [];
		foreach ($matches[0] as $elem) {
			preg_match('/src="([^"]+)"/', $elem, $temp );
			if (count($temp) != 0) {
				if (strpos($temp[1], 'http') === false) {
					$img_url = $argv[1]."/".$temp[1];
					array_push($img_array, $img_url);
				} else {
					array_push($img_array, $temp[1]);
				}
			}
		}
		if (count($img_array) < 1) {
			echo "There are no images on this website.\n";
		} else {
			if (!file_exists($folder)) {
				mkdir($folder, 0755, true);

				foreach ($img_array as $imageUrl) {
					$filename = basename($imageUrl);
					$dir_to_save = "./".$folder."/";
					$localFilename = $dir_to_save.$filename;
					file_put_contents($localFilename, file_get_contents($imageUrl));
				}
			} else {
				echo "Folder exists! If you are crawling same page, first delete old folder.\n";
			}
		}
	} else {
		echo "Please enter an argument\n";
	}
?>