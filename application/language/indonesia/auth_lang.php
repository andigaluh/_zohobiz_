<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'Form ini tidak memenuhi syarat pengecekan keamanan.';//This form post did not pass our security checks.';

// Login
$lang['login_heading']         = 'Login';
$lang['login_subheading']      = 'Silakan login menggunakan email/username dan password';//'Please login with your email/username and password below.';
$lang['login_identity_label']  = 'Email/Username:';
$lang['login_password_label']  = 'Password:';
$lang['login_remember_label']  = 'Ingat saya:';//Remember Me:';
$lang['login_submit_btn']      = 'Login';
$lang['login_forgot_password'] = 'Lupa password?';//'Forgot your password?';

// Index
$lang['index_heading']           = 'Pengguna'//'Users';
$lang['index_subheading']        = 'Daftar pengguna';//'Below is a list of the users.';
$lang['index_fname_th']          = 'Nama Depan';//'First Name';
$lang['index_lname_th']          = 'Nama Belakang';//'Last Name';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Grup';//'Groups';
$lang['index_status_th']         = 'Status';
$lang['index_action_th']         = 'Aksi';//'Action';
$lang['index_active_link']       = 'Aktif';//'Active';
$lang['index_inactive_link']     = 'Tidak aktif';//'Inactive';
$lang['index_create_user_link']  = 'Buat pengguna baru';//'Create a new user';
$lang['index_create_group_link'] = 'Buat grup baru';//'Create a new group';
$lang['index_course_title_th'] 	 = 'Deskripsi Kursus';

// Deactivate User
$lang['deactivate_heading']                  = 'Non aktifkan pengguna';//'Deactivate User';
$lang['deactivate_subheading']               = 'Apakah anda yakin akan me-non-aktifkan pengguna \'%s\'';//'Are you sure you want to deactivate the user \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Ya:';//'Yes:';
$lang['deactivate_confirm_n_label']          = 'Tidak:'//'No:';
$lang['deactivate_submit_btn']               = 'Submit';
$lang['deactivate_validation_confirm_label'] = 'konfirmasi';//'confirmation';
$lang['deactivate_validation_user_id_label'] = 'ID pengguna'//'user ID';

// Create User
$lang['create_user_heading']                           = 'Buat pengguna';//'Create User';
$lang['create_user_subheading']                        = 'Silakan masukan informasi pengguna';//'Please enter the user\'s information below.';
$lang['create_user_fname_label']                       = 'Nama Depan:';//'First Name:';
$lang['create_user_lname_label']                       = 'Nama Belakang';//'Last Name:';
$lang['create_user_company_label']                     = 'Nama Perusahaan';//'Company Name:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'Phone:';
$lang['create_user_password_label']                    = 'Password:';
$lang['create_user_password_confirm_label']            = 'Konfirmasi Password:';//'Confirm Password:';
$lang['create_user_submit_btn']                        = 'Buat pengguna';//'Create User';
$lang['create_user_validation_fname_label']            = 'Nama Depan:';//'First Name';
$lang['create_user_validation_lname_label']            = 'Nama Belakang';//'Last Name';
$lang['create_user_validation_email_label']            = 'Alamat Email';//'Email Address';
$lang['create_user_validation_phone1_label']           = 'Bagian pertama dari no. telepon';//'First Part of Phone';
$lang['create_user_validation_phone2_label']           = 'Bagian kedua dari no. telepon';//'Second Part of Phone';
$lang['create_user_validation_phone3_label']           = 'Bagian ketiga dari no. telepon';//'Third Part of Phone';
$lang['create_user_validation_company_label']          = 'Nama Perusahaan';//'Company Name';
$lang['create_user_validation_password_label']         = 'Password';
$lang['create_user_validation_password_confirm_label'] = 'Konfirmasi Password';//'Password Confirmation';

