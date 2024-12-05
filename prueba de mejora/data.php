<?php
session_start();

$preguntas = [
[
'id' => 1,
'question' => '¿Cuál es el océano más grande del mundo?',
'options' => ['Atlántico', 'Pacífico', 'Índico'],
'answer' => 'Pacífico'
],
[
'id' => 2,
'question' => '¿En qué continente se encuentra Egipto?',
'options' => ['Asia', 'África', 'Europa'],
'answer' => 'África'
],
[
'id' => 3,
'question' => '¿Cuántos días tiene un año bisiesto?',
'options' => ['365', '366', '367'],
'answer' => '366'
],
[
'id' => 4,
'question' => '¿Cuál es el metal más usado en la industria?',
'options' => ['Hierro', 'Cobre', 'Aluminio'],
'answer' => 'Hierro'
],
[
'id' => 5,
'question' => '¿Qué planeta es conocido como el planeta rojo?',
'options' => ['Venus', 'Marte', 'Júpiter'],
'answer' => 'Marte'
]
];

if (!isset($_SESSION["preguntas"])) {
$_SESSION["preguntas"] = $preguntas;
}

?>