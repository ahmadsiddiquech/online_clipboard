<div class="page-content-wrapper">
  <div class="page-content"> 
    <div class="content-wrapper">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3>
        <?php 
        if (empty($update_id)) 
                    $strTitle = 'Add program';
                else 
                    $strTitle = 'Edit program';
                    echo $strTitle;
                    ?>
                    <a href="<?php echo ADMIN_BASE_URL . 'forget_pass'; ?>"><button type="button" class="btn btn-primary btn-lg pull-right"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;&nbsp;<b>Back</b></button></a>
       </h3>             
         
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tabbable tabbable-custom boxless">
          <div class="tab-content">
          <div class="panel panel-default" style="margin-top:-30px;">
         
            <div class="tab-pane  active" >
              <div class="portlet box green ">
                
                <div class="portlet-body form " style="padding-top:15px;"> 
                  
                  <!-- BEGIN FORM-->
                        <?php
                        $attributes = array('autocomplete' => 'off', 'id' => 'form_sample_1', 'class' => 'form-horizontal');
                        if (empty($update_id)) {
                            $update_id = 0;
                        } else {
                            $hidden = array('hdnId' => $update_id, 'hdnActive' => $news['status']); ////edit case
                        }
                        if (isset($hidden) && !empty($hidden))
                            echo form_open_multipart(ADMIN_BASE_URL . 'forget_pass/submit/' . $update_id, $attributes, $hidden);
                        else
                            echo form_open_multipart(ADMIN_BASE_URL . 'forget_pass/submit/' . $update_id, $attributes);
                        ?>
                  <div class="form-body">
                    
               <div class="row" style="margin-top:15px;">
                       <div class="col-sm-10">
                        <div class="form-group">
                          <?php
                                                        $data = array(
                                                        'name' => 'email',
                                                        'id' => 'email',
                                                        'class' => 'form-control',
                                                        'type' => 'text',
                                                        'required' => 'required',
                                                        'tabindex' => '1',
                                                        'value' => $news['email'],
                                                        'data-parsley-maxlength'=>TEXT_BOX_RANGE
                                                        );
                                                        $attribute = array('class' => 'control-label col-md-2');
                                                        ?>
                                                        
                          <?php echo form_label('Email<span style="color:red">*</span>', 'email', $attribute); ?>
                          <div class="col-md-10"> <?php echo form_input($data); ?></div>
                        </div>
                      </div>
                      </div>
                      <div class="row" >
                       <div class="col-sm-10">
                        <div class="form-group">
                          <?php
                                                        $data = array(
                                                        'name' => 'password',
                                                        'id' => 'password',
                                                        'class' => 'form-control',
                                                        'type' => 'password',
                                                        'required' => 'required',
                                                        'tabindex' => '2',
                                                        'data-parsley-maxlength'=>TEXT_BOX_RANGE
                                                        );
                                                        $attribute = array('class' => 'control-label col-md-2');
                                                        ?>
                                                        
                          <?php echo form_label('password<span style="color:red">*</span>', 'password', $attribute); ?>
                          <div class="col-md-10"> <?php echo form_input($data); ?></div>
                        </div>
                      </div>
                      </div>


                  <div class="form-actions fluid no-mrg">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-offset-2 col-md-9" style="padding-bottom:15px;">
                       <span style="margin-left:40px"></span> <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Save</button>
                        <a href="<?php echo ADMIN_BASE_URL . 'forget_pass'; ?>">
                        <button type="button" class="btn green btn-default" style="margin-left:20px;"><i class="fa fa-undo"></i>&nbsp;Cancel</button>
                        </a> </div>
                    </div>
                  </div>
                </div>
                
                <?php echo form_close(); ?> 
                <!-- END FORM--> 
                
               </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
