<?php
/**
 * Created by PhpStorm.
 * User: DRAGON
 * Date: 4/30/2019
 * Time: 6:54 AM
 */
include viewPath('includes/header');
?>
<section class="content-header">
    <h1>LoadCatergoryFromApi<small>overview </small></h1>
</section>
<section class="content">
    <div class="box">
        <div class="box-body">
            <div class="example table-responsive ">
                <?php echo form_open_multipart('LoadCountry/dataSave', [ 'class' => 'form-validate' ]); ?>
                <input type="submit" class="btn btn-primary center-block"  value="Save to country in 'etsy Api'">
                <?php echo form_close(); ?>
                <?php
//                $url = "https://openapi.etsy.com/v2/users/etsystore?api_key=5nuye4b6qyaf43za5psqv4db";
//                $response = etsyApi_makeRequest($url, false);
//                $someArray = json_decode($response['curlResult'], true);
                // Check your return to make sure you are making a successful connection.
                ?>
            </div>
        </div>
    </div>
</section>
<?php include viewPath('includes/footer'); ?>
