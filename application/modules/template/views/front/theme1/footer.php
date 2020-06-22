<footer class="wow fadeInUp" data-wow-delay=".8s">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                        <a class="footer-logo"href="#">
                            <img class="img-responsive" src="<?=STATIC_FRONT_IMAGE?>footer-logo.png" alt="">
                        </a>
                    <p>Copyright © <?=date('Y')?> | All rights reserved | Developed by <a href="https://www.facebook.com/ahmadsiddiquech" target="_blank">Ahmad Siddique</a></p>
                    
                </div>
            </div>
        </div>
    </footer>



<!-- =================modals ===================== -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login / Signup</h4>
        </div>
        <div class="modal-body">
          
          <div class="row">
            <form method="POST" action="<?=BASE_URL?>front/login">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <h3 style="text-align: center;">Login</h3>
                  </div>
                </div>
                <div class="row" style="padding-top: 20px;">
                  <div class="col-md-12">
                    <input type="email" name="email" required="required" placeholder="Your Email" class="form-control">
                  </div>
                </div>
                <div class="row" style="padding-top: 20px;">
                  <div class="col-md-12">
                    <input type="password" name="password" required="required" placeholder="Password" class="form-control">
                    <a href="<?=BASE_URL?>front/forgot_password">Forgot Password?</a>
                  </div>
                </div>
                <div class="row" style="padding-top: 20px; text-align: center;">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-success btn-lg">Login</button>
                  </div>
                </div>
              </div>
            </form>
            <form method="POST" action="<?=BASE_URL?>front/register">
              <div class="col-md-6" style="border-left: 2px solid #f57553">
                <div class="row">
                  <div class="col-md-12">
                    <h3 style="text-align: center;">Signup</h3>
                  </div>
                </div>
                <div class="row" style="padding-top: 20px;">
                  <div class="col-md-12">
                    <input type="text" name="name" required="required" placeholder="Your Name" class="form-control">
                  </div>
                </div>
                <div class="row" style="padding-top: 20px;">
                  <div class="col-md-12">
                    <input type="email" id="email" name="email" required="required" placeholder="Your Email" class="form-control">
                    <span id="message"></span>
                  </div>
                </div>
                <div class="row" style="padding-top: 20px;">
                  <div class="col-md-12">
                    <input type="text" name="phone" required="required" placeholder="Your Phone" class="form-control">
                  </div>
                </div>
                <div class="row" style="padding-top: 20px;">
                  <div class="col-md-12">
                    <input type="password" name="password" required="required" min="4" placeholder="Password" class="form-control">
                  </div>
                </div>
                <div class="row" style="padding-top: 20px; text-align: center;">
                  <div class="col-md-12">
                    <button type="submit" id="signup" class="btn btn-primary btn-lg">Signup</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="listModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Share List</h4>
        </div>
        <div class="modal-body">
          
        </div>
      </div>
    </div>
</div>
<!-- =================modals ===================== -->
</body>

<script src="<?=STATIC_FRONT_JS?>vendor/modernizr-2.6.2.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<script src="<?=STATIC_FRONT_JS?>bootstrap.min.js"></script>
<script src="<?=STATIC_FRONT_JS?>plugins.js"></script>
<script src="<?=STATIC_FRONT_JS?>main.js"></script>
<script src="<?=STATIC_FRONT_JS?>wow.min.js"></script>
<script>
 new WOW(
    ).init();
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#email").change(function(){

   $("#message").html("<img src='<?=STATIC_ADMIN_IMAGE?>ajax-loader.gif' />"); 
  var email=$("#email").val();
    $.ajax({
          type:"post",
          data: {'email': email},
         url: "<?php ADMIN_BASE_URL?>front/validate",
                  
              success:function(result){
              if(result == 1){
                 $("#message").html("<span style='color:red;'>User already exists..!</span>");
                 $('#signup').prop('disabled', true);
              }
              else{
                 $("#message").html("<img src='<?=STATIC_ADMIN_IMAGE?>ajax-loader.gif' />").hide();
                 $('#signup').prop('disabled', false);
              }
          }
       });
  });
});
</script>
</html>