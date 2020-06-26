<style>
    .sidebar-menu > li{
        color: #f9fafc;
        font-weight: normal;
    }
    .sidebar-menu>li.ca_menu > a {
        padding: 7px 20px;
    }

    .sidebar-menu>li.ca_submenu > a {
        padding: 7px 20px;
        margin-left: 12px;
    }
</style>
<script>

    function menuClick(val) {
        $(".sidebar-form").attr("action", "/"+val);
        $.blockUI({ css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#fff',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#000'
            } });
        $(".sidebar-form").submit();
    }
    function topItemClick(val) {
        $('#topItem').val(val);
        $.blockUI({ css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#fff',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#000'
            } });
        $('.sidebar-form').submit();
    }

    function subItemClick(valtop, valsub) {
        $('#topItem').val(valtop);
        $('#subItem').val(valsub);
        $.blockUI({ css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#fff',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#000'
            } });
        $('.sidebar-form').submit();
    }

    function subsubItemClick(valtop, valsub, valsubsub) {
        $('#topItem').val(valtop);
        $('#subItem').val(valsub);
        $('#subsubItem').val(valsubsub);
        $.blockUI({ css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#fff',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#000'
            } });
        $('.sidebar-form').submit();
    }

</script>
<ul class="sidebar-menu overflow-auto" data-widget="tree"  style="overflow-wrap: normal;">
    <li class="header">ReservationSetting</li>
    <li <?php echo ($page->menu=='reservation')?'class="active"':'' ?>>
        <a href="javascript:menuClick('reservation')">
            <i class="fa fa-cogs""></i> <span>KeywordsReservation</span>
        </a>
    </li>
    <br>
    <li class="header">DataViewMode</li>
        <li <?php echo ($page->menu=='main')?'class="active"':'' ?>>
            <a href="javascript:menuClick('main')">
                <i class="fa fa-table""></i> <span>MainMode</span>
            </a>
        </li>
    <br>

 <?php
 if($page->menu == "main" && $page->keywordId == '4564564564654'){
 ?>
    <li class="header">Categories</li>
     <?php
     if($page->topItem)
     {
    ?>
         <li class="ca_menu">
             <a href="javascript:topItemClick('')">
                 <i class="fa fa-minus-square-o"></i> <span><?php echo $page->topItem ?></span>
             </a>
         <?php
         if($page->subItem)
         {
             $dis_sub = explode(" > ", $page->subItem);
             ?>
             <li class="ca_submenu">
                 <a href="javascript:subItemClick('<?php echo $page->topItem ?>', '')">
                     <i class="fa fa-minus-square-o"></i> <span><?php echo $dis_sub[1] ?></span>
                 </a>
                 <?php
                    if($category_data['subsubCategory'])
                    {
                        foreach ($category_data['subsubCategory'] as $subsubItem)
                        {
                            $dis_subsub = explode(" > ", $subsubItem);
                            if($page->subItem == $dis_subsub[0]." > ".$dis_subsub[1])
                            {
                                $subsub = $subsubItem;
                                if($page->subsubItem == $subsubItem)$subsub='';
                                ?>
                                <li class="ca_submenu">
                                    <a href="javascript:subsubItemClick('<?php echo $page->topItem;?>',
                                                '<?php echo $page->subItem;?>','<?php echo $subsub;?>')">
                                        <i  class="fa <?php echo ($page->subsubItem == $subsubItem) ? 'fa-check-circle-o' : '' ?>"></i> <span><?php echo $dis_subsub[2] ?></span>
                                    </a>
                                </li>
                          <?php
                            }
                        }
                    }
                 ?>

             </li>
         <?php
         }
         else if($category_data['subCategory']) {
             foreach ($category_data['subCategory'] as $subItem) {
                 $dis_sub = explode(" > ", $subItem);
                 if ($page->topItem == $dis_sub[0]) {
                     ?>
                     <li class="ca_submenu <?php echo ($page->subItem == $subItem) ? ' active' : '' ?>">
                         <a href="javascript:subItemClick('<?php echo $page->topItem ?>', '<?php echo $subItem ?>')">
                             <i class="fa fa-plus-square-o"></i> <span><?php echo $dis_sub[1] ?></span>
                         </a>
                     </li>
                     <?php
                 }
             }
         }
         ?>
         </li>
    <?php
     }
     else if($category_data['topCategory']){
         foreach ($category_data['topCategory'] as $topItem) {
             ?>
             <li class="ca_menu">
                 <a href="javascript:topItemClick('<?php echo $topItem?>')">
                     <i class="fa fa-plus-square-o"></i> <span><?php echo $topItem ?></span>
                 </a>
             </li>
             <?php
         }
     }
     ?>
 <?php
 }
 ?>
    <!--
    <li class="header">admin_panel</li>
    <li <?php //echo ($page->menu=='loadFromApi')?'class="active ca_menu"':'ca_menu' ?>>
        <a href="<?php //echo url('/loadCountry/loadFromApi') ?>">
            <i class="fa fa-child"></i> <span>LoadCountry</span>        </a>
    </li>-->
</ul>