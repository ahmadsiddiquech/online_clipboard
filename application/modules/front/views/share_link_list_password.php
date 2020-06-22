<section style="padding-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeInDown" data-wow-delay=".8s">
                    <div class="block">
                        <div class="title text-center">
                            <h2>Enter Password to access List</h2>
                        </div>
                        <div class="form-inline text-center col-sm-12 col-xs-12">
                        <form  method="POST" action="<?=BASE_URL?>front/get_list/<?=$this->uri->segment(3)?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="Password" name="list_pass" class="form-control" required="required" placeholder="List Password">
                                </div>
                            </div>
                            <div class="row" style="padding-top: 20px;">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>