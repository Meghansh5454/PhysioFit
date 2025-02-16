<?php include("config.php") ?>
<?php
function get_user_data($user_id,$type = 'object')
{
    global $db_conn;
    $query = mysqli_query($db_conn,"SELECT * FROM signup WHERE id = $user_id");
    return data_output($query , $type);
}
function get_users($args = array(),$type ='object')
{
    global $db_conn;
    $condition = "";
    if(!empty($args))
    {
        foreach($args as $k => $v)
        {
            $v = (string)$v;
            $condition_ar[] = "$k = '$v'";
        }
        if ($condition_ar > 0) {
            $condition = "WHERE " . implode(" AND ", $condition_ar);
        }
        
    }
    $query = mysqli_query($db_conn,"SELECT * FROM signup $condition");
    return ($type);
}?>