<?php $curr_c = $this->uri->segment(2);?>
<section>
    <div class="container-fluid">
        <div class="row" style="padding-top: 80px;">
            <div class="col-md-2">
                    <div class="bg-light border-right" id="sidebar-wrapper">
                      <div class="list-group list-group-flush">
                        
                        <a href="<?=BASE_URL?>account/lists" class="<?php if($curr_c=='list_items') echo('active')?> list-group-item list-group-item-action bg-light"><i class="fa fa-list"></i>&nbsp;Lists</a>
                        <a href="<?=BASE_URL?>account" class="list-group-item list-group-item-action bg-light"><i class="fa fa-user"></i>&nbsp;Profile</a>
                        <a href="<?=BASE_URL?>front/logout" class="list-group-item list-group-item-action bg-light"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                      </div>
                    </div>
            </div>
            
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-9">
                        <h4 style="">List Items</h4>
                    </div>
                    <div class="col-md-3" align="right">
                        <a href="<?=BASE_URL?>account/lists"><button type="button" class="btn btn-primary"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;&nbsp;Back</button></a>
                    </div>
                </div>
                <?php if (($news->num_rows()) > 0) { ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover table-body">
                        <thead class="bg-th">
                        <tr class="bg-col">
                        <th class="sr">S.No</th>
                        <th>Webpage Title</th>
                        <th>Webpage Url</th>
                        <th class="" style="width:300px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                $i = 0;
                                
                                if (isset($news)) {
                                    foreach ($news->result() as
                                            $new) {
                                        $i++;
                                        ?>
                                    <tr id="Row_<?=$new->id?>" class="odd gradeX " >
                                        <td width='2%'><?php echo $i;?></td>
                                        <td><?php echo $new->page_title ?></td>
                                        <td><?php echo $new->page_url ?></td>
                                        <td class="table_action">
                                        <?php
                                        echo anchor('"javascript:;"', '<i class="fa fa-times"></i>', array('class' => 'delete_record btn red c-btn', 'rel' => $new->id, 'title' => 'Delete Item'));
                                        ?>
                                        </td>
                                    </tr>
                                    <?php } ?>    
                                <?php } ?>
                            </tbody>
                    </table>
                    </div>
                </div>
                <?php } else { ?>
                    <h1>No list Item Available</h1>
                <?php } ?>
            </div>
        </div>
    </div>
    
</section>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
//=======================================================================================
//=======================================================================================

    $(document).off('click', '.delete_record').on('click', '.delete_record', function(e){
        var id = $(this).attr('rel');
        e.preventDefault();
               $.ajax({
                    type: 'POST',
                    url: "<?php echo BASE_URL?>account/delete_list_items",
                    data: {'id': id},
                    async: false,
                    success: function() {
                    location.reload();
                    }
                });
        });
//=======================================================================================
//=======================================================================================
});

</script>