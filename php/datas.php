<?php
//Datas
// d -  dia com dois digitos - 02
// D - dia com três letras - Fri
// M - mês com três letra - jul
// m - mês com dois digitos - 07
// y - ano com dois digitos - 21
// Y - ano com quatro digitos - 2021
// Para exibir o dia, mês e ano - d/m/Y
// l - dia da semana - Friday
// h - retorna o horario no formato de 12h - 08
// L - retorna o horario no formato de 24h - 20
// i - retorna o minutos em dois digitos - 22:01
// I - retorna o minuto em um digito - 22:1
// s - retorna os segundos 
// Para retornar o dia da semana e a hora - d/m/Y H:i:s
// A - AM ou a - am
// Utiliza a função date_default_timezone_set 
// para informa o horario de acordo com a localização 
print "<span><center><b>Aprendendo sobre formatos de datas</b></center></span>";
print "<br>";
date_default_timezone_set('America/Sao_Paulo');
echo date('d/m/Y H:i:s');
echo "<hr>";

// formato no banco de dados
print " formato DATE <br>";
$date = date('Y-m-d'); //formato DATE
echo $date;
echo "<hr>";

print " formato DATETIME <br>";
$datetime = date('Y-m-d'); //formato DATETIME
echo $datetime;
echo "<hr>";

//TIME
print "time não formatado <br>";
echo time();

echo "<hr>";

//Formatando o time()
print "time formatado <br>";
$time = time();
echo date('d/m/Y', $time);

echo "<hr>";

//MKTIME
print "formato MKTIME <br>";
$data_pagamento = mktime(15, 30, 00, 02, 15, 2023);
echo $data_pagamento;
echo "<br>";
echo date('d/m/y - h:i', $data_pagamento);

echo "<hr>";

//STRTOTIME
print "formato STRTOTIME <br>";
$data = '2019-04-10 23:19:00';
$data = STRTOTIME($data);
echo $data;
echo "<br>";
echo date('d/m/Y', $data);


