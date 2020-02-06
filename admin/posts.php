<?php 
require "header.php";
require "fixedBar.php";
require "topBar.php";
?>

        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
       
          <!-- Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                  
                <div class="card-header py-3 d-flex flex-row  ">
               
                </div>
                
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead >
                      <tr>
                        <th><?php echo lang('th0'); ?></th>
                        <th><?php echo lang('th1'); ?></th>
                        <th><?php echo lang('th2'); ?></th>
                        <!-- <th><?php echo lang('th3'); ?></th> -->
                        <!-- <th><?php echo lang('th4'); ?></th> -->
                        <th><?php echo lang('th5'); ?></th>
                        <th><?php echo lang('th6'); ?></th>
                        <th><?php echo lang('th7'); ?></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th><?php echo lang('th0'); ?></th>
                        <th><?php echo lang('th1'); ?></th>
                        <th><?php echo lang('th2'); ?></th>
                        <!-- <th><?php echo lang('th3'); ?></th> -->
                        <!-- <th><?php echo lang('th4'); ?></th> -->
                        <th><?php echo lang('th5'); ?></th>
                        <th><?php echo lang('th6'); ?></th>
                        <th><?php echo lang('th7'); ?></th>
                      </tr>
                    </tfoot>
                    <tbody id="post-body" >
                                   
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div> 
        </div>





<div class="modal fade" id="history_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong><?php echo lang('cm4'); ?></strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
        <dl class="row">
          <table class="table">
             <thead>
               <tr>
                <th scope="col">BY</th>
                <th scope="col">Affected</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
          <tbody id="history_body">
    
          </tbody>
          </table>
        </dl>
              
            </div>
        </div>
    </div>
</div>


<!-- Delete Modal HTML -->

  <div class="modal fade" id="deletePost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong><?php echo lang('m2'); ?></strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
      <input type="hidden" id="id_d" name="id" class="form-control">					
            <input type="hidden" id="state_d" name="state" class="form-control">				
            
        <form id="update_post" >
          <div class="row">
          <input type="hidden" id="id_d" name="id" class="form-control">					
						<input type="hidden" id="state_d" name="state" class="form-control">					
						<p><?php echo lang('m2content'); ?></p>
                 
                    <div class="modal-footer">
					             <input type="hidden" value="3" name="type">
						           <button type="button" class="btn btn-secondary" id="delete"><?php echo lang('m2o1'); ?></button>
						           <input type="button" class="btn btn-default" data-dismiss="modal" value="<?php echo lang('m2o2'); ?>">
					          </div>
                    <hr>
         </form>
      </div>
        </div>
    </div>
  </div>
</div>




<?php  require "footer.php"; ?>


<script>  
  $(document).ready(function(){  
      	load_data();
  });  

  $(document).on("click", ".delete", function() { 
    var id=$(this).attr("data-id");
    var state=$(this).attr("data-state");
    alert(id);
    $('#id_d').val(id);
    $('#state_d').val(state);
  });

  $(document).on("click", "#delete", function() { 
    $.ajax({
        url: "controllers/post_controller.php",
        type: "POST",
        cache: false,
        data:{
            type:4,
            id: $("#id_d").val(),
            state:$('#state_d').val(),
            
        },
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
                $('#deletePost').modal('hide');
                sucMsg("post disabled successfully");
                load_data()						
            }
            else if(dataResult.statusCode==201){
               alert(dataResult);
            }
    }
    });
  });

  $(document).on("click", ".history", function() { 
    
          var updates=$(this).attr("data-updates");
          var upobject=JSON.parse(updates);
          var dat=''
      $.each(upobject, function( index, row ) {
            // $.each(value, function( i, row ) {
          
            dat+="<tr>"+
            // "<td>"+index+"</td>"+
            "<td>"+row.by+"</td>"+
            "<td>"+row.affected_data+"</td>"+
            "<td>"+row.date+"</td>"+
            "</tr>";
          // });
        });
        // alert(dat);
          $("#history_body").html(dat);
          $('#history_model').modal('show');
            
  });

function load_data(){
		$.ajax({
			url:"controllers/post_controller.php",
			method:"POST",
      data:{type:"1"},
			success:function(data)
			{

        var posts=JSON.parse(data);
        var tr='';
				$.each(posts, function( index, row ) {
                      tr+="<tr>"+
                  "<td>"+ (parseInt(index)+1) +"</td>"+
                  "<td>"+row.post_title+"</td>"+
                  "<td>"+row.cat_name+"</td>"+
                  "<td>"+row.create_by+"</td><td>"+
                  (row.post_status==1?'active':'unActive')+
                  "</td><td>"+
                  "<a href='updatePost.php?id="+row.post_id+"' class='update'>"+
                        "<i class='fas  fa-edit text-secondary' title='Edit'></i></a>"+
                  "<a href='#deletePost' data-toggle='modal' class='delete m-2' data-id='"+row.post_id+"' data-state='"+
                  (row.post_status==1?-1:1)+
                  "'>"+
                  "<i class='"+
                  (row.post_status==1?"fas fa-trash":"fas fa-check-square")+
                 "' style='color:darkslateblue;' data-toggle='tooltip'  title='"+
                  (row.post_status==1?"Active":"unActive")+
                  "'></i></a>"+
                  "<a class='history' data-updates='"+row.updates+"'>"+
                  "<i class='fas  fas fa-history ' data-toggle='tooltip' style='color:darkslategrey;'	title='details'></i>"+
                  "</a>"+
                  "<a href='../main/post.php?id="+row.post_id+"' class='more m-1'>"+
                        "<i class='fas  fa-bookmark text-secondary' title='details'></i></a>"+
                  "</a></td></tr>";
           });
                  $('#post-body').html(tr);
			}
		       });
}

</script>
    