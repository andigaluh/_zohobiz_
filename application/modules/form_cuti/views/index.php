BEGIN PAGE CONTAINER-->
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
                  <h4><?php echo lang('list_of_submission'); ?> <span class="semi-bold"><?php echo lang('form_cuti_subheading'); ?></span></h4>
                  <div class="tools"> 
                    <a href="<?php echo site_url('form_cuti/input'); ?>" class="config"></a>
                  </div>
                </div>
                  <div class="grid-body no-border">
                          <!-- <table class="table table-striped table-flip-scroll cf"> -->
                          <table class="table table-bordered" id="table_cuti">
                              <thead>
                                <tr>
                                  <th width="15%"><?php echo lang('name') ?></th>
                                  <th width="15%"><?php echo lang('date') ?></th>
                                  <th width="20%"><?php echo lang('reason') ?></th>
                                  <th width="10%"><?php echo lang('count_cuti') ?></th>
                                  <th width="15%">appr. spv</th>
                                  <th width="15%">appr. ka. bag</th>
                                  <th width="15%">appr. HRD</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if ($_num_rows > 0) {?>
                                  <?php foreach ($form_cuti as $user) :?>
                                  <?php
                                  $id_cuti = $user->id;
                                  $user_id = $user->user_id;
                                  $user_pengajuan = $this->form_cuti_model->where('users.id',$user_id)->render_emp()->row();

                                  // approval cuti
                                  $txt_app_lv1 = $txt_app_lv2 = $txt_app_lv3 = "-";
                                  /*$txt_app_lv1 = ($user->is_app_lv1 == 1) ? "Ya" : ($this->ion_auth->is_superior1()) ? '<a href="'.site_url('form_cuti/approval_spv/'.$id_cuti).'">approve</a>' : "-";*/
                                  if ($user->is_app_lv1 == 1) {
                                    $txt_app_lv1 = "Ya";
                                  }elseif ($this->ion_auth->is_superior1()) {
                                    $txt_app_lv1 = "<a href='".site_url('form_cuti/approval_spv/'.$id_cuti)."'>approve</a>";
                                  }else{
                                    $txt_app_lv1 = "-";
                                  }
                                  
                                  if ($user->is_app_lv2 == 1) {
                                      $txt_app_lv2 = "Ya";
                                  }
                                  if ($user->is_app_lv3 == 1) {
                                      $txt_app_lv3 = "Ya";
                                  }

                                  // date cuti
                                  $date_now = date('Y-m-d');

                                  $datetime1 = new DateTime($date_now);
                                  $datetime2 = new DateTime($user->date_selesai_cuti);
                                  $interval = $datetime1->diff($datetime2);
                                  $sisa_cuti = $interval->format('%a');
                                  if ($datetime2 <= $datetime1) {
                                    $sisa_cuti = 0;
                                  }
                                  
                                  // user pengganti name
                                  $user_pengganti = $user->first_name." ".$user->last_name;
                                  ?>
                                  <!-- <tr class="itemcuti" id="<?php echo $id_cuti; ?>"> -->
                                  <tr class="itemcuti" id="<?php echo $id_cuti; ?>">
                                    <td valign="middle">
                                      <a href="#" id="viewcuti-<?php echo $id_cuti; ?>"><?php echo $user_pengajuan->first_name.' '.$user_pengajuan->last_name; ?></a>
                                    </td>
                                    <td valign="middle">
                                      <?php echo getDateFormat($user->date_mulai_cuti); ?>
                                    </td>
                                    <td valign="middle">
                                      <?php echo $user->alasan_cuti; ?>
                                    </td>
                                    <td valign="middle">
                                      <?php echo $user->jumlah_hari; ?> hari
                                    </td>
                                    <td valign="middle">
                                      <?php echo $txt_app_lv1; ?>
                                    </td>
                                    <td valign="middle">
                                      <?php echo $txt_app_lv2; ?>
                                    </td>
                                    <td valign="middle">
                                      <?php echo $txt_app_lv3; ?>
                                    </td>
                                  </tr>
                                  <tr id="cutidetail-<?php echo $id_cuti; ?>" style="display:none">
                                    <td class="detail" colspan="8">
                                      <div class="row">
                                        <form action="<?php echo site_url('form_cuti/delete/'.$id_cuti)?>" method="enctype" id="cuti_delete" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                          <div class="col-md-12">
                                            <div class="grid simple">
                                              <div class="grid-title no-border">
                                                <input type="hidden" name="cuti_id" id="cuti_id" value="<?php echo $id_cuti; ?>">
                                                <h4>ID : #<?php echo $id_cuti; ?></h4>
                                              </div>
                                              <div class="grid-body no-border">
                                                <div class="row column-seperation">
                                                  <div class="col-md-5">
                                                    <div class="row form-row">
                                                      <div class="col-md-3">
                                                        <label class="form-label text-right"><?php echo lang('start_working') ?></label>
                                                      </div>
                                                      <div class="col-md-9">
                                                        <input name="seniority_date" id="seniority_date" type="text"  class="form-control" placeholder="Lama Bekerja" value="<?php echo getDateFormat($user->seniority_date); ?>" disabled="disabled">
                                                      </div>
                                                    </div>
                                                    <div class="row form-row">
                                                      <div class="col-md-3">
                                                        <label class="form-label text-right"><?php echo lang('name') ?></label>
                                                      </div>
                                                      <div class="col-md-9">
                                                        <input name="name" id="name" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user_pengajuan->first_name.' '.$user_pengajuan->last_name; ?>" disabled="disabled">
                                                      </div>
                                                    </div>
                                                    <div class="row form-row">
                                                      <div class="col-md-3">
                                                        <label class="form-label text-right"><?php echo lang('dept_div') ?></label>
                                                      </div>
                                                      <div class="col-md-9">
                                                        <input name="organization" id="organization" type="text"  class="form-control" placeholder="Organization" value="<?php echo $user_pengajuan->organization_title; ?>" disabled="disabled">
                                                      </div>
                                                    </div>
                                                    <div class="row form-row">
                                                      <div class="col-md-3">
                                                        <label class="form-label text-right"><?php echo lang('position') ?></label>
                                                      </div>
                                                      <div class="col-md-9">
                                                        <input name="position" id="position" type="text"  class="form-control" placeholder="Jabatan" value="<?php echo $user_pengajuan->position_title; ?>" disabled="disabled">
                                                      </div>
                                                    </div>
                                                    <div class="row form-row">
                                                      <div class="col-md-3">
                                                        <label class="form-label text-right"><?php echo lang('cuti_remain') ?></label>
                                                      </div>
                                                      <div class="col-md-9">
                                                        <input name="sisa_cuti" id="sisa_cuti" type="text"  class="form-control" placeholder="Sisa Cuti" value="<?php echo $sisa_cuti; ?>" disabled="disabled">
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-7">
                                                    <div class="row form-row">
                                                      <div class="col-md-3">
                                                        <label class="form-label text-right"><?php echo lang('year') ?></label>
                                                      </div>
                                                      <div class="col-md-9">
                                                        <input name="description" id="description" type="text"  class="form-control" placeholder="Description" value="<?php echo $user->comp_session; ?>" disabled="disabled">
                                                      </div>
                                                    </div>
                                                    <div class="row form-row">
                                                      <div class="col-md-3">
                                                        <label class="form-label text-right"><?php echo lang('start_cuti_date') ?></label>
                                                      </div>
                                                      <div class="col-md-3">
                                                        <input name="registration_date" id="registration_date" type="text"  class="form-control" placeholder="Registration Date" value="<?php echo getDateFormat($user->date_mulai_cuti); ?>" disabled="disabled">
                                                      </div>
                                                      <div class="col-md-2">
                                                        <label class="form-label text-center">s/d</label>
                                                      </div>
                                                      <div class="col-md-3">
                                                        <input name="status" id="status" type="text"  class="form-control" placeholder="Status" value="<?php echo getDateFormat($user->date_selesai_cuti); ?>" disabled="disabled">
                                                      </div>
                                                    </div>
                                                    <div class="row form-row">
                                                      <div class="col-md-3">
                                                        <label class="form-label text-right"><?php echo lang('count_day') ?></label>
                                                      </div>
                                                      <div class="col-md-2">
                                                        <input name="courseid" id="courseid" type="text"  class="form-control" placeholder="courseid" value="<?php echo $user->jumlah_hari; ?>" disabled="disabled">
                                                      </div>
                                                    </div>
                                                    <div class="row form-row">
                                                      <div class="col-md-3">
                                                        <label class="form-label text-right"><?php echo lang('reason') ?></label>
                                                      </div>
                                                      <div class="col-md-9">
                                                        <input name="status" id="status" type="text"  class="form-control" placeholder="Status" value="<?php echo $user->alasan_cuti; ?>" disabled="disabled">
                                                      </div>
                                                    </div>
                                                    <div class="row form-row">
                                                      <div class="col-md-3">
                                                        <label class="form-label text-right"><?php echo lang('replacement') ?></label>
                                                      </div>
                                                      <div class="col-md-9">
                                                        <input name="status" id="status" type="text"  class="form-control" placeholder="Status" value="<?php echo $user_pengganti; ?>" disabled="disabled">
                                                      </div>
                                                    </div>
                                                    <div class="row form-row">
                                                      <div class="col-md-3">
                                                        <label class="form-label text-right"><?php echo lang('addr_cuti') ?></label>
                                                      </div>
                                                      <div class="col-md-9">
                                                        <input name="status" id="status" type="text"  class="form-control" placeholder="Status" value="<?php echo $user->alamat_cuti; ?>" disabled="disabled">
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-12 text-right">
                                                    <button id="delete_cuti" name="delete_cuti" value="1" class="btn btn-danger" type="submit">delete</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </form>
                                    </div>
                                  </td>
                                </tr>
                                <?php endforeach; ?>
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
	<!-- END PAGE