<?php

$file =$_POST['id'];

if (is_file()) {
	chmod($file,0777);
	if (!unlink($file)) {
		echo false;
	}
}

?>