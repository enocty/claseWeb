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

$alumnos[1]='Aplicaciones web';
$alumnos[2]='Antonio';
$alumnos[3]='Edgar';
$alumnos[4]='Jose Luis';
$alumnos[5]='Ricardo';
$alumnos[6]='Margarita';
$alumnos[7]='Marco';
$alumnos[8]='Fernando';
$alumnos[9]='Antonio';
$alumnos[10]='Edgar';
$alumnos[11]='Jose Luis';
$alumnos[12]='Ricardo';
$alumnos[13]='Margarita';
$alumnos[14]='Marco';
$alumnos[15]='Ángel';
$alumnos[16]='Antonio';
$alumnos[17]='Edgar';
$alumnos[18]='Jose Luis';
$alumnos[19]='Ricardo';
$alumnos[20]='Margarita';
$alumnos[21]='Marco';


$promedio[1]=30;
$promedio[2]=10;
$promedio[3]=8.7;
$promedio[4]=5.7;
$promedio[5]=7.8;
$promedio[6]=9.6;
$promedio[7]=1;
$promedio[8]=5.5;
$promedio[9]=10;
$promedio[10]=8.7;
$promedio[11]=5.7;
$promedio[12]=7.8;
$promedio[13]=9.6;
$promedio[14]=1;
$promedio[15]=1.5;
$promedio[16]=10;
$promedio[17]=8.7;
$promedio[18]=5.7;
$promedio[19]=7.8;
$promedio[20]=9.6;
$promedio[21]=1;


$numAlumnos=21;

$masarcos="";
for($i=1; $i<=$numAlumnos; $i++)
$masarcos=$masarcos."{id: $i,value: $promedio[$i], label: '$alumnos[$i]'},";
$arcos="nodes = [".$masarcos."];";


$masaristas="";
for($i=2; $i<=$numAlumnos; $i++)
$masaristas=$masaristas."{from: $i, to: 1, value: $promedio[$i]/4, label: '$promedio[$i]', font: {color:'red', face: 'times new roman'}},";
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
