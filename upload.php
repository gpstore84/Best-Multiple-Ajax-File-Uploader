<?php

include('uploader.php');

// list of valid extensions, ex. array("jpeg", "xml", "bmp")
$allowedExtensions = array("pdf","doc","docx","xls","xlsx","jpg","jpeg","png","gif",);

// max file size in bytes
$sizeLimit = 20 * 1024 * 1024;

$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

$file_name = $_REQUEST['qqfile'];
$file_name = preg_replace("/[^a-zA-Z0-9]/","_",substr($file_name,0,strrpos($file_name, '.', -1)));
$file_name = str_replace(".","_",$file_name) . "_" . substr(md5(rand()),0,5);
$uploader->inputName = 'qqfile';

$uploadlocation = "upload/";

$result = $uploader->handleUpload($uploadlocation);

echo json_encode($result);

?>