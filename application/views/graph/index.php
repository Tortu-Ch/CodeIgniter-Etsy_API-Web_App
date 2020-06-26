<script src="<?php echo $url->assets ?>bootstrap/js/Chart.min.js"></script>
<?php
    $edatetime = date('Y-m-d', strtotime($page->curdate. ' + 1 days'));
    $edatetime .= " 00:00";
    $curdate = $page->curdate;
    $sale_quantity = [];
    $sale_profit = [];
    $i = 0;
    if($page->graphMode == 1) {
        for ($i = 0; $i <= 23; $i++) {
            $bdate = $curdate . " ";
            if ($i < 10) $bdate .= "0" . strval($i) . ":00";
            else $bdate .= strval($i) . ":00";
            $edate = $curdate . " ";
            $n_i = $i + 1;
            if ($i < 10) $edate .= "0" . strval($n_i) . ":00";
            else if ($i == 23) $edate = $edatetime;
            else $edate .= strval($n_i) . ":00";
            $sale_quantity[$i] = $this->ProductItem_model->getSaleQuantity($page->listingId, $bdate, $edate);
        }
    }
    else if($page->graphMode == 2)
    {
        for ($i = 0; $i <= 23; $i++) {
            $bdate = $curdate . " ";
            if ($i < 10) $bdate .= "0" . strval($i) . ":00";
            else $bdate .= strval($i) . ":00";
            $edate = $curdate . " ";
            $n_i = $i + 1;
            if ($i < 10) $edate .= "0" . strval($n_i) . ":00";
            else if ($i == 23) $edate = $edatetime;
            else $edate .= strval($n_i) . ":00";
            $sale_quantity[$i] = $this->ProductItem_model->getSaleProfit($page->listingId, $bdate, $edate);
        }
    }

?>
<form id = "graphForm">
    <input hidden id = "flag"  value="<?php echo $page->graphMode?>">
</form>
<section class="content">
    <div class="box">
        <div class="box-body">
            <div style="font-size: medium; color: #7aa6da">
              Title&nbsp;:&nbsp;<?php echo $page->menu;?>
            </div>
            <div class="example table-responsive">
                <canvas id="myChart" style="max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</section>
<script>
    var dislabel = 'scale quantity';
    if($('#flag').val() == 2)dislabel = 'scale profit($)';

    var levelarray = [];
    var dataarray = <?php echo json_encode($sale_quantity) ?>;
    var backarray = [];
    var borderarray = [];
    var i=0;
    for(i=0; i<24; i++)
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
                label: dislabel,
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
