<?php
include('includes/weather-header.html');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$city = (empty($_POST['city']))? "Kyiv": $_POST['city'];
$units = 'metric';
$mode = 'xml';
$id = '1c7542455b60250e57a13031c6037fdf';

$request = 'http://api.openweathermap.org/data/2.5/weather?'.'q='.$city.'&units.='.$units.'&mode='.$mode.'&APPID='.$id;

$xml = simplexml_load_file($request)or die('Невозможно загрузить данные!');

$icon = 'http://openweathermap.org/img/w/'.$xml->weather['icon'].'.png';
echo '<h1> Сегодня в городе '.$xml->city['name'];
echo ': '.$xml->weather[''].'<img src='.$icon.'></h1>';
echo '<ul><li>Температура: '.$xml->temperature['value'];
echo '&deg; '.$xml->temperature[''].' K';
echo '<li>Ветер: '.$xml->wind->speed['value'].' м/с';
echo '<li>Влажность: '.$xml->humidity['value'].'&#37;</ul>';

}

echo '<form method="POST" action="weather.php">';
echo '<fieldset><legend>Введите название города</legend>';
echo '<input type="text" name="city">';
echo '<input type="submit" name="submission" value ="Прогноз">';
echo '</fieldset></form>';

include('includes/weather-footer.html');


