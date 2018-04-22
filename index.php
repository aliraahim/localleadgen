<?php
include 'categories.php';
include 'connect.php';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <style>
                    /* Paste this css to your style sheet file or under head tag */
            /* This only works with JavaScript, 
            if it's not present, don't show loader */
            .no-js #loader { display: none;  }
            .js #loader { display: block; position: absolute; left: 100px; top: 0; }
            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 999999;
                background: url(resources/images/Preloader_2.gif) center no-repeat #fff;
                background-size:65px;
            }
        </style>
        <script>
                    //paste this code under the head tag or in a separate js file.
            // Wait for window load

        </script>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#2b5797">
        <meta name="theme-color" content="#ffffff">
        <title>HyperLocal Lead Gen</title>
        <meta charset="utf-8">
        <!-- Bootstrap core CSS -->
        <link href="resources/css/bootstrap.min.css" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="resources/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.3.0/css/bootstrap-slider.css" />
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css"> -->
        <link href="resources/css/jquery.steps-main.css" rel="stylesheet">
        <link href="resources/css/jquery.steps-normalize.css" rel="stylesheet">
        <!-- <link href="resources/css/main.css?version=2" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" type="text/css" href="resources/css/bootstrap-duallistbox.css"> -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.css">
        <link href="resources/css/jquery.steps.css" rel="stylesheet">
        <link href="resources/css/multi.min.css" rel="stylesheet">
        <link href="resources/css/custom.css?version=6" rel="stylesheet">
        <!-- <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet"> -->
        <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="resources/js/ie-emulation-modes-warning.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    </head>

    <body>
    <div class="se-pre-con"></div>
    <!-- <div class="success-screen">
        <div class = "container">
            <div class = "row">
                <div class ="col-sm-12">
                    <img src = "resources/images/bot.svg" class = "img-responsive"/>
        </div>
        </div>
        </div>
    </div> -->
        <!-- <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#">HyperLocal Lead Gen</a> </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Application</a></li>
                        <li><a href="#">About</a></li>
                    </ul>
                </div>
            </div>
        </nav> -->
        <div class="container text-center">
        <div class="row top-row">
        <div class="col-xs-4 what-is">
        <span class ="link">What is this?</span>
       
        </div>
        <div class="col-xs-4 logo">
        <img class = "img-fluid" src = "resources/images/logo.png"/>
        
        </div>
        <div class="col-xs-4 built-by">
        <span>Built by Raahim</span>
        </div>
    </div>
                
                
        </div>
        
        <div class="container app">
        <div class="success-screen hidden text-center">
            <div class = "row">
                <div class ="col-sm-12">
                    <img src = "resources/images/bot.svg" class = "img-responsive"/>
                    <p class="lead">While the bots do their work gathering your data, feel free to <a href ="#"><span class = "link">check out some of my other work.</span></a></p>
                    <p class="sub-lead">(Or if you're completely blown away by what the tool can do, feel free to <a href ="/"><span class = "link">request some more leads.</span></a>)</p>
        </div>
        </div>
    </div>
        <div class="">
            <div id="wizard">
                <h1><span class ="step-icon"><i class="fas fa-map-marker-alt"></i></span><span class ="step-number">Step 1</span><br/><span class ="step-title">Select Area</span></h1>
                <div>
                    <div>
                        <p class="lead" style="margin-bottom:30px">Select your target area by choosing a search radius and placing/dragging the marker on the map.</p>
                    </div>
                    <div class="xs-12" style="text-align:center; margin-top:1em; margin-bottom:1em;"><span class ="hidden-xs"> Search radius&nbsp;&nbsp;&nbsp;</span>
                            <input id="radius" data-slider-id='ex1Slider' type="text" data-slider-min="0.1" data-slider-max="5" data-slider-step="0.1" data-slider-value="2" /> <span>&nbsp;&nbsp;&nbsp;</span><span id="q_opt" class="btn-group" data-toggle="buttons" style="margin-top:0.6em;">
            <label class="btn btn-primary active unit-selector" id="d_op_0">
                <input id="q_op_0" name="op" type="radio" value="kilometers" checked />kilometers</label>
            <label class="btn btn-primary unit-selector" id="d_op_1">
                <input id="q_op_1" name="op" type="radio" value="miles" />miles</label>
        </span> </div>
                    <div style="height:70%; text-align:center;">
                        <input id="pac-input" class="controls" type="text" placeholder="You can also type in a location">
                        <div id="map"></div>
                    </div>
                    <div class="row">
                    <div class="m-3 m-sm-5"></div>
                    </div>
                </div>
                <h1><span class ="step-icon"><i class="fas fa-building"></i></span><span class ="step-number">Step 2</span><br/><span class ="step-title">Select Types</span></h1>
                <div>
                    <div>
                        <p class="lead">Select the types of places/businesses that you want to search for.</p>
                        <div class="row">
                            <div class="col-sm-12">
                                <select id="category-selector" multiple="multiple" size="10">
                                    <?php foreach ($categories as $value => $name) { echo "<option value=".$value.">".$name."</option>";} ?>
                                </select>
                                <br> </div>
                        </div>
                        <div class="m-3 m-sm-5"></div>
                    </div>
                </div>
                <h1><span class ="step-icon"><i class="fab fa-wpforms"></i></span><span class ="step-number">Step 3</span><br/><span class ="step-title">Enter Details</span></h1>
<div class="container">
    <div class ="row">
        <div class ="col-sm-12">
        <p class="lead">Enter your details so that we can email you the results.</p>
</div>
    </div>
    <div class="row">
        <div class="col-sm-6"><form id = "userData">
  <div class="form-group">
    <label for="name">Your name</label></label>
    <input type="text" class="form-control" id="name" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Results will be sent to this address" required>
  </div>
  <div class="form-group">
    <label for="company">Company</label>
    <input type="text" class="form-control" id="company" placeholder="">
  </div>
  <div class="new-stylish-checkbox">
    <input type="checkbox" id="want-emails">
    <label for="want-emails">I want emails too.</label>
</div>

</form></div>
<div class="col-sm-6 results"><p style="font-weight:200">Include emails in the results?</p><img class ="img-responsive gray" src ="resources/images/email.svg"/></div>
        
    </div>
</div>
                </div>
                
                </div>
                <!-- <div><p class ="text-center">Built by Raahim.</p></div> -->
                
                
            </div>


        </div>
        <!-- /.container -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- <script>
            window.jQuery || document.write('<script src="resources/js/vendor/jquery.min.js"><\/script>')
        </script> -->
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/jquery.steps.js?version=4"></script>
        <script src="resources/js/wizard.js?version=6"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.3.0/bootstrap-slider.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script> -->
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="resources/js/ie10-viewport-bug-workaround.js"></script>
        <script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.js"></script>
        <script src="resources/js/multi.min.js"></script>
        <script src="resources/js/map.js"></script>
        <!-- <script src="resources/js/main.js"></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $GLOBALS['google_key'] ?>&libraries=places&callback=initMap" async defer></script>

        <script src="resources/js/jquery.bootstrap-duallistbox.min.js"></script>
        
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <script>
            
            $("#category-selector").multi({
                enable_search: true
                , search_placeholder: 'Search for category'

            });

            $(window).load(function() {
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");;
            });

            $( ".what-is span" ).on( "click", function() {
                swal({
  title: "What is this, you ask?",
  text: "This is a tool I developed that lets you source business leads from targeted areas. The results include details about the business (name, address, phone number, website, Google rating, etc.) as well as emails (if the business has any on their website)! Still confused about how to use this? Well, then the tool probably isn't meant for you. :) Just kidding, shoot me an email at ali.raahim@gmail.com and I'll explain.",
  customClass: "what-is-alert",
  button: "Got it!",
});
});
$( ".results img" ).on( "click", function() {
    if ($( ".results img" ).hasClass("gray")){
        $('#want-emails').prop('checked', true);
        $( ".results img" ).removeClass("gray");
    } else {
        $('#want-emails').prop('checked', false);
        $( ".results img" ).addClass("gray");
    }
    
});
        </script>
    </body>

    </html>