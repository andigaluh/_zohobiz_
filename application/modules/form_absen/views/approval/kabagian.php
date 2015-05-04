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
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Form Keterangan Tidak <span class="semi-bold">Absen</span></h4>
            </div>
            <div class="grid-body no-border">
            <?php 
            if($_num_rows>0){
              foreach($form_absen as $user){?>
              <form class="form-no-horizontal-spacing" id="formAppLv2" action="<?php echo site_url('form_absen/do_approve_kbg') ?>" method="post"> 
                <div class="row column-seperation">
                  <div class="col-md-12">    
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">No</label>
                      </div>
                      <div class="col-md-9">
                        <input name="form_absen_id" id="form_absen_id" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user->id?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Tanggal</label>
                      </div>
                      <div class="col-md-8">
                        <div class="input-append success no-padding">
                          <input type="text" class="form-control" name="date_tidak_hadir" value="<?php echo $user->date_tidak_hadir?>" disabled="disabled">
                          <!-- <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span> --> 
                        </div>
                      </div>
                    </div>
                    <?php foreach ($user_info as $ui) { ?>
                    <input type="hidden" name="user_id" value="<?php echo $ui->id ?>">
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Nama</label>
                      </div>
                      <div class="col-md-9">
                        <input name="nama" id="nama" type="text"  class="form-control" placeholder="Nama" value="<?php echo $ui->first_name.' '.$ui->last_name ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Dept/Bagian</label>
                      </div>
                      <div class="col-md-9">
                        <input name="org_nm" id="org_nm" type="text"  class="form-control" placeholder="Dept/Bagian" value="<?php echo $ui->org_nm ?>" disabled="disabled">
                      </div>
                    </div>
                    <?php } ?>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Keterangan</label>
                      </div>
                      <div class="col-md-9">
                        <div class="radio">
                          <?php 
                        if($num_rows_keterangan_absen > 0){
                          foreach($keterangan_absen as $row){
                            if ($user->keterangan_id == $row->id) {
                              $checked = "checked";
                            }else {
                              $checked = "";
                            }
                            ?>
                          <input id="tidak_absen_in<?php echo $row->id?>" type="radio" name="keterangan" value="<?php echo $row->id?>" <?php echo $checked ?> disabled="disabled">
                          <label for="tidak_absen_in<?php echo $row->id?>"><?php echo $row->title?></label>
                        <?php }}else{?>
                          <input id="tidak_absen_in" type="radio" name="keterangan" value="0" disabled="disabled">
                          <label for="tidak_absen_in">No Data</label>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Alasan</label>
                      </div>
                      <div class="col-md-9">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Alasan" value="<?php echo $user->alasan?>" disabled="disabled">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="col-md-8 text-center">
                      <div class="row wf-cuti">
                        <div class="col-md-6">
                          Hormat Saya,<br/>
                          <p class="wf-approve-sp">
                            <span class="semi-bold"><?php echo $user->first_name?></span><br/>
                            <span class="small"><?php echo $user->created_on?></span><br/>
                          </p>
                        </div>
                        <div class="col-md-6">
                          Mengetahui,<br/>
                          <p class="wf-approve-sp">
                            <?php if($user->is_app_lv2 == 1){?>
                            <span class="semi-bold"><?php echo $user_app_lv2_nm?></span><br/>
                            <span class="small"><?php echo getDateFormat($user->date_app_lv2) ?></span>
                            <?php }else { ?>
                          </p>
                          <input type="hidden" name="form_absen_id" value="<?php echo $user->id ?>">
                          <button class="btn btn-danger btn-cons" id="btn_app_lv2" type=""><i class="icon-ok"></i>Approve</button>
                          <?php } ?>
                          <p class="">(Ka. Cabang / Ka. Bagian)</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 text-center">
                      <div class="row wf-cuti">
                        <div class="col-md-12">
                          &nbsp;<br/>
                          <p class="wf-approve-sp">
                            <?php if($user->is_app_lv1==1){?>
                            <span class="semi-bold"><?php echo $user_app_lv1_nm?></span><br/>
                            <span class="small"><?php echo getDateFormat($user->date_app_lv1) ?></span>
                            <?php } ?>
                          </p>
                          <p class="">(Supervisor)</p>
                        </div>
                      </div>
                    </div>
                </div>
              </form>
              <?php }}?>
            </div>
          </div>
        </div>
      </div>
              
    
      </div>
    
  </div>  
  <!-- END PAGE --> 