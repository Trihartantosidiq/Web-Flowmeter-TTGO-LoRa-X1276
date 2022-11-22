<?php

session_start();

include 'koneksi.php';

    //baca tanggal
    $tanggal = mysqli_query($konek, "SELECT tanggal FROM tb_sensor ORDER BY ID ASC");
    $debit = mysqli_query($konek, "SELECT debit FROM tb_sensor ORDER BY ID ASC");
    $total =mysqli_query($konek, "SELECT total FROM tb_sensor ORDER BY ID ASC");
    $Turb = mysqli_query($konek, "SELECT Turb FROM tb_sensor ORDER BY ID ASC");

?>

<div class="panel panel-primary">
    <div class= "panel-heading">
            grafik sensor
    </div>

    <div class="panel-body">
        <canvas id="myChart"></canvas>
        <script type="text/javascript">
                var canvas = document.getElementById('myChart');
                var data ={
                    labels : [
                        <?php
                            while($data_tanggal = mysqli_fetch_array($tanggal))
                            {
                                echo '"'.$data_tanggal['tanggal'].'",';
                            }
                        ?>
                    ], 
                    datasets : [
                        {
                        label : "Debit",
                        fill : true,
                        backgroundColor:"rgba(52, 231, 43, 0.5)",
                        borderColor:"rgba(52, 231, 43, 1)",
                        lineTension:0.5,
                        pointRadius:5,
                        data : [
                            <?php
                            while($data_debit = mysqli_fetch_array($debit))
                            {
                                echo $data_debit['debit'].',';
                            }
                        ?>
                        ]
                    }
                    
                    ,{
                        label : "Turb",
                        fill : true,
                        backgroundColor:"rgba(245, 195, 39, 0.5)",
                        borderColor:"rgba(245, 195, 39, 1)",
                        lineTension:0.5,
                        pointRadius:5,
                        data : [
                            <?php
                            while($data_Turb = mysqli_fetch_array($Turb))
                            {
                                echo $data_Turb['Turb'].',';
                            }
                        ?>
                        ]
                    },
                    {
                            label : "Total",
                        fill : true,
                        backgroundColor:"rgba(239, 82, 93, 0.2)",
                        borderColor:"rgba(239, 82, 93, 1)",
                        lineTension:0.5,
                        pointRadius:5,
                        data : [
                            <?php
                            while($data_total = mysqli_fetch_array($total))
                            {
                                echo $data_total['total'].',';
                            }
                        ?>
                        ]
                    }
                ]
                };
                var option = {
                    showLines : true,
                    animation : {duration : 0}
                };

                var myLineChart = Chart.Line(canvas, {
                    data : data,
                    option : option
                });
                
        </script>
    </div>