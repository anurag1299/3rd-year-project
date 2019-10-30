


    <?php
    require "navbar.php"
    ?>
    <?php
    require "profile1.php"
    ?>
    
        <div class="row">
            <!-- left side -->
            <div class="lt col-9  ml-5 mr-0 my-4 px-0 py-0">
            Hello
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
                
                <!-- <div class="row">extra</div> -->
            </div>
        </div>
    