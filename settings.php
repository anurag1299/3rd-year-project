<?php
    require "navbar.php"
    ?>



<div class="container" style="background-color: white; height: 100%">
    <div class="row pt-5">
    <div class="col-8 ">
   <h2><i class="fa fa-cog" aria-hidden="true"></i><span> User Settings</span></h2>
  <br>
  
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Account</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Profile</a>
    </li>
  </ul>

  <div class="tab-content" >
  	<!--Account settings-->
    <div id="home" class="container tab-pane active" ><br>
      <h3 >Account Settings</h3>
      <br>
      <p style="border-bottom: 1px solid #d3d3d3;opacity: 0.6;">Account Credentials</p>
     
        <div class="container" >
        	<div class="row">
        	    <div class="col-sm-9">
        	        <h4 >Email Address</h4>
        	        
        	        <?php
                    if(!isset($_SESSION['email']))
                    {
                        echo "NULL";
                    }
                    else
                    {   

                        echo $_SESSION['email'];
                    }

                    ?>
                </div>
                
                <div class="col-sm-3">
                    <button type="button" class="btn btn-outline-primary" style="float: right;">Change
                    </button>
                </div>
            </div>
        </div><br><br>

        
        <div class="container">
            <div class="row">
        	    <div class="col-sm-9">
        	        <h4 style="float: left;">Change Password</h4>
        	    </div>

        	    <div class="col-sm-3">
                    <button type="button" class="btn btn-outline-primary" style="float: right;">Change
                    </button>
                </div>
            </div>
        </div><br>


        <p style="border-bottom: 1px solid #d3d3d3;opacity: 0.6;">Deactivate Account</p>
        <div class="container">
        	
        	<div class="row">
        	    <div class="col-sm-9">
        	        <h4 style="float: left;">Deactivate Account</h4>
        	    </div>

        	    <div class="col-sm-3">
                    <button type="button" class="btn btn-outline-danger" style="float: right;">Deactivate
        	        </button>
                </div>
            </div>
        </div>


    </div>



    <!--Profile settings-->
    <div id="menu1" class="container tab-pane fade"><br>
      <h3 >Profile Settings</h3>
      <br>
      <p style="border-bottom: 1px solid #d3d3d3;opacity: 0.6;">Profile Info</p>
     
        <div class="container" >
        	<div class="row">
        	    <div class="col-sm-9">
        	        <h4 >Username</h4>
        	        
        	        <?php
                    if(!isset($_SESSION['username']))
                    {
                        echo "NULL";
                    }
                    else
                    {   

                        echo $_SESSION['username'];
                    }

                    ?>
                </div>
                
                <div class="col-sm-3">
                    <button type="button" class="btn btn-outline-primary" style="float: right;">Change
                    </button>
                </div>
            </div>
        </div>

        



    </div>
    </div>
   
    </div>
    <div class="rt col-3  ml-5 mr-0 mt-5 px-0 pt-0">
                
                <div class="profile-box border" >
                    <img class="dp" src="assets/profile.jpg" alt="">
                    <!-- banner -->
                    <div class="back"></div>
                    <!-- spacing -->
                    <div style="height:25px;"></div>
                    <!-- data area -->
                    <div class="data mt-3"> 
                        <?php echo "u/".$_SESSION['username']."<br>"?>
                        
                    </div>
                </div>
        </div>           
    </div>    
    </div>
    
</div>