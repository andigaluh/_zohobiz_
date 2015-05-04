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
                  <h4>Daftar Keterangan Tidak <span class="semi-bold">Absen</span></h4>
                  <div class="tools"> 
                    <a href="<?php echo site_url('form_absen/input')?>" class="config"></a>
                  </div>
                </div>
                  <div class="grid-body no-border">
                          <table class="table table-striped table-flip-scroll cf">
                              <thead>
                                <tr>
                                  <th width="10%">Tanggal</th>
                                  <th width="10%">Nama</th>
                                  <th width="20%">Keterangan</th>
                                  <th width="10%">appr. spv</th>
                                  <th width="10%">appr. ka. bag</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if ($num_rows_all > 0) {
                                  foreach ($form_absen as $user) { ?>
                                  <tr>
                                    <td><a href="<?php echo site_url('form_absen/detail/'.$user->id.'') ?>"><?php echo getDateFormat($user->date_tidak_hadir) ?></a></td>
                                    <td><?php echo $user->first_name.' '.$user->last_name ?></td>
                                    <td><?php echo $user->keterangan_absen ?></td>
                                    <td style="text-align:center;">
                                      <a href="#">
                                        <?php if ($user->is_app_lv1 == 1) { ?>
                                        <a href="<?php echo site_url('form_absen/supervisor/'.$user->id.'') ?>">Ya</a>
                                        <?php } else { ?>
                                        <a href="<?php echo site_url('form_absen/supervisor/'.$user->id.'') ?>"><button type='button' class='btn btn-info btn-small' title='Make Approval'><i class='icon-paste'></i></button></a>
                                        <?php } ?>
                                      </a>
                                    </td>
                                    <td style="text-align:center;">
                                      <a href="#">
                                        <?php if ($user->is_app_lv2 == 1) { ?>
                                        <a href="<?php echo site_url('form_absen/kabagian/'.$user->id.'') ?>">Ya</a>
                                        <?php } else { ?>
                                        <a href="<?php echo site_url('form_absen/kabagian/'.$user->id.'') ?>"><button type='button' class='btn btn-info btn-small' title='Make Approval'><i class='icon-paste'></i></button></a>
                                        <?php } ?>
                                      </a>
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