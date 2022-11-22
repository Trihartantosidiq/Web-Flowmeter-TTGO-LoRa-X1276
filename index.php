<html>
    <head>
        <title>Grafik WaterFlow Sensor</title>

        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
        <script type="text/javascript" src="assets/js/mdb.min.js"></script>
        <script  type="text/javascript" src="jquery-latest.js"></script>
      

        <script type="text/javascript">
            var refreshid = setInterval(function(){
                $('#responsecontainer').load('data.php');
            },2000);
        </script>
        
    </head>
    <body>
    <?php include 'templates/navbar.php'; ?>
        <div class="container" style="width: 80%; text-align: center">
            <h3>Grafik Sensor</h3>
        </div>
        <div class="container">
        <div class="container" id="responsecontainer" style="width: 800px; text-align: center"></div>
        </div>
    </body>
</html>