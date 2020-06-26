<?php
/**
 * Created by PhpStorm.
 * User: DRAGON
 * Date: 5/8/2019
 * Time: 5:19 AM
 */
 ?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<div class='modal fade bs-example-modal-sm' id='realtimeModal' style="margin-top: 100px">
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
    function UtC_4_Time(utc_4Offsetval=-4) {
        // create Date object for current location
        d = new Date();

        // convert to msec
        // add local time zone offset
        // get UTC time in msec
        utc = d.getTime() + (d.getTimezoneOffset() * 60000);

        // create new Date object for different city
        // using supplied offset
        nd = new Date(utc + (3600000*utc_4Offsetval));
        // return time as a string
        return nd;
    }

    function callAjax() {
        $('#realtimeModal').modal();
        $('#m1').text('Wait..');
        $('#m1').load("/realtime/datasave/"+UtC_4_Time());
    }

    callAjax();
</script>