// Edit User
$lang['edit_user_heading']                           = 'Ubah pengguna';//'Edit User';
$lang['edit_user_subheading']                        = 'Silakan masukan informasi pengguna';//'Please enter the user\'s information below.';
$lang['edit_user_fname_label']                       = 'Nama Depan:';//'First Name:';
$lang['edit_user_lname_label']                       = 'Nama Belakang';//'Last Name:';
$lang['edit_user_company_label']                     = 'Nama Perusahaan';//'Company Name:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Phone:';
$lang['edit_user_password_label']                    = 'Password: (Jika ada perubahan)';//'Password: (if changing password)';
$lang['edit_user_password_confirm_label']            = 'Konfirmasi Password: (Jika ada perubahan)';//'Confirm Password: (if changing password)';
$lang['edit_user_groups_heading']                    = 'Anggota dari grup';//'Member of groups';
$lang['edit_user_submit_btn']                        = 'Simpan pengguna';//'Save User';
$lang['edit_user_validation_fname_label']            = 'Nama Depan:';//'First Name';
$lang['edit_user_validation_lname_label']            = 'Nama Belakang';//'Last Name';
$lang['edit_user_validation_email_label']            = 'Alamat Email';//'Email Address';
$lang['edit_user_validation_phone1_label']           = 'Bagian pertama dari no. telepon';//'First Part of Phone';
$lang['edit_user_validation_phone2_label']           = 'Bagian kedua dari no. telepon';//'Second Part of Phone';
$lang['edit_user_validation_phone3_label']           = 'Bagian ketiga dari no. telepon';//'Third Part of Phone';
$lang['edit_user_validation_company_label']          = 'Nama Perusahaan';//'Company Name';
$lang['edit_user_validation_groups_label']           = 'Grup';//'Groups';
$lang['edit_user_validation_password_label']         = 'Password';
$lang['edit_user_validation_password_confirm_label'] = 'Konfirmasi Password';//'Password Confirmation';

// Create Group
$lang['create_group_title']                  = 'Buat Grup';//'Create Group';
$lang['create_group_heading']                = 'Buat Grup';//'Create Group';
$lang['create_group_subheading']             = 'Silakan masukkan informasi grup.';//'Please enter the group information below.';
$lang['create_group_name_label']             = 'Nama Grup:';//'Group Name:';
$lang['create_group_desc_label']             = 'Keterangan:';//'Description:';
$lang['create_group_submit_btn']             = 'Buat Grup';//'Create Group';
$lang['create_group_validation_name_label']  = 'Nama Grup';//'Group Name';
$lang['create_group_validation_desc_label']  = 'Keterangan';//'Description';

// Edit Group
$lang['edit_group_title']                  = 'Ubah Grup';//'Edit Group';
$lang['edit_group_saved']                  = 'Grup tersimpan';//'Group Saved';
$lang['edit_group_heading']                = 'Ubah Grup';//'Edit Group';
$lang['edit_group_subheading']             = 'Silakan masukkan informasi grup.';//'Please enter the group information below.';
$lang['edit_group_name_label']             = 'Nama Grup:';//'Group Name:';
$lang['edit_group_desc_label']             = 'Keterangan:';//'Description:';
$lang['edit_group_submit_btn']             = 'Simpan Grup';//'Save Group';
$lang['edit_group_validation_name_label']  = 'Nama Grup';//'Group Name';
$lang['edit_group_validation_desc_label']  = 'Keterangan';//'Description';

// Change Password
$lang['change_password_heading']                               = 'Ubah Password';//'Change Password';
$lang['change_password_old_password_label']                    = 'Password Lama:';//'Old Password:';
$lang['change_password_new_password_label']                    = 'Password Baru (minimal %s karakter)';//'New Password (at least %s characters long):';
$lang['change_password_new_password_confirm_label']            = 'Konfirmasi Password Baru';//'Confirm New Password:';
$lang['change_password_submit_btn']                            = 'Ubah';//'Change';
$lang['change_password_validation_old_password_label']         = 'Password Lama';//'Old Password';
$lang['change_password_validation_new_password_label']         = 'Password Baru';//'New Password';
$lang['change_password_validation_new_password_confirm_label'] = 'Konfirmasi Password Baru';//'Confirm New Password';

// Forgot Password
$lang['forgot_password_heading']                 = 'Lupa Password';//'Forgot Password';
$lang['forgot_password_subheading']              = 'Silakan masukkan %s anda sehingga kami dapan mengirimkan email untuk mengembalikan password anda.';//'Please enter your %s so we can send you an email to reset your password.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Submit';
$lang['forgot_password_validation_email_label']  = 'Alamat Email';//'Email Address';
$lang['forgot_password_username_identity_label'] = 'Username';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'Tidak ada data dari email tersebut.';//'No record of that email address.';

// Reset Password
$lang['reset_password_heading']                               = 'Ubah Password';//'Change Password';
$lang['reset_password_new_password_label']                    = 'Password Baru (minimal %s karakter)';//'New Password (at least %s characters long):';
$lang['reset_password_new_password_confirm_label']            = 'Konfirmasi Password Baru';//'Confirm New Password:';
$lang['reset_password_submit_btn']                            = 'Ubah';//'Change';
$lang['reset_password_validation_new_password_label']         = 'Password Baru';//'New Password';
$lang['reset_password_validation_new_password_confirm_label'] = 'Konfirmasi Password Baru';//'Confirm New Password';



//additional
$lang['login_user_heading']						= 'Masuk ke Dalam Web-HRIS';
$lang['company_name']							= 'PT. Penerbit Erlangga';
$lang['register_here']							= 'Daftar disini';
$lang['register_opening_description']			= 'untuk akun web-HRIS PT. Penerbit Erlangga.';

