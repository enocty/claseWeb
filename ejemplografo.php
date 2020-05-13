<!doctype html>
<html>
<head>
  <title>GrafoALumno</title>

  <style type="text/css">
    html, body {
      font: 10pt arial;
    }
    #mynetwork {
      width: 600px;
      height: 600px;
      border: 1px solid lightgray;
    }
  </style>

  <script type="text/javascript" src="vis/dist/vis.js"></script>
  <link href="vis/dist/vis.css" rel="stylesheet" type="text/css" />

  <script type="text/javascript">
    var nodes = null;
    var edges = null;
    var network = null;

    function draw() {
      // create people.
      // value corresponds with the age of the person
      nodes = [
        {id: 1,  value: 20,  label: 'Appweb' },
        {id: 2,  value: 10, label: 'Ricardo'},
        {id: 3,  value: 8, label: 'Juan'},
        {id: 4,  value: 9.5, label: 'Maria' },
        {id: 5,  value: 6, label: 'Antonio' },
        {id: 6,  value: 5.3, label: 'Gerardo'},
      ];

      // create connections between people
      // value corresponds with the amount of contact between two people
      edges = [
        {from: 2, to: 1, value: 1, label: '10'},
        {from: 3, to: 1, value: 1,label: '8'},
        {from: 4, to: 1,value: 1,label: '9.5'},
        {from: 5, to: 1, value: 1,label: '6'},
        {from: 6, to: 1, value: 1,label: '5.3'}
      ];

      // Instantiate our network object.
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
            min:5,
            max:150
          }
        }
      };
      network = new vis.Network(container, data, options);
    }
  </script>
  <script src="../../googleAnalytics.js"></script>
</head>
<body onLoad="draw()">
<p>
 Calificaciones de los alumnos de Aplicaciones web
 <br>
</p>
<div id="mynetwork"></div>
</body>
</html>
