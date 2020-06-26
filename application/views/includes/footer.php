
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Other <i class="fa fa-heart" style="color: red;"></i>KISP WEBSITE
      &nbsp; &nbsp; &nbsp; &nbsp; 
      <b>Version</b> 0.1.0 &nbsp; &nbsp; &nbsp;<b>Page</b> speed <strong>{elapsed_time}</strong> seconds.
    </div>
    <strong>Copyright &copy; <?php  echo date('Y') ?> <a href="<?php echo url('/') ?>"></a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- date-range-picker -->
<span data-url="<?php echo $url->assets; ?>" />

<script src="<?php echo $url->assets ?>plugins/moment/min/moment.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo $url->assets ?>plugins/Chart.js"></script>
<!-- DataTables -->
<script src="<?php echo $url->assets ?>plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $url->assets ?>plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Validate  -->
<script src="<?php echo $url->assets ?>plugins/jquery.validate.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo $url->assets ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $url->assets ?>js/demo.js"></script>

<!-- Select2 -->
<script src="<?php echo $url->assets ?>plugins/select2/dist/js/select2.full.min.js"></script>

<!-- pace -->
<script src="<?php echo $url->assets ?>plugins/pace/pace.min.js"></script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })

  $.validator.setDefaults( {
    errorElement: "em",
    errorPlacement: function ( error, element ) {
      // Add the `help-block` class to the error element
      error.addClass( "help-block" );

      if ( element.prop( "type" ) === "checkbox" ) {
        error.insertAfter( element.parent( "label" ) );
      } else {
        error.insertAfter( element );
      }
    },
    highlight: function ( element, errorClass, validClass ) {
      $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
    },
    unhighlight: function (element, errorClass, validClass) {
      $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
    }
} );

$.fn.openMenu = function () {
        var className = $(this).attr('class');
  if(className == "treeview"){
    $(this).addClass("active");
  }else if(className == "treeview-menu" ){
    $(this).addClass("menu-open");
    $(this).css({ display: "block" });
  }
};

$.fn.closeMenu = function () {
        var className = $(this).attr('class');
  var count = $(this).length;
  if(count > 1){
    $.each($(this), function( key, element ) {
      className = $(element).attr('class');
      if(className == "treeview active"){
        $(element).removeClass("active");
      }else if(className == "treeview-menu menu-open" ){
        $(element).removeClass("menu-open");
        $(element).css({ display: "none" });
      }
    });
  }else{
    if(className == "treeview active"){
      $(this).removeClass("active");
    }else if(className == "treeview-menu menu-open" ){
      $(this).removeClass("menu-open");
      $(this).css({ display: "none" });
    }
  }
};

$(".search-menu-box").on('input', function() {
    var filter = $(this).val();
    $(".sidebar-menu > li").each(function(){
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).hide();
        } else {
            $(this).show();
            $(this).parentsUntil(".treeview").openMenu();
        }
    });
});

window.generateObNumber = function(elementId) {
    var numberPadding = '0000';
    var monthPadding = '00';
    var dt = new Date();
    var year = dt.getFullYear();
    var month = dt.getMonth() + 1;

    var last_ob_number = document.getElementById('ob_num').dataset.obNumber;
    var ob_number_array = last_ob_number.split('/');
    var num_to_increment = ob_number_array[2];
    var last_month = ob_number_array[1];
    var ob_month = monthPadding.substring(0, monthPadding.length - month.toString().length);

    var obNum = ob_month.toString()+''+month !== last_month.toString() ? 0 : parseInt(num_to_increment, 10) || 0;
    obNum++;

    var ob_string = numberPadding.substring(0, numberPadding.length - obNum.toString().length);
    var new_ob_number = '' + year + '/' + ob_month + '' + month + '/' + ob_string + '' + obNum;

    var ob_input_field = document.getElementById(elementId);
    ob_input_field.value = new_ob_number;
  };

</script>
</body>
</html>
