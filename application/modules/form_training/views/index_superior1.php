<!-- BEGIN PAGE CONTAINER-->
  <div class="page-content"> 
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">  
		
		
	    <div id="container">
        <div class="row">
          <div class="col-md-12">
              <div class="grid simple ">
                <div class="grid-title no-border">
                  <h4>Daftar Permintaan <span class="semi-bold">Pelatihan</span></h4>
                  <div class="tools"> 
                    <a href="<?php echo site_url('form_training/input')?>" class="config"></a>
                  </div>
                </div>
                  <div class="grid-body no-border">
                        
                          <table class="table table-striped table-flip-scroll cf">
                              <thead>
                                <tr>
                                  <th width="20%"><?php echo lang('emp_name') ?></th>
                                  <th width="10%"><?php echo lang('trn_name') ?></th>
                                  <th width="40%">Tujuan</th>
                                  <th width="10%" style="text-align:center;">APPR SPV</th>
                                  <th width="10%" style="text-align:center;">APPR HRD</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if ($_num_rows > 0) {
                                  foreach ($form_training as $user) { ?>
                                  <tr>
                                    <td>
                                      <a href="<?php echo site_url('form_training/detail/'.$user->id)?>"><?php echo $user->first_name.' '.$user->last_name?></a>
                                    </td>

                                    <td>
                                      <?php echo $user->training_name?>
                                    </td>

                                    <td>
                                      <?php echo $user->tujuan_training?>
                                    </td>

                                    <td style="text-align:center;">
                                    <?php if ($user->is_app_lv1 == 0) { ?>
                                    <a href="<?php echo site_url('form_training/supervisor')."/".$user->id ?>">
                                        <button type='button' class='btn btn-info btn-small' title='Make Approval'><i class='icon-paste'></i></button>
                                    </a>
                                    <?php } else { ?>
                                    <span>Ya</span>
                                    <?php } ?>
                                    </td>
                                    <td style="text-align:center;">
                                    <?php if ($user->is_app_lv2 == 0) { ?>
                                        <button type='button' class='btn btn-info btn-small' title='Make Approval'><i class='icon-paste'></i></button>
                                    <?php } else { ?>
                                    <span>Ya</span>
                                    <?php } ?>
                                    </td>
                                  </tr>
                                  <?php }} else { ?>
                                  <tr>
                                      <td valign="middle" colspan="5">
                                          <p class="text-center">No Data</p>
                                      </td>
                                  </tr>
                                  <?php } ?>
                              </tbody>
                          </table>
                  </div>
              </div>
          </div>
        </div>
      </div>
	          	
		
      </div>
		
	</div>  
	<!-- END PAGE --> 