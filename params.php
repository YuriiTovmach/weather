<?php
$city = 'Kyiv';
$units = 'metric';
$mode = 'xml';
$id = '1c7542455b60250e57a13031c6037fdf';

$request = 'http://api.openweathermap.org/data/2.5/weather?'.'q='.$city.'&units.='.$units.'&mode='.$mode.'&APPID='.$id;

$xml = simplexml_load_file($request)or die('Невозможно загрузить данные!');

try
{
	$xml->asXml('params.xml');
	header('Location: params.xml');
}
catch(Exception $e)
{
	echo 'Ошибка: '.$e->getMessage();
}
