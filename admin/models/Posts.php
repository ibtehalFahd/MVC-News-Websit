<?php
class Posts{

    const SELECTALL="SELECT post_id, post_title, post_intro, post_content, post_img, post_status,
                     cat_name, posts.create_by, posts.create_date, posts.updates, publish_date
                      FROM posts,categories WHERE posts.cat_id=categories.cat_id";


    const SELECTALLFE="SELECT post_id, post_title, post_intro, post_content, post_img, post_status,
    cat_name, posts.create_by, posts.create_date, posts.updates, publish_date
     FROM posts,categories WHERE posts.cat_id=categories.cat_id and categories.cat_name=? ";


    const SELECTLastFE="SELECT post_id, post_title, post_intro, post_content, post_img, post_status,
    cat_name, posts.create_by, posts.create_date, posts.updates, publish_date
    FROM posts,categories WHERE posts.cat_id=categories.cat_id ORDER BY posts.post_id DESC limit 4 ";


    
    const RankingPOST="select post_id,visits,post_title from posts order by visits Desc limit 5 " ;

    const ADDPOST="insert INTO posts(post_title, post_intro, post_content, post_img, cat_id, publish_date)
                     VALUES (?,?,?,?,?,?)";


    const SELECTPOST="select * from posts where post_id =? " ;

    const UPATES="update posts set updates=? where post_id =?  ";


    const GETUPATES="select updates from posts where post_id =?  ";

    const SELECTCATEGORIES="select * from categories " ;
               
    const EDITPOSTWIMG="UPDATE posts SET post_title=?,post_intro=?,Post_content=?,post_img=?,cat_id=?,
                        publish_date=?, updates=? WHERE post_id=?";


    const EDITPOST="UPDATE posts SET post_title=?,post_intro=?,Post_content=?,cat_id=?,
                    publish_date=?,updates=? WHERE post_id=?";

    const DELETEPOST="update posts SET post_status =?  WHERE post_id =? ";


    const UPDATEVISIT="update posts SET visits =?  WHERE post_id =? ";

    const SELECTVISIT="select  visits from posts  WHERE post_id =? ";


    const DELETEMULTIPLE="delete FROM posts WHERE post_id in(?)";  
}
?>