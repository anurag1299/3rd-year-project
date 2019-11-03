


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
                        $class = null;
                        if($row['status']==1)
                        {
                            $class = "approve-post";
                        }
                        else{
                            $class = "approved-post";
                        }

                        echo'<div class="row mypost">
                                <div class="vote-col">
                                    <div class="up"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                                    <div class="vote">'.$row['vote'].'</div>
                                    <div class="down"><i class="fa fa-arrow-down" aria-hidden="true"></i></div>
                                </div>
                                <div class="data-col">
                                    <h5>'.$row['title'].'</h5>
                                    <div>'.$row['body'].'</div>
                                    <div class="icons">
                                    <span><i class="fa fa-comment" aria-hidden="true"> 0</i></span>
                                    <span id="'.$row['tid'].'" class="'.$class.'" style="padding-left:10px;" onClick="approvePost('.$row['tid'].')"><i class="fa fa-check" aria-hidden="true"> Approve</i></span>
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


            function deletePost(tid){
                //console.log(tid);
                $.ajax({
                    url: 'delete.php',
                    type: 'post',
                    data: {tid:tid},
                    success:function(responce){
                        window.location.href="./profile.php";
                    }
                });
            }

            function approvePost(tid){
                $.ajax({
                    url: 'approve.php',
                    type: 'post',
                    data: {tid:tid},
                    success:function(){
                        //selector='"#'+tid+'"';
                        $('#' + tid).addClass("approved-post");
                        $('#' + tid).removeClass("approve-post");
                    }
                });
            }

        </script>
    