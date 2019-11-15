<?php
require "navbar.php"
?>

<div class="container py-5 ">
    <div class=row>
        <div class="col-8">
            <?php
                // login following
                if(isset($_SESSION['id'])){
                    require "auth/config.php";
                    $sql = "SELECT * FROM thread NATURAL JOIN (SELECT follow as categoryId FROM pivot WHERE uid=".$_SESSION['id'].") as T ORDER BY dateOfCreation DESC";
                    $result = $conn->query($sql);
                    if($result->num_rows>0)
                    {
                        while($row = $result->fetch_assoc())
                        {
                            $sqlPoster = "SELECT username FROM user WHERE uid=".$row['creatorId'];
                            $resultPoster = $conn->query($sqlPoster);
                            $poster = $resultPoster->fetch_assoc();



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


                            echo'<div class=" px-0 py-1">
                                <div class="row  " style="border:1px solid rgb(206, 206, 206);">
                                    <div class="vote-col pl-1" style="border-right:1px solid rgb(206, 206, 206);">
                                        <div id="u'.$row['tid'].'" class="'.$upclass.'" onClick="upvote('.$row['tid'].')"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                                        <div id="v'.$row['tid'].'" class="vote p-1">'.$row['vote'].'</div>
                                        <div id="d'.$row['tid'].'" class="'.$downclass.'" onClick="downvote('.$row['tid'].')"><i class="fa fa-arrow-down" aria-hidden="true"></i></div>
                                    </div>
                                    <div class="data-col px-0 pb-0">   
                                        <div class="pl-3">
                                        Posted by u/'.$poster['username'].'
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
                    // login but not following
                    else
                    {
                    $sql = "SELECT * FROM thread WHERE 1 ORDER BY dateOfCreation DESC";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                        $sqlPoster = "SELECT username FROM user WHERE uid=".$row['creatorId'];
                            $resultPoster = $conn->query($sqlPoster);
                            $poster = $resultPoster->fetch_assoc();

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
                        
                        echo'<div class=" px-0 py-1">
                            <div class="row  " style="border:1px solid rgb(206, 206, 206);">
                                <div class="vote-col pl-1" style="border-right:1px solid rgb(206, 206, 206);">
                                Posted by u/'.$poster['username'].'
                                <div id="u'.$row['tid'].'" class="'.$upclass.'" onClick="upvote('.$row['tid'].')"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                                <div id="v'.$row['tid'].'" class="vote p-1">'.$row['vote'].'</div>
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
                    }
                }
                // not login
                else{
                    require "auth/config.php";
                    $sql = "SELECT * FROM thread WHERE 1 ORDER BY dateOfCreation DESC";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc())

                {

                    $sqlPoster = "SELECT username FROM user WHERE uid=".$row['creatorId'];
                            $resultPoster = $conn->query($sqlPoster);
                            $poster = $resultPoster->fetch_assoc();
                    


                    echo'<div class=" px-0 py-1">
                        <div class="row  " style="border:1px solid rgb(206, 206, 206);">
                            <div class="vote-col pl-1" style="border-right:1px solid rgb(206, 206, 206);">
                                <div id="up" class="up" data-toggle="modal" data-target="#loginModalCenter"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                                <div id="vote" class="vote p-1">'.$row['vote'].'</div>
                                <div id="down" class="down" data-toggle="modal" data-target="#loginModalCenter"><i class="fa fa-arrow-down" aria-hidden="true"></i></div>
                            </div>
                            <div class="data-col px-0 pb-0">   
                                <div class="pl-3">
                                Posted by u/'.$poster['username'].'
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
        <div class="rt col-3  ml-5 mr-0 my-0 px-0 py-2">
                <div class="guidelines">
                    <h5>Today's Top Growing Topics</h5>
                    <?php
                        $sql ="SELECT T.cat_id,T.cat_title,T.count,COUNT(D.dateOfCreation) as today from (SELECT cat_id,cat_title,count(categoryId) as count from category LEFT JOIN thread ON cat_id = categoryId GROUP by cat_title ORDER BY count DESC) T LEFT JOIN (SELECT categoryId,dateOfCreation FROM thread where dateOfCreation = CURDATE()) D ON T.cat_id = D.categoryId GROUP BY T.cat_title ORDER BY today DESC";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc() )
                        {
                            if($row['today']>0)
                            {
                            echo"<li>".$row['cat_title']."</li>
                                <hr>";
                            }
                        }
                    
                    ?>
                    <a class="btn btn-primary btn-block mt-3" data-toggle="modal" data-target="#loginModalCenter">View All</a>
                </div>
                <button class="btn btn-primary "  id="toTop" >Back to Top</button>
        </div>
    </div>

</div>

<script>

            $(window).scroll(function() {
                if ($(this).scrollTop()) {
                    $('#toTop').fadeIn();
                } else {
                    $('#toTop').fadeOut();
                }
            });

            $("#toTop").click(function () {
            $("html, body").animate({scrollTop: 0}, 1000);
            });


            


        </script>