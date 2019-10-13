<?php
session_start();
?>

<html>
    <head>
        <title>my reddit</title>
        
        <script src="https://use.fontawesome.com/94cc096bb6.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="css/bootstrap-grid.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        

    </head>
    <body>
        <!-- header -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid row">
                <!-- icon -->
                <div class="col-sm-2" style="background: rgb(255, 255, 255)">
                        <a class="navbar-brand"><img src="assets/icon.jpeg" width="70" height="60"></a>
                        <a class="navbar-brand" href="#">My Reddit</a>
                </div>
                <!-- search bar -->
                <div class="col-sm-7" style="background: rgb(255, 255, 255)">
                        <form class="form-inline" >
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="margin-top: 10px; width: 100%;">
                        </form>
                </div>
                <!-- buttons -->
                <div class="col-sm-3" style="background: rgb(250, 250, 250)">
                    <?php
                    if($_SESSION['username'] === NULL)
                    {
                        echo '<button type="button" class="btn btn-outline-primary btn-md" data-toggle="modal" data-target="#loginModalCenter" style="width: 40%" >Login</button>
                            <button type="button" class="btn btn-outline-primary btn-md" data-toggle="modal" data-target="#signUpModalCenter" style="width: 40%">Sign Up</button>';
                    }
                    else
                    {
                        echo "Welcome, ".$_SESSION['username'];
                    }

                    ?>

                    <div class="dropdown" style="float: right">
                        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                      
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <?php
                            if($_SESSION['username'] != NULL)
                            {
                                echo '<a class="dropdown-item" href="#">My Profile</a>
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
                            <div class="col-4" style="background-image: url('assets/portrait.jpeg'); height: 600px;"></div>
                            <div class="col-8">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                           <p>Sign in</p>
                                           <form action="auth/login.php" method="POST">
                                               <input type="text" name="username" placeholder="username">
                                               <br><br>
                                               <input type="password" name="password" placeholder="password">
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
                        <div class="col-4" style="background-image: url('assets/portrait.jpeg'); height: 600px;"></div>
                        <div class="col-8">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                       <p>Sign Up</p>
                                       <form action="auth/signUp.php" method="POST">
                                            <input type="email" name="email" placeholder="email">
                                            <br><br>
                                           <input type="text" name="username" placeholder="username">
                                           <br><br>
                                           <input type="password" name="password" placeholder="password">
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




        
    </body>
</html>