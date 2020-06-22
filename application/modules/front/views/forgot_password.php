<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Developed by Ahmad Siddique">
    <meta name="keywords" content="clipboard,online,firends,share">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clipboard</title>
    <link rel="stylesheet" href="<?=STATIC_FRONT_CSS?>bootstrap.min.css">
    <link rel="stylesheet" href="<?=STATIC_FRONT_CSS?>font-awesome.min.css">
    <link rel="stylesheet" href="<?=STATIC_FRONT_CSS?>main.css">
    <link rel="stylesheet" href="<?=STATIC_FRONT_CSS?>animate.css">
    <link rel="stylesheet" href="<?=STATIC_FRONT_CSS?>responsive.css">
    <link rel="stylesheet" href="<?=STATIC_FRONT_CSS?>responsive.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="icon" type="image/png" href="<?=STATIC_FRONT_IMAGE?>logo.png">
</head>
<body>


    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-6 col-sm-3">
                    <a href="#" class="logo">
                        <img src="<?=STATIC_FRONT_IMAGE?>logo.png" alt="">
                    </a>
                </div>
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <div class="menu">
                        <nav class="navbar navbar-default" role="navigation">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li><a href="<?=BASE_URL?>">Home</a></li>
                                    </ul>
                                  
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-3">
                    <ul class="social-info">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <?php
                            $data = $this->session->userdata('gamers_data');
                        ?>
                        <?php if (isset($data) && !empty($data)) { ?>
                        <li><a href="<?=BASE_URL?>front/logout" >Logout</a></li>
                        <?php } else { ?>
                            <li><a href="" data-toggle="modal" data-target="#myModal">Login/Signup</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>

<section style="padding-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeInDown" data-wow-delay=".8s">
                    <div class="block">
                        <div class="title text-center">
                            <h2>Enter Email</h2>
                            <p>Enter Email to recieve new password for you account</p>
                        </div>
                        <div class="form-inline text-center col-sm-12 col-xs-12">
                        <form  method="POST" action="<?=BASE_URL?>front/submit_forgot_password">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="Email" name="email" class="form-control" required="required" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="row" style="padding-top: 20px;">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Send</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>