//marital
$lang['mar_subheading'] = "Marital";
$lang['add_mar'] = "Tambah Marital";
$lang['edit_mar'] = 'Ubah Marital';

//resign reason
$lang['res_reason_subheading'] = "Resign Reason";
$lang['add_res_reason'] = "Tambah Resign Reason";
$lang['edit_res_reason'] = 'Ubah Resign Reason';

//experience level
$lang['exp_lvl_subheading'] = "Experience Level";
$lang['add_exp_lvl'] = "Tambah Experience Level";
$lang['edit_exp_lvl'] = 'Ubah Experience Level';

//grade
$lang['gra_subheading'] = "Grade";
$lang['add_gra'] = "Tambah Grade";
$lang['edit_gra'] = 'Ubah Grade';

//ikatan dinas type
$lang['iktn_dns_type_subheading'] = "Ikatan Dinas Type";
$lang['add_iktn_dns_type'] = "Tambah Ikatan Dinas Type";
$lang['edit_iktn_dns_type'] = 'Ubah Ikatan Dinas Type';

//course status
$lang['crs_Status_subheading'] = "Course Status";
$lang['add_crs_status'] = "Tambah Course Status";
$lang['edit_crs_status'] = 'Ubah Course Status';

//certification type
$lang['crt_type_subheading'] = "Certification Type";
$lang['add_crt_type'] = "Tambah Certification Type";
$lang['edit_crt_type'] = 'Ubah Certification Type';

//award warning type
$lang['awrd_warn_type_subheading'] = "Award Warning Type";
$lang['add_awrd_warn_type'] = "Tambah Award Warning Type";
$lang['edit_awrd_warn_type'] = 'Ubah Award Warning Type';

//education group
$lang['edu_group_subheading'] = "Education Group";
$lang['add_edu_group'] = "Tambah Education Group";
$lang['edit_edu_group'] = 'Ubah Education Group';

//education center
$lang['edu_center_subheading'] = "Education Center";
$lang['add_edu_center'] = "Tambah Education Center";
$lang['edit_edu_center'] = 'Ubah Education Center';

//experience field
$lang['exp_fld_subheading'] = "Experience Field";
$lang['add_exp_fld'] = "Tambah Experience Field";
$lang['edit_exp_fld'] = 'Ubah Experience Field';

//empl status
$lang['empl_stat_subheading'] = "Empl Status";
$lang['add_empl_stat'] = "Tambah Empl Status";
$lang['edit_empl_stat'] = 'Ubah Empl Status';

//employee status
$lang['employee_stat_subheading'] = "Employee Status";
$lang['add_employee_stat'] = "Tambah Employee Status";
$lang['edit_employee_stat'] = 'Ubah Employee Status';

//library table
$lang['library_table_subheading'] = 'Library Table';

//experience year
$lang['exp_yr_subheading'] = "Experience Year";
$lang['add_exp_yr'] = "Tambah Experience Year";
$lang['edit_exp_yr'] = 'Ubah Experience Year';

//education degree
$lang['edu_degree_subheading'] = "Education Degree";
$lang['add_edu_degree'] = "Tambah Education Degree";
$lang['edit_edu_degree'] = 'Ubah Education Degree';

//active inactive
$lang['act_inactive_subheading'] = "Active Inactive";
$lang['add_act_inactive'] = "Tambah Active Inactive";
$lang['edit_act_inactive'] = 'Ubah Active Inactive';

//form_cuti
$lang['form'] = "Form";
$lang['list_of_submission'] = "Daftar Pengajuan";
$lang['form_cuti_subheading'] = "Cuti";
$lang['date'] = "Tanggal";
$lang['reason'] = "Alasan";
$lang['count_cuti'] = "Jumlah cuti";
$lang['start_cuti'] = "Mulai Cuti";
$lang['end_cuti'] = "Selesai Cuti";
$lang['count_day'] = "Jumlah Hari";
$lang['replacement'] = "Pengganti";
$lang['addr_cuti'] = "Alamat selama cuti";
$lang['emp_info'] = "Informasi Karyawan";
$lang['start_working'] = "Mulai Bekerja";
$lang['dept_div'] = "Dept/Bagian";
$lang['position'] = "Jabatan";
$lang['cuti_remain'] = "Sisa Cuti (hari)";
$lang['cuti_input_subheading'] = "Cuti yang akan diambil";
$lang['start_cuti_date'] = "Tgl. mulai cuti";
$lang['name'] = "Nama";

//form_absen
$lang['keterangan'] = "Keterangan";

//form_training
$lang['emp_name'] = "Nama Karyawan";
$lang['trn_name'] = "Nama Pelatihan";





