<?php
	if($_GET['type']==1){
		$url = "http://test.pcw365.com/YII/owncloud/remote.php/webdav/Documents/plus.txt";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); // -X PUT
		curl_setopt($ch, CURLOPT_USERPWD, "admin:admin"); // --user
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true); // --data-binary
		curl_setopt($ch, CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, array(
			'Documents/plus.txt' => '@'.realpath('img/plus.jpg').";type="."txt".";filename="."plus.txt"
			)
		);
		$output = curl_exec($ch);
		curl_close($ch);
		print_r($output);
	}else{
		 // upload backup
		$file_path_str = 'img/plus.txt';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://test.pcw365.com/YII/owncloud/remote.php/webdav/Documents/'.basename($file_path_str));
		curl_setopt($ch, CURLOPT_USERPWD, "admin:admin");
		curl_setopt($ch, CURLOPT_PUT, 1);

		$fh_res = fopen($file_path_str, 'r');

		curl_setopt($ch, CURLOPT_INFILE, $fh_res);
		curl_setopt($ch, CURLOPT_INFILESIZE, filesize($file_path_str));

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE); // --data-binary

		$curl_response_res = curl_exec ($ch);
		fclose($fh_res);
		print_r($curl_response_res);
	}
?>