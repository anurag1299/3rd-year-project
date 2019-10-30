<?php
session_start();
?>

<html>
    <head>
        <title>my reddit</title>
        
        <?php
        require "links.php";
        ?>
        

    </head>
    <body style="background:#DAE0E6; overflow-x:hidden;">
        <!-- header -->
        <nav class="navbar" style="background:white; border-bottom: 1px solid #d3d3d3;">
            <div class="container-fluid row">
                <!-- icon -->
                <div class="col-sm-3" style="background: rgb(255, 255, 255); padding:0;">
                        <a class="navbar-brand"><img src="assets/icon.jpeg" width="70" height="60"></a>
                        <a class="navbar-brand" href="index.php">My Reddit</a>
                </div>
                <!-- search bar -->
                <div class="col-sm-5" style="background: rgb(255, 255, 255)">
                        <form class="form-inline" >
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="margin-top: 13px; width: 100%;">
                        </form>
                </div>
                <!-- buttons -->
                <div class="col-sm-4" style="background: rgb(250, 250, 250);">
                    <?php
                    if(!isset($_SESSION['username']))
                    {
                        echo '<button type="button" class="btn btn-outline-primary " data-toggle="modal" data-target="#loginModalCenter" style="width: 40%" >Login</button>
                            <button type="button" class="btn btn-outline-primary " data-toggle="modal" data-target="#signUpModalCenter" style="width: 40%">Sign Up</button>';
                    }
                    else
                    {
                        echo "Welcome, ".$_SESSION['username'];
                    }

                    ?>

                    <div class="dropdown btn" >
                        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                      
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <?php
                            if(isset($_SESSION['username']))
                            {
                                echo '<a class="dropdown-item" href="profile.php">My Profile</a>
                                <a class="dropdown-item" href="#">Profile Settings</a>
                                <hr>
                                <a class="dropdown-item btn btn-danger" href="auth/logout.php">Log Out</a>';
                            }
                            else
                            {
                                echo '<a class="dropdown-item" data-toggle="modal" data-target="#loginModalCenter" href="#">Log In/Sign Up</a>';
                            }
                          
                          
                            ?>
                          
                        </div>
                      </div>
                </div>

            </div>
        </nav>

        <!-- login modal -->
        <div class="modal fade" id="loginModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="row container">
                            <div class="col-4" style="background-image: url('assets/portrait.jpeg'); height: 60vh; background-position:left bottom;"></div>
                            <div class="col-8">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                           <p>Sign in</p>
                                           <form action="auth/login.php" method="POST">
                                               <input type="text" name="username" placeholder="username" required>
                                               <br><br>
                                               <input type="password" name="password" placeholder="password" required>
                                               <br><br>
                                               <input type="submit" class="btn btn-outline-primary">
                                           </form>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button> -->
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>



        <!-- signup modal -->
        <div class="modal fade" id="signUpModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="row container">
                        <div class="col-4" style="background-image: url('assets/portrait.jpeg'); height: 60vh; background-position:left bottom;"></div>
                        <div class="col-8">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                       <p>Sign Up</p>
                                       <form action="auth/signUp.php" method="POST">
                                            <div id="email_response" class="response"></div>
                                            <input id="txt_mail" type="email" name="email" placeholder="email" required>
                                            <br><br>
                                            <span id="uname_response" class="response"></span>
                                            <input id="txt_uname" type="text" name="username" placeholder="username" required>
                                            <br><br>
                                            <input type="password" name="password" placeholder="password"required>
                                            <br><br>
                                            <input type="submit" class="btn btn-outline-primary">
                                       </form>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- pehle kiya tha -->
    <!-- <h5>
        <?php
            // if($_SESSION['username'] != NULL)
            // {
            //     echo "HELLO".$_SESSION['username'];
            // }
        ?>
    </h5> -->
    
    <!-- dynamic check -->
    <script>
$(document).ready(function(){
    // username check
   $("#txt_uname").keyup(function(){

      var uname = $("#txt_uname").val().trim();

      if(uname != ''){

         $.ajax({
            url: 'auth/uname_check.php',
            type: 'post',
            data: {uname:uname},
            success: function(response){
                if(response > 0){
                    $("#uname_response").show();
                    $("#uname_response").html("<span class='exists'>* Username Already in use.</span>");
                }else{
                   $("#uname_response").hide();
                }
                
             },
            error: function(status,err){
                console.log("errored");
                console.log(status);
                console.log(err);
            } 
          });
      }else{
         $("#uname_response").hide();
      }

    });
    // EMAIL CHECK
    $("#txt_mail").keyup(function(){

        var email = $("#txt_mail").val().trim();

            if(email != ''){
                    
                    $.ajax({
                    url: 'auth/email_check.php',
                    type: 'post',
                    data: {email:email},
                    success: function(response){
                        if(response > 0){
                            $("#email_response").show();
                            $("#email_response").html("<span class='exists'>* Email already in use.</span>");
                        }else{
                            $("#email_response").hide();
                        }
                        
                    },
                    error: function(status,err){
                        console.log("errored");
                        console.log(status);
                        console.log(err);
                    } 
                    });
                }else{
                $("#email_response").hide();
                }

                });

 });
</script>

        
    </body>
</html>