<?php 
require_once "../admin/controllers/post_controller.php";
require_once "../admin/controllers/comments_controller.php";
require_once "header.php";
$data=$post_controller->get_one($_GET['id']);
$post_controller->update_visit($_GET['id']);
$comments=$Comments_controller->get_Post_Comments($_GET['id']);


require_once "../admin/controllers/comments_controller.php";

require_once "breaks.php";
$pendingP=$post_controller->get_ranking_post();
$lastC=$Comments_controller->get_last_Comments();

?>

<section>
<div class="container-flauid ml-4 mr-4">
<div class="row">
  <div class="col-lg-8 p-4" style="background:#fff; " >
  <h1 style="font-family: Roboto-Medium;
    font-size: 30px;
    line-height: 1.3;"><?php echo $data[0]['post_title']; ?></h1>
    <span style="font-family: Roboto-Bold;
    font-size: 12px;
    line-height: 1.7; color: #888;">
    By Hopes news - <?php echo $data[0]['create_date']; ?>      4 comments
      </span>
      <img src=<?php echo "../admin/".$data[0]['post_img']; ?> class="img-fluid mt-4" alt="">
      <p  class="mt-4 "  style="line-height: 1.7; 
    color: gray;
    font-weight: 300;">
   <?php echo $data[0]['post_content']; ?>
    </p>
    <div class="mt-5">
								<span class="mr-3">
									Tags:
								</span>
								
								<span >
									<a href="#" class="ml-3">
										Streetstyle
									</a>

									<a href="#" class="ml-3">
										Crafts
									</a>
								</span>
							
     </div>
     <h2 style="font-family: Roboto-Medium;
    font-size: 30px;
    line-height: 1.3;" class="mt-4">Comments</h2>
    <div class="comments  mt-0 mr-5 ml-5">
      <?php
      if(is_array($comments))
        foreach($comments as $comm){?>
        <div  class="comm" >
          <h3 style="font-size: 1.75rem;" ><?php echo $comm['user_full_name']; ?></h3>
          <span  style="text-transform: uppercase;
    font-size: 13px;
    letter-spacing: .1em;
    color: #ccc;
"><?php echo $comm['comm_date']; ?></span>
          <p style="line-height: 1.7; 
    color: gray;
    font-weight: 300;"><?php echo $comm['comm_content']; ?>
     </div>
      <?php }
      else
          echo' <p style="line-height: 1.7; 
          color: gray;
          font-weight: 300;">No comment Yet </p>';
      ?>
        <?php if(isset($_SESSION['id'])){ ?>
        <div  class="comm" class="p-5">
          <h3 style="font-size: 1.75rem;" >Leave a comment</h3>
        <form action="#" id="comm_form" >
          <input type="hidden" name="type" value="2">
          <input type="hidden" name="postId" value="<?php echo $_GET['id'] ?>">
          <input type="hidden" name="userId" value="<?php echo $_SESSION['id'] ?>">
                        <!-- <div class="form-group">
                          <label for="name">Name *</label>
                          <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email *</label>
                          <input type="email" class="form-control" id="email">
                        </div>
                       
       -->
                        <div class="form-group">
                          <label for="message">comment</label>
                          <textarea name="comment" id="comment"  cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        
                      </form>
                          <div class="form-group">
                            <input type="submit" value="Post Comment" id="btn-comm" class="btn btn-dark py-3">
                          </div>
        </div>
        <?php } ?>

    </div>
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

</div>

</section>




<?php require_once"footer.php" ?>