<?php

class Comments{

//comm_id	comm_content	comm_date	user_id	comm_status	post_id	approv_by

    const SELECTALL="SELECT * FROM comments ORDER BY comm_id DESC ";

   
    const SELECTCOMMPOST="select comm_id,comm_content,comm_date,comments.user_id,user_full_name from comments,users where users.user_id=comments.user_id and comm_status=1 and post_id=?";

    const SELECTCOMMENT="select * from comments where comm_id =? " ;


    const SELECTPENDINGCOMMENT="select count(comm_id) from comments where comm_status =-1 " ;
    

    const ADDCOMMENT="insert INTO comments(comm_content,user_id,post_id)
                    VALUES (?,?,?)";
                    
    const EDITCOMMENT="UPDATE comments SET comm_content=? WHERE comm_id=?";

    const DELETECOMMENT="update comments SET comm_status =?   WHERE comm_id =? ";


    const DELETEMULTIPLE="delete FROM comments WHERE comm_id in(?)";

}

?>