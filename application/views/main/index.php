<?php
/**
 * Created by PhpStorm.
 * User: DRAGON
 * Date: 4/26/2019
 * Time: 3:28 PM
 */
     include viewPath('includes/header');
$diaplayItem = null;
$tb = null;
$dataSale = null;
$dataProfit = null;
if($page->keywordId) {
    $reservation = $this->Reservation_model->getkeyword($page->keywordId);
    $diaplayItem = $reservation->keyword;
    if ($page->subsubItem) $diaplayItem = $page->subsubItem . " > " . $diaplayItem;
    else if ($page->subItem) $diaplayItem = $page->subItem . " > " . $diaplayItem;
    else if ($page->topItem) $diaplayItem = $page->topItem . " > " . $diaplayItem;
    $listarray = null;
    /*
    if(count($listingdata)) {
        $count = 0;
        foreach ($listingdata as $row) {
            $salequantity = $this->ProductItem_model->getSaleQuantity($row->listing_id, $page->bdatetime,
                $page->edatetime);
            $profit = '';
            $price = null;
            if($row->currency_code != 'USD') {
                $price = $this->USD_change_model->get_rate($row->currency_code)*$row->price;
            }
            else $price = $row->price;
            if ($salequantity > 0) $profit = round(((0.906 * $price) - 0.5) * $salequantity,2);
            $listarray[] = array(
                'listing_id' => $row->listing_id,
                'category_name' => $row->category_name,
                'title' => $row->title,
                'salequantity' => $salequantity,
                'price' => $price,
                'currency_code' => $row->currency_code,
                'profit' => $profit,
                'url' => $row->url
            );
        }
    }


    if($listarray)$dataSale = array_orderby($listarray,'salequantity', SORT_DESC, 'title', SORT_ASC);
    if($listarray)$dataProfit = array_orderby($listarray,'profit', SORT_DESC, 'title', SORT_ASC);*/
}


?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<section class="content-header">
    <h1>MainMode<small><?PHP echo $diaplayItem?> </small></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">OrderBy SaleQuantity</strong></h3>
                    <div class="box-body">
                        <div class="example table-responsive">
                            <table id = "dataTable0" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-nowrap text-center" style="width: 5%">No</th>
                                    <th class="text-nowrap text-center" >Product title</th>
                                    <th class="text-nowrap text-center" style="width: 10%">Quantity</th>
                                    <th class="text-nowrap text-center" style="width: 7%">Graph</th>
                                </tr>
                                </thead>
                            <tbody>
                            <?php
                  /*          $no = 0;
                            if($listingdata) {
                                foreach ($listingdata as $row) {
                                    $no++;*/
                                    ?>
                  <!--                  <tr>
                                        <td class="text-center"><?php// echo $no ?></td>
                                        <td><a href="<?php// echo $row->url?>"
                                               target="_blank"><?php //echo PT_ShortText($row->title,70) ?></a></td>
                                        <td class="text-right"><?php //echo ($row['salequantity'] > 0) ? $row['salequantity'] : '' ?></td>
                                        <td class="text-center">
                                            <a href="javascript:graphDisplay('<?php //echo $row['listing_id']?>','<?php// echo $page->bdate;?>','1')"><i class="fa fa-bar-chart"></i></a></td>
                                    </tr>-->
                                    <?php
                        //        }
                         //   }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">OrderBy SaleProfit($)</strong></h3>
                    <div class="box-body">
                        <div class="example table-responsive">
                            <table id = "dataTable1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-nowrap text-center" style="width: 5%">No</th>
                                    <th class="text-nowrap text-center" >Product title</th>
                                    <th class="text-nowrap text-center" style="width: 10%">Profit</th>
                                    <th class="text-nowrap text-center" style="width: 7%">Graph</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php/*
                                $no = 0;
                                if($dataProfit) {
                                    foreach ($dataProfit as $row) {
                                        $no++;*/
                                        ?>
                <!--                        <tr>
                                            <td class="text-center"><?php //echo $no ?></td>
                                            <td><a href="<?php //echo $row['url'] ?>"
                                                   target="_blank"><?php //echo PT_ShortText($row['title'],70) ?></a></td>
                                            <td class="text-right"><?php //echo ($row['profit'] > 0) ? $row['profit'] : '' ?></td>
                                            <td class="text-center">
                                                <a href="javascript:graphDisplay('<?php //echo $row['listing_id']?>','<?php //echo $page->date;?>','2')"><i class="fa fa-bar-chart"></i></a></td>
                                        </tr>-->
                                        <?php
                            /*        }
                            //    }*/
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!--- modal box is here ---->
    <div class='modal fade bs-example-modal-sm' id='graphModal' style="margin-top: 100px">
        <div class="modal-dialog modal-sm" style="width: 70%">
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title'>Graph</h4>
                </div>
                <div class='modal-body' id='m1'>
                    This is default text, Click Display Message.
                </div>
            </div>
        </div>
    </div><!-- end of modal -->
    <script>
        function graphDisplay(id, cur_date,flag)
        {
            $('#graphModal').modal();
            $('#m1').text('Wait..');
            $('#m1').load("/graph/display/"+id+"/"+cur_date+"/"+flag);
        }

        $(document).ready(function() {

        });
    </script>
</section>
<?php include viewPath('includes/footer'); ?>
<?php
$topItem = $page->topItem!=''?$page->topItem:'0';
$subItem = $page->subItem!=''?$page->subItem:'0';
$subsubItem=$page->subsubItem!=''?$page->subsubItem:'0';
$keywordId = $page->keywordId!=''?$page->keywordId:'0';
?>
<script>
    $('#dataTable0').DataTable({
        "ajax": {
            "url" : "<?php echo site_url("main/getListingData/".$keywordId."/".$topItem."/".$subItem."/".$subsubItem) ?>",
            "type": "get"
        },
    });
    $('#dataTable1').DataTable({
        "ajax": {
            "url" : "<?php echo site_url("main/getListingData/".$keywordId."/".$topItem."/".$subItem."/".$subsubItem) ?>",
            "type": "get"
        },
    })
</script>
