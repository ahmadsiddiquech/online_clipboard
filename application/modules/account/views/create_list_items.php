<?php $curr_c = $this->uri->segment(2);?>
<section>
    <div class="container-fluid">
        <div class="row" style="padding-top: 80px;">
            <div class="col-md-2">
                    <div class="bg-light border-right" id="sidebar-wrapper">
                      <div class="list-group list-group-flush">
                        
                        <a href="<?=BASE_URL?>account/lists" class="<?php if($curr_c=='create_list_items') echo('active')?> list-group-item list-group-item-action bg-light"><i class="fa fa-list"></i>&nbsp;Lists</a>
                        <a href="<?=BASE_URL?>account" class="list-group-item list-group-item-action bg-light"><i class="fa fa-user"></i>&nbsp;Profile</a>
                        <a href="<?=BASE_URL?>front/logout" class="list-group-item list-group-item-action bg-light"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                      </div>
                    </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-9">
                        <h4 style="">Add Item</h4>
                    </div>
                    <div class="col-md-3" align="right">
                        <a href="<?=BASE_URL?>account/lists"><button type="button" class="btn btn-primary"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;&nbsp;Back</button></a>
                    </div>
                </div>
                <hr>
                <?php $id = $this->uri->segment(3);?>
                <form action="<?=BASE_URL?>account/submit_list_item/<?=$id?>" method="POST">
                    <div class="row" >
                        <div class="col-lg-6">
                            <label>Webpage Title</label>
                            <input type="text" class="form-control" name="page_title">
                        </div>
                        <div class="col-lg-6">
                            <label>Webpage Url</label>
                            <input type="text" class="form-control" name="page_url">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <button class="form-control btn btn-success" id="submit" type="submit" style="margin-top: 30px; margin-bottom: 30px;"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</section>