<?php 
    require_once "../admin/controllers/breakN_controller.php";
    $breaks=$BreakNews_controller->get_FE_BreakNews();
    $i=0;
    ?>
    <section id="breaking News">
    <div class="sitewidth">
    <div class="br-title">v</div>
    <marquee>

        <?php foreach($breaks as $break){
            $i++;
           echo'<span class="step">'.$i.'</span>';
            ?>

            

            <span style="    font-size: 15px;
    line-height: 1.7; color: #000;
    margin-right:30px;">
   <?php echo $break['break_content'];?>
      </span>
    <?php    }
    ?>
    </marquee>
    </div>
    </section>
