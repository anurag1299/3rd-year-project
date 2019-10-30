<html>
    <head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="profile.css">
    </head>
    <?php
    require "navbar.php"
    ?>
    <body style="background:#DAE0E6; overflow-x:hidden;" >
        <div class="container">
            <div class="row pt-5">
                <!-- right side -->
                <div class="col-8 ">
                    <h5><b>Create a post</b></h5>
                    <hr style="background:white; height:2px;">
                    <!-- post wala form -->
                    <div class="post-form">
                        <form action="post.php" method="POST">
                        <input type="text" class="form-control my-2" placeholder="title" name="title" aria-label="Username" aria-describedby="basic-addon1" required>
                        <textarea class="form-control my-2" placeholder="Body" name="body" aria-label="With textarea" required></textarea> 
                        <input list="category" name="category" placeholder="category">
                        <datalist id="category">
                            <?php   
                                require "auth/config.php";
                                $sql = "select cat_title from category";
                                $result = $conn->query($sql);
                                if($result->num_rows > 0)
                                {
                                   while($row = $result->fetch_assoc())
                                   {
                                        echo "<option value='".$row['cat_title']."'>";                      //<option value=" Afghanistan">
                                   }
                                    
                                }else{
                                    echo "0 result";
                                }
                            ?>
                        </datalist>
                        <button type="submit" class="btn btn-primary btn-block">Post</button>
                        </form>
                    </div>
                </div>
                <!-- left side -->
                <div class="rt col-3  ml-5 mr-0 my-4 px-0 py-0">
                
                    <div class="profile-box">
                        <img class="dp" src="assets/profile.jpg" alt="">
                        <!-- banner -->
                        <div class="back"></div>
                        <!-- spacing -->
                        <div style="height:25px;"></div>
                        <!-- data area -->
                        <div class="data"> 
                            <?php echo "u/".$_SESSION['username']."<br>"?>
                            
                        </div>
                    </div>
                
                <!-- <div class="row">extra</div> -->
            </div>
            </div>
        </div>
    </body>
</html>