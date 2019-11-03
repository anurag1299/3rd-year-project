<?php
require "navbar.php"
?>

<div class="container py-5 px-5">
    
    <!-- <div class="card">
        <div class="row card-body py-0">
            <div class="vote-col" style=";">
                <div class="up"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                <div class="vote">0</div>
                <div class="down"><i class="fa fa-arrow-down" aria-hidden="true"></i></div>
            </div>
            <div class="data-col">   
                <h5 class="card-title">thread heading</h5>
                <p class="card-text">test</p>
                <div class="card-footer">
                <span><i class="fa fa-comment" aria-hidden="true"> 0</i></span>    
            </div>
        </div>
    </div>
</div> -->

<?php

if(isset($_SESSION['id'])){
require "auth/config.php";
$sql = "SELECT * FROM thread WHERE 1 ORDER BY dateOfCreation DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
    $sqlcheck = "SELECT * FROM voting WHERE tid=".$row['tid']." AND uid=".$_SESSION['id'].";";
    $resultcheck = $conn->query($sqlcheck);
    $rowcheck = $resultcheck->fetch_assoc();
    
    $upclass=null;
    $downclass=null;
    
    if($rowcheck['upvoted']==1)
    {
        $upclass="upped";
        $downclass="down";
    }
    else if($rowcheck['downvoted']==1)
    {
        $upclass="up";
        $downclass="downed";
    }
    else{
        $upclass="up";
        $downclass="down";
    }


    echo'<div class=" px-0">
        <div class="row  py-0" style="border:1px solid rgb(206, 206, 206);">
            <div class="vote-col" style="border-right:1px solid rgb(206, 206, 206);">
                <div id="u'.$row['tid'].'" class="'.$upclass.'" onClick="upvote('.$row['tid'].')"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                <div id="v'.$row['tid'].'" class="vote">'.$row['vote'].'</div>
                <div id="d'.$row['tid'].'" class="'.$downclass.'" onClick="downvote('.$row['tid'].')"><i class="fa fa-arrow-down" aria-hidden="true"></i></div>
            </div>
            <div class="data-col px-0 pb-0">   
                <div class="pl-3">
                <h5 class="card-title">'.$row['title'].'</h5>
                <p class="card-text">'.$row['body'].'</p>
                </div>
                <div class="card-footer">
                <span><i class="fa fa-comment" aria-hidden="true"> 0</i></span>    
                </div>
            </div>
        </div>
</div>';
}
}else{
    require "auth/config.php";
    $sql = "SELECT * FROM thread WHERE 1 ORDER BY dateOfCreation DESC";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
{
    


    echo'<div class=" px-0">
        <div class="row  py-0" style="border:1px solid rgb(206, 206, 206);">
            <div class="vote-col" style="border-right:1px solid rgb(206, 206, 206);">
                <div id="up" class="up" data-toggle="modal" data-target="#loginModalCenter"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                <div id="vote" class="vote">'.$row['vote'].'</div>
                <div id="down" class="down" data-toggle="modal" data-target="#loginModalCenter"><i class="fa fa-arrow-down" aria-hidden="true"></i></div>
            </div>
            <div class="data-col px-0 pb-0">   
                <div class="pl-3">
                <h5 class="card-title">'.$row['title'].'</h5>
                <p class="card-text">'.$row['body'].'</p>
                </div>
                <div class="card-footer">
                <span><i class="fa fa-comment" aria-hidden="true"> 0</i></span>    
                </div>
            </div>
        </div>
</div>';
}
}

?>

</div>

