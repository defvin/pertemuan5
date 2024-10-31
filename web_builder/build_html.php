<?php

$html = $_POST['html'];
$css = $_POST['css'];

$content = <<<EOF
<!DOCTYPE html>
	<head>
		<title>Website ku</title>
		<style type="text/css">
			$css
		</style>
	</head>
	<body>
		$html
	</body>
</html>
EOF;

if(!is_dir('export')) mkdir("export", 0755, true);

if(file_put_contents("export/build.html", $content)){
	$zip = new ZipArchive;
	if($zip->open('export/build.zip', ZipArchive::CREATE) === TRUE){
		$zip->addFile('export/build.html', 'build.html');
		$zip->close();
		echo '1';
	}else{
		echo "0";
	}

}else{
	echo "0";
}









