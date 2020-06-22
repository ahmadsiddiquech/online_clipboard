<?php $curr_c = $this->uri->segment(2);?>
<section>
    <div class="container-fluid">
        <div class="row" style="padding-top: 80px;">
            <div class="col-md-2">
                    <div class="bg-light border-right" id="sidebar-wrapper">
                      <div class="list-group list-group-flush">
                        
                        <a href="<?=BASE_URL?>account/lists" class="<?php if($curr_c=='lists') echo('active')?> list-group-item list-group-item-action bg-light"><i class="fa fa-list"></i>&nbsp;Lists</a>
                        <a href="<?=BASE_URL?>account" class="list-group-item list-group-item-action bg-light"><i class="fa fa-user"></i>&nbsp;Profile</a>
                        <a href="<?=BASE_URL?>front/logout" class="list-group-item list-group-item-action bg-light"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                      </div>
                    </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-9">
                        <h4 style="">My List</h4>
                    </div>
                    <div class="col-md-3" align="right">
                        <a href="<?=BASE_URL?>account/create_list"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Create List</button></a>
                    </div>
                </div>
                <?php if (($news->num_rows()) > 0) { ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover table-body">
                        <thead class="bg-th">
                        <tr class="bg-col">
                        <th class="sr">S.No</th>
                        <th>List Name</th>
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
                                    $item_view_url = BASE_URL . 'account/list_items/' . $new->id;
                                    $add_item_url = BASE_URL . 'account/create_list_items/' . $new->id;
                                        ?>
                                    <tr id="Row_<?=$new->id?>" class="odd gradeX " >
                                        <td width='2%'><?php echo $i;?></td>
                                        <td><?php echo $new->list_name ?></td>
                                        <td class="table_action">
                                        <a class="btn yellow c-btn view_details" rel="<?=$new->id?>" title="Get Share Link"><i class="fa fa-mail-forward"  ></i></a>
                                        <?php
                                        echo anchor($add_item_url, '<i class="fa fa-plus"></i>', array('class' => 'action_edit btn blue c-btn','title' => 'Add Items'));
                                        echo anchor($item_view_url, '<i class="fa fa-eye"></i>', array('class' => 'action_edit btn blue c-btn','title' => 'View Items'));
                                        echo anchor('"javascript:;"', '<i class="fa fa-times"></i>', array('class' => 'delete_record btn red c-btn', 'rel' => $new->id, 'title' => 'Delete List'));
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
                    <h1>No list Available</h1>
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
                    url: "<?php echo BASE_URL?>account/delete_list",
                    data: {'id': id},
                    async: false,
                    success: function() {
                    location.reload();
                    }
                });
        });
//=======================================================================================
//=======================================================================================
$(document).on("click", ".view_details", function(event){
    event.preventDefault();
    var id = $(this).attr('rel');
      $.ajax({
                type: 'POST',
                url: "<?php ADMIN_BASE_URL?>account/share_link",
                data: {'id': id},
                async: false,
                success: function(test_body) {
                var test_desc = test_body;
                $('#listModal').modal('show')
                $("#listModal .modal-body").html(test_desc);
                }
            });
    });
//=======================================================================================
//=======================================================================================
});

</script>