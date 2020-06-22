<!-- Page content-->
<div class="content-wrapper">
    <h3>Email for Recovery</h3>
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
                        <th>Email</th>
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
                                    $edit_url = ADMIN_BASE_URL . 'forget_pass/create/' . $new->id ;
                                        ?>
                                    <tr id="Row_<?=$new->id?>" class="odd gradeX " >
                                        <td width='2%'><?php echo $i;?></td>
                                        <td><?php echo $new->email ?></td>
                                        <td class="table_action">

                                        <a class="btn yellow c-btn view_details" rel="<?=$new->id?>" title="See Detail"><i class="fa fa-list"  ></i></a>
                                        <?php
                                        echo anchor($edit_url, '<i class="fa fa-edit"></i>', array('class' => 'action_edit btn blue c-btn','title' => 'Edit Email'));
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
                url: "<?=ADMIN_BASE_URL?>forget_pass/detail",
                data: {'id': id},
                async: false,
                success: function(test_body) {
                var test_desc = test_body;
                $('#myModal').modal('show')
                $("#myModal .modal-body").html(test_desc);
                }
            });
    });

});
</script>



