<?php include viewPath('includes/header'); ?>
<!-- Content Header (Page header) -->
<script src="<?php echo $url->assets ?>bootstrap/js/Chart.min.js"></script>
<?php
$sale_quantity = [];
$i = 0;
for ($i=0; $i<25; $i++)
{
   $sale_quantity[$i] = random_int(1,10);
}
?>
<section class="content">
    <div class="box">
        <div class="box-body">
            <div class="example table-responsive">
                <canvas id="myChart" style="max-width: 95%;"></canvas>
            </div>
        </div>
    </div>
</section>
<?php include viewPath('includes/footer'); ?>
<script>
    var levelarray = [];
    var dataarray = <?php echo json_encode($sale_quantity) ?>;
    var backarray = [];
    var borderarray = [];

    var i=0;
    for(i=0; i<25; i++)
    {
        nexti=i+1;
        levelarray[i] = i.toString(10) + "-" + nexti.toString(10);
        backarray[i] = 'rgba(54, 162, 235, 0.2)';
        borderarray[i] = 'rgba(54, 162, 235, 1)';
    }

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: levelarray,
            datasets: [{
                label: 'scale quantity',
                data: dataarray,
                backgroundColor: backarray,
                borderColor: borderarray,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

</script>
<!-- /.content -->


    