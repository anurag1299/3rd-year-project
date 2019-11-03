


    <?php
    require "navbar.php"
    ?>
    
        <div class="row">
            <!-- left side -->
            <div class="lt col-9  ml-5 mr-0 my-4 px-0 py-0">
                <?php 
                require "auth/config.php";
                $sql = "select * from thread where creatorId='".$_SESSION['id']."'";
                $results = $conn->query($sql);
                
                if($results->num_rows > 0)
                {
                    
                    while($row = $results->fetch_assoc())
                    {
                        $sqlcheck = "SELECT * FROM voting WHERE tid=".$row['tid']." AND uid=".$_SESSION['id'].";";
                        $resultcheck = $conn->query($sqlcheck);
                        $rowcheck = $resultcheck->fetch_assoc();
                        $Aprclass = null;
                        $upclass=null;
                        $downclass=null;
                        if($row['status']==1)
                        {
                            $Aprclass = "approve-post";
                        }
                        else{
                            $Aprclass = "approved-post";
                        }
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


                        echo'<div class="row mypost">
                                <div class="vote-col">
                                    <div id="u'.$row['tid'].'" class="'.$upclass.'" onClick="upvote('.$row['tid'].')"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                                    <div id="v'.$row['tid'].'" class="vote">'.$row['vote'].'</div>
                                    <div id="d'.$row['tid'].'" class="'.$downclass.'" onClick="downvote('.$row['tid'].')"><i class="fa fa-arrow-down" aria-hidden="true"></i></div>
                                </div>
                                <div class="data-col pl-0 pr-0 pb-0">
                                    <div class="px-3">
                                    <h5>'.$row['title'].'</h5>
                                    <div>'.$row['body'].'</div>
                                    </div>
                                    <div class="icons card-footer">
                                    <span><i class="fa fa-comment" aria-hidden="true"> 0</i></span>
                                    <span id="'.$row['tid'].'" class="'.$Aprclass.'" style="padding-left:10px;" onClick="approvePost('.$row['tid'].')"><i class="fa fa-check" aria-hidden="true"> Approve</i></span>
                                    <span class="delete-post" style="padding-left:10px; cursor:pointer;" onClick="deletePost('.$row['tid'].')"><i class="fa fa-trash" aria-hidden="true"> Remove</i></span>
                                    </div>
                                </div>
                            </div>';
                    }
                }
                else
                {
                    echo"<div class='container text-center'><span>You haven't posted anything yet</span></div>";
                }
                ?>

            </div>
            <!-- right side -->
            <div class="rt col-2  ml-5 mr-0 my-4 px-0 py-0">
                
                    <div class="profile-box">
                        <img class="dp" src="assets/profile.jpg" alt="">
                        <!-- banner -->
                        <div class="back"></div>
                        <!-- spacing -->
                        <div style="height:25px;"></div>
                        <!-- data area -->
                        <div class="data"> 
                            <?php echo "u/".$_SESSION['username']."<br>"?>
                            <form action="create.php">
                            <button type="submit" class="btn btn-primary btn-block">New Post</button>
                            </form>
                        </div>
                    </div>
                
                
                    <div class="container mt-4">
                    
                    <a class="btn btn-primary btn-block mt-3" href="content.php">What to Follow</a>
                    </div>
                    <button class="btn btn-primary "  id="toTop" >Back to Top</button> 
                
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
    