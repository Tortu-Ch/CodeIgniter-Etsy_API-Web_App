<?php
/**
 * Created by PhpStorm.
 * User: DRAGON
 * Date: 4/29/2019
 * Time: 8:20 PM
 */
include viewPath('includes/header');
?>
    <section class="content-header">
        <h1>ProductReservation<small>overview </small></h1>
    </section>
    <section class="content">
        <div class="box" style="width: 750px">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <?php echo form_open_multipart('reservation/add', [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>
                            <div class="row">
                                <div class="col-sm-2" style="width: 165px">
                                    <input type="text" required style="width: 140px; background-color: #FFFFFF" name="re_date1"
                                           id="re_date1" class="re_date form-control text-center" readonly placeholder="Begine date" />
                                </div>
                                <div class="col-sm-1 text-center" style="width: 10px;">
                                    to
                                </div>
                                <div class="col-sm-2" style="width: 165px">
                                    <input type="text" required style="width: 140px; background-color: #FFFFFF" name="re_date2"
                                           id="re_date2" class="re_date form-control text-center" readonly placeholder="end date" />
                                </div>
                                <div class="col-sm-4" style="width: 250px;">
                                    <input type="text" required style="width: 235px; background-color: #FFFFFF" name="keyword"
                                           id="keyword" class="form-control text-center" placeholder="input keyword" />
                                </div>
                                <div class="col-sm-2" style="width: 80px">
                                    <input type="button" class = "btn btn-primary" name = 'add_bt' id = 'add_bt'
                                           value="Add Keyword">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <br>
                <table id="dataTable1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 10%">No</th>
                        <th class="text-center" style="width: 25%">date</th>
                        <th class="text-center">Keyword</th>
                        <th class="text-center" style="width:10%">ItemCount</th>
                        <th class="text-center" style="width:10%">Status</th>
                        <th style = "width:30px"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no=0;
                            foreach ($page->data as $row)
                            {
                                $no++;
                                $btemp = explode(" ", $row->b_date);
                                $b_date = $btemp[0];
                                $btemp = explode(" ", $row->e_date);
                                $e_date = $btemp[0];
                                echo"<tr class = 'text-center'>
                                        <td>".$no."</td>
                                        <td>".$b_date."&nbsp;&nbsp;to&nbsp;&nbsp;".$e_date."</td>
                                        <td>".$row->keyword."</td>".
                                        "<td>".$row->item_num."</td>".
                                        "<td>".$row->status."</td>".
                                        "<td>";?>
                                            <a href="<?php echo url('reservation/delete/'.$row->id) ?>" class="btn btn-sm btn-default"
                                                onclick="return confirm('Do you really want to delete this keyword?')" title="Delete item"
                                                    data-toggle="tooltip"><i class="fa fa-trash"></i>
                                            </a>
                                         </td>
                                    </tr>
                        <?php
                            }
                        ?>
                            <input hidden id = "re_count" value="<?php echo $no;?>">
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php include viewPath('includes/footer'); ?>

<script>
    jQuery(document).ready(function () {
        $('.form-validate').validate();
        if ($('#re_count').val() >= 10)
        {
            $('#add_bt').prop( "disabled", true );
        }
        $('#add_bt').click(function () {

            if($('#re_date1').val() !='' && $('#re_date2').val() !='' && $('#keyword').val() != '')
            {
                $.blockUI({ css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#fff',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#000'
                    } });
            }
            $('.form-validate').submit();
        })


        jQuery('#re_date1,#re_date2').datetimepicker({
            minDateTime:UtC_4_Time(),
            format:'Y-m-d',
            timepicker:false,
        });

        $('#re_date1').change(function () {
            if($('#re_date1').val() > $('#re_date2').val())
            {
                $('#re_date2').val($('#re_date1').val());
            }
        });
        $('#re_date2').change(function () {
            if($('#re_date1').val() > $('#re_date2').val())
            {
                $('#re_date1').val($('#re_date2').val());
            }
        });
    });
    /*
    $('#dataTable1').DataTable({
        //order: 'desc'
    })*/
</script>
