<?php $curr_c = $this->uri->segment(2);?>
<section>
    <div class="container-fluid">
        <div class="row" style="padding-top: 80px;">
            <div class="col-md-2">
                    <div class="bg-light border-right" id="sidebar-wrapper">
                      <div class="list-group list-group-flush">
                        
                        <a href="<?=BASE_URL?>account/lists" class="<?php if($curr_c=='lists') echo('active')?> list-group-item list-group-item-action bg-light"><i class="fa fa-list"></i>&nbsp;Lists</a>
                        <a href="<?=BASE_URL?>account" class="<?php if($curr_c=='') echo('active')?>
                        list-group-item list-group-item-action bg-light"><i class="fa fa-user"></i>&nbsp;Profile</a>
                        <a href="<?=BASE_URL?>front/logout" class="list-group-item list-group-item-action bg-light"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                      </div>
                    </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-10">
                        <h4 style="">Profile Info</h4>
                    </div>
                    <div class="col-md-2" align="right">
                        Edit
                        <input type="checkbox" id="edit" onclick="myFunction()">
                    </div>
                </div>
                <hr>
                <form action="<?=BASE_URL?>account/update" method="POST">
                    <div class="row" >
                        <div class="col-lg-6">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?=$news[0]['name']?>" disabled>
                        </div>
                        <div class="col-lg-6">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?=$news[0]['email']?>" disabled>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-lg-6">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="<?=$news[0]['phone']?>" disabled>
                        </div>
                        <div class="col-lg-6">
                            <label>Join Date</label>
                            <input type="text" class="form-control" name="join_date" id="join_date" value="<?=$news[0]['join_date']?>" disabled>
                        </div>
                    </div>
                    <button class="form-control btn btn-success" id="submit" disabled type="submit" style="margin-top: 30px; margin-bottom: 30px;">Save</button>
                </form>
                <form method="POST" action="<?=BASE_URL?>account/update_password">
                    <div class="row" style="padding-top: 20px;">
                      <div class="col-lg-6">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <button class="form-control btn btn-success"  type="submit" style="margin-top: 30px; margin-bottom: 30px;">Change Password</button>
                </form>
            </div>
        </div>
    </div>
    
</section>


<script>
function myFunction() {
  var checkBox = document.getElementById("edit");
  if (checkBox.checked == true){
    $('#name').prop('disabled', false);
    $('#phone').prop('disabled', false);
    $('#submit').prop('disabled', false);
  } else {
    $('#phone').prop('disabled', true);
    $('#name').prop('disabled', true);
    $('#submit').prop('disabled', true);
  }
}
</script>