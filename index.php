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

require "auth/config.php";
$sql = "SELECT * FROM thread WHERE 1 ORDER BY dateOfCreation DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
    echo'<div class="card px-0">
        <div class="row card-body py-0">
            <div class="vote-col" style=";">
                <div class="up"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                <div class="vote">0</div>
                <div class="down"><i class="fa fa-arrow-down" aria-hidden="true"></i></div>
            </div>
            <div class="data-col pr-0 pb-0">   
                <h5 class="card-title">'.$row['title'].'</h5>
                <p class="card-text">'.$row['body'].'</p>
                <div class="card-footer">
                <span><i class="fa fa-comment" aria-hidden="true"> 0</i></span>    
            </div>
        </div>
    </div>
</div>';
}

?>

</div>

