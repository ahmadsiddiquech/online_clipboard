<!-- Page content-->
<div class="content-wrapper">
    <h3>Lists<a href="<?=ADMIN_BASE_URL?>customer"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;&nbsp;Back</button></a></h3>
    <div class="container-fluid">
        <!-- START DATATABLE 1 -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover table-body">
                        <thead class="bg-th">
                        <tr class="bg-col">
                        <th class="sr">S.No</th>
                        <th>List Name</th>
                        <th>Share Url</th>
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
                                        $item_view_url = ADMIN_BASE_URL . 'customer/list_items/' . $new->id;
                                        ?>
                                    <tr id="Row_<?=$new->id?>" class="odd gradeX " >
                                        <td width='2%'><?php echo $i;?></td>
                                        <td><?php echo $new->list_name  ?></td>
                                        <td><?php echo BASE_URL.'front/get_list_password/'.$new->share_link ?></td>
                                        <td class="table_action">

                                        <a class="btn yellow c-btn view_details" rel="<?=$new->id?>" title="See Detail"><i class="fa fa-list"  ></i></a>

                                        <?php
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
            </div>
        </div>
    </div>
</div>    



<script type="text/javascript">
$(document).ready(function(){

    $(document).on("click", ".view_details", function(event){
    event.preventDefault();
    var id = $(this).attr('rel');
      $.ajax({
                type: 'POST',
                url: "<?php echo ADMIN_BASE_URL?>customer/list_detail",
                data: {'id': id},
                async: false,
                success: function(test_body) {
                var test_desc = test_body;
                $('#myModal').modal('show')
                $("#myModal .modal-body").html(test_desc);
                }
            });
    });
//=======================================================================================
//=======================================================================================

    $(document).off('click', '.delete_record').on('click', '.delete_record', function(e){
        var id = $(this).attr('rel');
        e.preventDefault();
      swal({
        title : "Are you sure to delete the selected List?",
        text : "You will not be able to recover this List!",
        type : "warning",
        showCancelButton : true,
        confirmButtonColor : "#DD6B55",
        confirmButtonText : "Yes, delete it!",
        closeOnConfirm : false
      },
        function () {
               $.ajax({
                    type: 'POST',
                    url: "<?php echo ADMIN_BASE_URL?>customer/delete_list",
                    data: {'id': id},
                    async: false,
                    success: function() {
                    location.reload();
                    }
                });
        swal("Deleted!", "List has been deleted.", "success");
      });
    });
//=======================================================================================
//=======================================================================================
});
</script>