
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
  <style>
    #magic-line {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100px;
      height: 4px;
      background: #0079d3;
    }
  </style>
    <script id="rendered-js">
      $(function() {
          var $el,
          leftPos,
          newWidth,
          $mainNav = $(".navbar-nav");

          $mainNav.append("<li id='magic-line'></li>");
          var $magicLine = $("#magic-line");

          $magicLine
           .width($(".active").width())
           .css("left", $(".active a").position().left)
           .data("origLeft", $magicLine.position().left)
           .data("origWidth", $magicLine.width());

      $(".navbar-nav li a").hover(function() {
          console.log("hi");
          $el = $(this);
          leftPos = $el.position().left;
          newWidth = $el.parent().width();
          $magicLine.stop().animate({
            left: leftPos,
            width: newWidth
          });
        },
    function() {
          $magicLine.stop().animate({
            left: $magicLine.data("origLeft"),
            width: $magicLine.data("origWidth")
          });
        }
      );
  });

    </script>


  <div id="app" style="background-color:white;border-bottom: 1px solid #d3d3d3;" >
    <nav class="navbar navbar-toggleable-md navbar-light ">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="menus">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Overview<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Comments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Saved</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Upvoted</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Downvoted</a>
        </li>
      </ul>
    </div>
    </nav>
  </div>
  


    <!--Card for user-->
    <!--
    <div style="margin-right: 20px;">
      <div class="row" >
        <div class="col-sm-10">
          <p>1</p>
        </div>

        <div class="col-sm-2 " >
          <div class="card bg-light mb-3" style=" margin-top: 20px; ">
            <div class="card-header" style="background-color: #66e3ff;">
              <img src="https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg" 
              class="img-thumbnail" style="height: 100%; width: 40%;">
              <a href="#" class="stretched-link" style="text-decoration-line: none; color: #363434;">Username</a>
              
            </div>
            <div class="card-body" style="padding: 10px;">
              <h5 class="card-title">Primary info</h5>
              <br>
              <center><button type="button" class="btn btn-primary" style="width:90%; margin-bottom: 10px;">New Post</button></center>
            </div>
          </div>
        </div>
      </div>
    </div>
  -->


