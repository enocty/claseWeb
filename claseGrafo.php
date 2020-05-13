<!doctype html>
<html>
<head>
  <title>Network | Sizing</title>

  <style type="text/css">
    html, body {
      font: 10pt arial;
    }
    #mynetwork {
      width: 900px;
      height: 600px;
      border: 1px solid lightgray;
    }
  </style>

  <script type="text/javascript" src="vis/dist/vis.js"></script>
  <link href="vis/dist/vis.css" rel="stylesheet" type="text/css" />

<?php
//aqui leeremos del archivo calificaciones.txt
$fp = fopen("calificaciones.txt", "r");
$i=1;
while (!feof($fp)){
    $linea = fgets($fp);
   // echo $linea;
    $cadena = explode(" ", $linea);
    echo "$cadena[0]";
    echo "<br>";
    echo "$cadena[1]";
    echo "<br>";
    $alumnos[$i]=$cadena[0];
    $promedio[$i]=floatval($cadena[1]);
    $i++;
}
fclose($fp);

$numAlumnos=37;
echo "Numero de alumnos: $numAlumnos";

$masarcos="";
for($i=1; $i<=$numAlumnos; $i++)
$masarcos=$masarcos."{id: $i,value: $promedio[$i], label: '$alumnos[$i]'},";
$arcos="nodes = [".$masarcos."];";


$masaristas="";
for($i=2; $i<=$numAlumnos; $i++){
  if ($promedio[$i]>=9) {
     $masaristas=$masaristas."{from: $i, to: 1, value: $promedio[$i]/4, label: '$promedio[$i]', font: {color:'green', face: 'times new roman'}},";
  }elseif ($promedio[$i]>=8 && $promedio[$i]>=8.999) {
    $masaristas=$masaristas."{from: $i, to: 1, value: $promedio[$i]/4, label: '$promedio[$i]', font: {color:'yellow', face: 'times new roman'}},";
  }elseif ($promedio[$i]>=6 && $promedio[$i]>=7.999) {
     $masaristas=$masaristas."{from: $i, to: 1, value: $promedio[$i]/4, label: '$promedio[$i]', font: {color:'orange', face: 'times new roman'}},";
  }else{
    $masaristas=$masaristas."{from: $i, to: 1, value: $promedio[$i]/4, label: '$promedio[$i]', font: {color:'red', face: 'times new roman'}},";
  }
 

}
$aristas="edges = [".$masaristas."];";





echo "
  <script type='text/javascript'>
    var nodes = null;
    var edges = null;
    var network = null;

    function draw() {
      $arcos;
      $aristas;
    
      var container = document.getElementById('mynetwork');
      var data = {
        nodes: nodes,
        edges: edges
      };
      var options = {
        nodes: {
          shape: 'dot',
          scaling: {
            customScalingFunction: function (min,max,total,value) {
              return value/total;
            },
            min:2,
            max:250
          }
        }
      };
      network = new vis.Network(container, data, options);
    }
  </script>";
  
 ?>
  <script src="vis/googleAnalytics.js"></script>
</head>
<body onLoad="draw()">
<p>
  Alumnos Aplicaciones Web - Primavera 2020
</p>
<div id="mynetwork"></div>
</body>
</html>
