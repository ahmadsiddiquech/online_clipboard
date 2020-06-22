<?php
if (isset($news)) {
    $new_news = $news->result_array();
}?>
<section>
    <div class="container-fluid">
        <div class="row" style="padding-top: 80px;">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-10" align="centre">
                        <h2 style="text-align: center;"><?=$new_news[0]['list_name']?></h2>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover table-body">
                        <thead class="bg-th">
                        <tr class="bg-col">
                        <th class="sr">S.No</th>
                        <th>Webpage Title</th>
                        <th>Webpage Url</th>
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
    
</section>