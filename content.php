<?php
require "navbar.php";
require "auth/config.php";
?>

<div class="container">
<table id="contents" class="display">
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

        $sql ="SELECT T.cat_id,T.cat_title,T.count,COUNT(D.dateOfCreation) as today from (SELECT cat_id,cat_title,count(categoryId) as count from category LEFT JOIN thread ON cat_id = categoryId GROUP by cat_title ORDER BY count DESC) T LEFT JOIN (SELECT categoryId,dateOfCreation FROM thread where dateOfCreation = CURDATE()) D ON T.cat_id = D.categoryId GROUP BY T.cat_title";
        $result = $conn->query($sql);
        $sql1 ="SELECT follow from pivot where uid=".$_SESSION['id'];
        
        //$row1 = mysqli_fetch_array($result1,MYSQLI_NUM);
       // echo "<script>console.log(".$row1[0].");</script>";
        while($row = $result->fetch_assoc())
        {
            // echo "<script>console.log(".in_array($row['cat_id'],$row1,TRUE).");</script>";
            $class="btn-primary";
            // $result1 = $conn->query($sql);
            // // $c = mysqli_num_rows($result1);
            // while($row1 = $result1->fetch_assoc())
            // {
            //     if($row['cat_id']===$row1['follow'])
            //     {
            //         $class="btn-outline-primary";
            //     }
            //     else{
            //         $class="btn-primary";
            //     }
            //     //$c--;
            // }


            echo '<tr>
                  <td>'.$row['cat_title'].'</td>
                  <td>'.$row['count'].'</td>
                  <td>'.$row['today'].'</td>
                  <td><button id="'.$row['cat_id'].'" class="btn '.$class.'">Follow</button></td>
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

$( function () {
    $('#contents').DataTable();
} );

</script>