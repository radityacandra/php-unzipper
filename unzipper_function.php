<?php

function unzipper($password, $zipFile, $targetFolder = __DIR__){
	$zip = new ZipArchive();
	$zip_status = $zip->open($zipFile);

	if ($zip_status === true) {
		if ($zip->setPassword($password)) {
			if (!$zip->extractTo($targetFolder)) {
				throw new Exception("Error ! The password you've provided is wrong !")
			} else {
				return true;
			}
		} else {
			throw new Exception("Error ! Failed to set password. Please make sure you have php-zip installed !")
		}
	} else {
		throw new Exception("Error ! Zip file cannot be found !");
	}
}