<?php

class Users{
    // (user_full_name , user_pass , user_email , user_phone ,register_date ,user_status ,user_group_id ,activiate_by )

    const SELECTALL="select * from users";

    const SELECTONE="select * from users where user_email=?";


    const ADDUSER="insert INTO users(user_full_name,user_pass,user_email)
                     VALUES (?,?,?)";
                    
    const SELECTPENDINGUSERS="select count(user_id) as pending from users where user_status =-1 " ;


    const EDITUSERPRI="update users SET user_group_id=?  WHERE user_id=? ";

    const DELETEUSER="update users SET user_status=? WHERE user_id=? ";

    const DELETEMULTIPLE="delete FROM users WHERE user_id in(?)";

}