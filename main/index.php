<?php 
require_once "../admin/controllers/post_controller.php";
require_once "../admin/controllers/comments_controller.php";

require_once "header.php";
require_once "breaks.php";
$pendingP=$post_controller->get_ranking_post();
$lastC=$Comments_controller->get_last_Comments();

?>
<section>
<div class="container">
<!-- <div class="row">
  
<div class="col-md-10 col-lg-8 ">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-inline w-20 "  src="img/ads (26).jpg" alt="First slide">
        <img class="d-inline w-20 "  src="img/ads (16).jpg" alt="First slide">
        <img class="d-inline w-20 "  src="img/ads (20).jpg" alt="First slide">
      
      </div>
    
      <div class="carousel-item">
      <img class="d-inline w-20"  src="img/ads (26).jpg" alt="First slide">
        <img class="d-inline w-20  "  src="img/ads (26).jpg" alt="First slide">
        <img class="d-inline w-20 "  src="img/ads (26).jpg" alt="First slide">
      </div>
      <div class="carousel-item">
      <img class="d-inline w-20"  src="img/ads (20).jpg" alt="First slide">
        <img class="d-inline w-20  "  src="img/ads (20).jpg" alt="First slide">
        <img class="d-inline w-20 "  src="img/ads (20).jpg" alt="First slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <img src="img/download.png" class="img m-4" alt="">
  </div>
</div>
  <div class="col-md-10 col-lg-4 p-b-30">
  <div class="list-group mb-2">
    <a href="#" class="list-group-item active" style="background-color: #FFF; color:black; font-size:30px;" >Most popular</a>
    <a href="#" class="list-group-item "><span class="number">01</span>   Some quick example text to build on the card title and make up the bulk of the card's content.</a>
    <a href="#" class="list-group-item "><span class="number">02</span>   Some quick example text to build on the card title and make up the bulk of the card's content.</a>
    <a href="#" class="list-group-item "><span class="number">04</span>   Some quick example text to build on the card title and make up the bulk of the card's content.</a>
    <a href="#" class="list-group-item "><span class="number">05</span>   Some quick example text to build on the card title and make up the bulk of the card's content.</a>
  </div>
 
    </div>
</div> -->

</div>

</section>



</div>
<section>
  <div class="container-flauid ml-4 mr-4  ">
  <div class="row">
  <div class="col-lg-8 ">
  <?php 
     $cats=$category_controller->get_category();;
    //  print_r($cats);
    foreach($cats as $cat){
        $posts=$post_controller->get_FE_post($cat['cat_name']);
      
  ?>
    
        <h2 class="card-title"><?php echo $cat['cat_name']; ?></h2>
    <div class="row my-card mb-2 ml-0 mr-0 pt-4">
      <div class="col-lg-6">
    <?php
        for($i=0;$i<=1;$i++){
    ?><a href="post.php?id=<?php echo $posts[$i]['post_id']; ?>">
        <div class="row mb-4">
          <div class="col-lg-3 ">
            <img src="<?php echo "../admin/".$posts[$i]['post_img']; ?>" class="card-img-top" alt="...">
          </div>
          <div class="col-lg-9">
          <?php echo $posts[$i]['post_title']; ?>
          <div class="small text-gray-500 message-time text-date mt-2 " style="font-weight: 600 !important;color: #b7b9cc !important;" ><?php echo  $posts[$i]['create_date']?> </div>

          </div>
           </div>
        </a>
           <?php }?>
          </div>
          <div class="col-lg-6">
       <?php
        for($i=2;$i<=2;$i++){
    ?>
        <div class="row">
          <div class="col-lg-3 mb-3">
            <a href="post.php?id=<?php echo $posts[$i]['post_id']; ?>">
            <img src="<?php echo "../admin/".$posts[$i]['post_img']; ?>" class="card-img-top" alt="...">
          </div>
          <div class="col-lg-9 mb-3">
          <?php echo $posts[$i]['post_title']; ?>
          <div class="small text-gray-500 message-time text-date mt-2 " style="font-weight: 600 !important;color: #b7b9cc !important;" ><?php echo  $posts[$i]['create_date']?> </div>
        </a>
          </div>
           </div>
       </div>
       <?php }?>
    
  </div>
  <?php }?>
</div>

  <div class="col-lg-4">
   
  <div class="list-group mb-2 ">
  <h2 class=" card-title group-title "> Most Poupular</h2>  
  <?php
  $i=1;
  foreach($pendingP as $k=>$p){
    ?>
    <a href="post.php?id=<?php echo $p['post_id']?>" class="list-group-item ">
    <span class="number">0<?php echo $i?></span> 
    <?php echo $p['post_title']?>
  </a>
  <?php
  $i++;
}
?>
  </div>
  <div class="list-group mb-2 ">
  <h2 class=" card-title group-title "> Recent Comments</h2>  
     <?php  for($i=0;$i<=4;$i++){ ?>

    <a class="list-group-item " href="post.php?id=<?php echo $lastC['post_id']?>">
                      <div class="text-truncate font-weight-bold "><?php echo $lastC[$i]['comm_content'] ;?></div>
                      <div class="small text-gray-500 message-time text-date " style="font-weight: 600 !important;color: #b7b9cc !important;" ><?php echo $lastC[$i]['comm_date']?> </div>
                    </a>
  <?php
}
?>
  </div>
  <div class="list-group mb-2 ">
  <h2 class=" card-title group-title "> CATEGORIES</h2>  
         <?php 
                        $cats=$category_controller->get_category();;
                        foreach($cats as $cat){
                      ?>
        <a class="list-group-item cats " href="category.php?cat=<?php echo $cat['cat_name'] ?>"><?php echo $cat['cat_name'] ?></a>
        <?php
        }
        ?>
  </div>
  
 

    </div>
</div>

</div>

</section>
<div class="container-flauid ml-4 mr-4">
  <h2 class="card-title"> 
Last Article</h2>
  <div class="row pt-3 mr-0 ml-0" style="background-color: #fff;">
    <?php 
      $lasts=$post_controller->get_last_post();
      foreach($lasts as $last){
    ?>
    <div class="card col-lg-3  col-md-6  col-sm-12" style="border: none;" >
  <img src="<?php echo "../admin/".$last['post_img']; ?>" class="card-img-top" alt="...">
  <div>
  <h1 style="font-family: Roboto-Medium;
    font-size: 18px;
    line-height: 1.3;"><?php echo $last['post_title']; ?></h1>
  </div>
</div>
      <?php }?>


    </div>
 
  </div>
<?php require_once"footer.php" ?>