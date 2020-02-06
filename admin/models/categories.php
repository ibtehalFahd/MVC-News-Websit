<?php

class Categories{

    const SELECTALLACTVE="select * from categories where cat_status=1";

    const SELECTALLTRASH="select * from categories where cat_status=-1";

    const SELECTNAME="select cat_name,cat_id from categories where parent=0";

    const ADDCATEGORY="insert INTO categories(cat_name,create_by, parent)
                         VALUES (?,?,?)";
    
    const SELECTCATEGORY="select * from categories where cat_id =? " ;

                    
    const EDITCATEGORY="UPDATE categories SET cat_name=?,parent=? WHERE cat_id=?";


    const UPATES="update categories set updates=? where cat_id =?  ";


    const DELETECATEGORY="update categories SET cat_status =?  WHERE cat_id =? ";
    

    const GETUPATES="select updates from categories where cat_id =?  ";


    const DELETEMULTIPLE="delete FROM categories WHERE cat_id in(?)";

}

?>