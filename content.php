<?php
require "navbar.php";
require "auth/config.php";
?>

<div class="container">
<table id="contents" class="display datatable">
    <thead>
        <tr>
            <th>Category</th>
            <th>No. of Threads</th>
            <th>Asked Today</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $sql ="SELECT T.cat_id,T.cat_title,T.count,COUNT(D.dateOfCreation) as today from (SELECT cat_id,cat_title,count(categoryId) as count from category LEFT JOIN thread ON cat_id = categoryId GROUP by cat_title ORDER BY count DESC) T LEFT JOIN (SELECT categoryId,dateOfCreation FROM thread where dateOfCreation = CURDATE()) D ON T.cat_id = D.categoryId GROUP BY T.cat_title ORDER BY T.count DESC";
        $result = $conn->query($sql);
        $sql1 ="SELECT follow from `pivot` where uid=".$_SESSION['id'];
        $result1 = $conn->query($sql1);
        $follow = [];
        while($row1 = mysqli_fetch_array($result1))
        {$follow[] = $row1['follow'];}

        //$follow[] = $row1;
        //print_r($follow);
       // echo "<script>console.log(".$row1[0].");</script>";
        while($row = $result->fetch_assoc())
        {
            // echo "<script>console.log(".in_array($row['cat_id'],$row1,TRUE).");</script>";
            $class="btn-primary";
            $text="Follow";
            // $result1 = $conn->query($sql);
            // // $c = mysqli_num_rows($result1);
            // while($row1 = $result1->fetch_assoc())
            // {
                if(in_array($row['cat_id'],$follow))
                {
                    $class="btn-outline-primary";
                    $text="Following";

                }
                else{
                    $class="btn-primary";
                }
            //     //$c--;
            // }


            echo '<tr>
                  <td>'.$row['cat_title'].'</td>
                  <td>'.$row['count'].'</td>
                  <td>'.$row['today'].'</td>
                  <td><button id="'.$row['cat_id'].'" class="btn btn-block '.$class.'" onClick="follow('.$row['cat_id'].')">'.$text.'</button></td>
                  <tr>';
        }

        ?>
        
    </tbody>
    <tfoot>
        <tr>
            <th>Category</th>
            <th>No. of Threads</th>
            <th>Asked Today</th>
            <th>Status</th>
        </tr>
    </tfoot>
</table>
</div>


<script>

// $( function () {
//     $('#contents').DataTable();
// } );


function follow(cat_id){
    console.log("here"+cat_id);
    $.ajax({
        url: 'follow.php',
        type: 'post',
        data: {cat_id:cat_id},
        success: function(responce){
           // console.log("here"+cat_id);
            if($("#" + cat_id).attr("class")=="btn btn-block btn-primary")
            {
            $("#"+cat_id).addClass('btn-outline-primary');
            $("#"+cat_id).removeClass('btn-primary');
            $("#"+cat_id).html('Following');
            console.log("here"+cat_id);
            }
            else if($("#" + cat_id).attr("class")=="btn btn-block btn-outline-primary")
            {
                $("#"+cat_id).addClass('btn-primary');
                $("#"+cat_id).removeClass('btn-outline-primary');
                $("#"+cat_id).html('Follow');
                console.log("here"+cat_id);
            }
           // console.log("here"+cat_id);
        }

    });
}

</script>