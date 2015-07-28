<?php

if (isset($_SERVER['HTTP_X_FILENAME'])) 
{
	$filename = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
	$file = file_get_contents('php://input');
	$type = 'image/'.$parameters['filetype'];

	//2015/07/24 PhucHD Add End
	parse_str($file, $_PUT);
	file_put_contents('logfile.txt', '__DIR__: '.(String) $_PUT."\n".' File Name: '.$filename."\n".' Data: '.$_PUT);
	file_put_contents(__DIR__.'/abc/'.$filename, $file);
	//2015/07/24 PhucHD Add End

	$cmd  = './ConvertImage ./abc/'.$filename.' ./uploads/'.$filename;

	$last = exec($cmd, $out);

	file_put_contents('logfile.txt',  "\n".$last."\n".$out, FILE_APPEND | LOCK_EX);

	if (strpos($last, 'Error:') === false)
	{
		$res = array('success' => true);
		$res['images'][] = array('src' =>'./uploads/'.$filename, 'width' => '340', 'height' => '420');
	}
	else
		$res = array('success' => false, 'msg' => $last);

	//2015/07/24 PhucHD Add Start
	//$res = array('success' => false, 'msg' => "Pretty Girl......!");
	//2015/07/24 PhucHD Add End

	header('Content-Type: application/json');
	echo json_encode($res);
} 
else
{
	header('HTTP/1.1 404 Not found');
	header('Content-Type: application/json');
	echo json_encode(array(
		'success' => false,
		'msg' => '404 - The resource you requested is not found.'
	));
}
?>
