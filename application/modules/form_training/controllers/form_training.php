<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Form_training extends MX_Controller {

    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->library('authentication', NULL, 'ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('url');
        
        $this->load->database();
        $this->load->model('form_training/form_training_model','form_training_model');
        
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->helper('language');
    }

    function index($ftitle = "fn:",$sort_by = "id", $sort_order = "desc", $offset = 0)
    {
        $user_id = $this->session->userdata('user_id');
        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        elseif ($this->ion_auth->is_admin()) 
        {
            $this->index_admin("fn:","id","desc",0);
            
        }
        else
        {
            $this->index_member("fn:","id","desc",0);
        }
    }


    function index_admin($ftitle = "fn:",$sort_by = "id", $sort_order = "desc", $offset = 0)
    {
        $user_id = $this->session->userdata('user_id');
        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else
        {
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //set sort order
            $this->data['sort_order'] = $sort_order;
            
            //set sort by
            $this->data['sort_by'] = $sort_by;
              
            //set filter by title
            $this->data['ftitle_param'] = $ftitle; 
            $exp_ftitle = explode(":",$ftitle);
            $ftitle_re = str_replace("_", " ", $exp_ftitle[1]);
            $ftitle_post = (strlen($ftitle_re) > 0) ? array('form_training.title'=>$ftitle_re) : array() ;
            
            //set default limit in var $config['list_limit'] at application/config/ion_auth.php 
            $this->data['limit'] = $limit = (strlen($this->input->post('limit')) > 0) ? $this->input->post('limit') : 10 ;
            $this->data['offset'] = 6;

            //list of filterize all form_training  
            $this->data['form_training_all'] = $this->form_training_model->like($ftitle_post)->where('users_training.is_deleted',0)->form_training()->result();
            
            $this->data['num_rows_all'] = $this->form_training_model->like($ftitle_post)->where('users_training.is_deleted',0)->form_training()->num_rows();

            //list of filterize limit form_training for pagination  
            $this->data['form_training'] = $this->form_training_model->like($ftitle_post)->where('users_training.is_deleted',0)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->form_training()->result();

            $this->data['_num_rows'] = $this->form_training_model->like($ftitle_post)->where('users_training.is_deleted',0)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->form_training()->num_rows();

            $this->_render_page('form_training/index', $this->data);
        }
    }

    function index_member($ftitle = "fn:",$sort_by = "id", $sort_order = "desc", $offset = 0)
    {
        //redirect them to the home page because they must be an administrator to view this
        //return show_error('You must be an administrator to view this page.');
        $id = $this->ion_auth->user()->row()->id;

        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

        //set sort order
        $this->data['sort_order'] = $sort_order;
        
        //set sort by
        $this->data['sort_by'] = $sort_by;
          
        //set filter by title
        $this->data['ftitle_param'] = $ftitle; 
        $exp_ftitle = explode(":",$ftitle);
        $ftitle_re = str_replace("_", " ", $exp_ftitle[1]);
        $ftitle_post = (strlen($ftitle_re) > 0) ? array('form_training.title'=>$ftitle_re) : array() ;
        
        //set default limit in var $config['list_limit'] at application/config/ion_auth.php 
        $this->data['limit'] = $limit = (strlen($this->input->post('limit')) > 0) ? $this->input->post('limit') : 10 ;

        $this->data['offset'] = 6;

        //list of filterize all form_training  
        $this->data['form_training_all'] = $this->form_training_model->like($ftitle_post)->where('users_training.is_deleted',0)->where('users_training.user_id',$id)->form_training()->result();
        
        $this->data['num_rows_all'] = $this->form_training_model->like($ftitle_post)->where('users_training.is_deleted',0)->where('users_training.user_id',$id)->form_training()->num_rows();

        //list of filterize limit form_training for pagination  
        $this->data['form_training'] = $this->form_training_model->like($ftitle_post)->where('users_training.is_deleted',0)->where('users_training.user_id',$id)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->form_training()->result();

        $this->data['_num_rows'] = $this->form_training_model->like($ftitle_post)->where('users_training.is_deleted',0)->where('users_training.user_id',$id)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->form_training()->num_rows();

        $this->_render_page('form_training/index', $this->data);
    }

    function index_superior1($ftitle = "fn:",$sort_by = "id", $sort_order = "desc", $offset = 0)
    {
        $user_id = $this->session->userdata('user_id');
        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        elseif ($this->ion_auth->is_superior1())
        {
            $id = $this->ion_auth->user()->row()->id;

            $q_position_id = $this->form_training_model->where('users_employement.user_id',$id)->render_emp()->row();

            $position_id = $q_position_id->position_id;

            $organization_id = $q_position_id->organization_id;

            //die($organization_id);

            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //set sort order
            $this->data['sort_order'] = $sort_order;
            
            //set sort by
            $this->data['sort_by'] = $sort_by;
              
            //set filter by title
            $this->data['ftitle_param'] = $ftitle; 
            $exp_ftitle = explode(":",$ftitle);
            $ftitle_re = str_replace("_", " ", $exp_ftitle[1]);
            $ftitle_post = (strlen($ftitle_re) > 0) ? array('form_training.title'=>$ftitle_re) : array() ;
            
            //set default limit in var $config['list_limit'] at application/config/ion_auth.php 
            $this->data['limit'] = $limit = (strlen($this->input->post('limit')) > 0) ? $this->input->post('limit') : 10 ;

            $this->data['offset'] = 6;

            //list of filterize all form_training  
            $this->data['form_training_all'] = $this->form_training_model->like($ftitle_post)->where('users_training.is_deleted',0)->where('organization.parent_organization_id',$organization_id)->form_training()->result();
            
            $this->data['num_rows_all'] = $this->form_training_model->like($ftitle_post)->where('users_training.is_deleted',0)->where('organization.parent_organization_id',$organization_id)->form_training()->num_rows();

            //list of filterize limit form_training for pagination  
            $this->data['form_training'] = $this->form_training_model->like($ftitle_post)->where('users_training.is_deleted',0)->where('position.parent_position_id',$position_id)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->form_training()->result();
            //echo $this->db->last_query();
            $this->data['_num_rows'] = $this->form_training_model->like($ftitle_post)->where('users_training.is_deleted',0)->where('position.parent_position_id',$position_id)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->form_training()->num_rows();

            $this->_render_page('form_training/index_superior1', $this->data);
        }else{
            return show_error("You must be an superior 1 to view this page.");
        }
    }

    function index_hr($ftitle = "fn:",$sort_by = "id", $sort_order = "desc", $offset = 0)
    {
        $user_id = $this->session->userdata('user_id');
        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        elseif ($this->ion_auth->is_hr())
        {
            $id = $this->ion_auth->user()->row()->id;
            //die($id);
            $q_position_id = $this->form_training_model->where('users_employement.user_id',$id)->render_emp()->row();

            $this->data['position_id'] = $position_id = $q_position_id->position_id;

            $this->data['organization_id'] = $organization_id = $q_position_id->organization_id;
            //die('$organization_id='.$organization_id);
            //die($organization_id);

            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //set sort order
            $this->data['sort_order'] = $sort_order;
            
            //set sort by
            $this->data['sort_by'] = $sort_by;
              
            //set filter by title
            $this->data['ftitle_param'] = $ftitle; 
            $exp_ftitle = explode(":",$ftitle);
            $ftitle_re = str_replace("_", " ", $exp_ftitle[1]);
            $ftitle_post = (strlen($ftitle_re) > 0) ? array('form_training.title'=>$ftitle_re) : array() ;
            
            //set default limit in var $config['list_limit'] at application/config/ion_auth.php 
            $this->data['limit'] = $limit = (strlen($this->input->post('limit')) > 0) ? $this->input->post('limit') : 10 ;

            $this->data['offset'] = 6;

            //list of subordinate1  
            $this->data['q_subordinate1'] = $this->data['q_subordinate1'] =$this->form_training_model->where('position.parent_position_id',$position_id)->render_emp()->result();
            $this->data['q_subordinate1_num_rows'] = $this->form_training_model->where('position.parent_position_id',$position_id)->render_emp()->num_rows();
            
            $this->data['num_rows_all'] = $this->form_training_model->like($ftitle_post)->where('users_training.is_deleted',0)->where('position.parent_position_id',$position_id)->form_training()->num_rows();

            $this->_render_page('form_training/index_hr', $this->data);
        }else{
            return show_error("You must be an HR to view this page.");
        }
    }

    function detail($id)
    {

        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else
        {
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $form_training = $this->data['form_training'] = $this->form_training_model->where('users_training.id',$id)->form_training()->result();
            $this->data['_num_rows'] = $this->form_training_model->where('users_training.id',$id)->form_training()->num_rows();

            foreach ($form_training as $fa) {
                $user_id = $fa->user_id;
                $is_app_lv1 = $fa->is_app_lv1;
                $user_app_lv1 = $fa->user_app_lv1;
                $is_app_lv2 = $fa->is_app_lv2;
                $user_app_lv2 = $fa->user_app_lv2;
            }

            //approval check
            if ($is_app_lv1 == 1) {
                $user_info_lv1 = $this->form_training_model->where('users.id',$user_app_lv1)->get_user()->result();
                foreach ($user_info_lv1 as $ui1) {
                    $this->data['user_app_lv1_nm'] = $ui1->first_name." ".$ui1->last_name; 
                }  
            }else {
                $this->data['user_app_lv1_nm'] = "";
            }
            if ($is_app_lv2 == 1) {
                $user_info_lv2 = $this->form_training_model->where('users.id',$user_app_lv2)->get_user()->result();
                foreach ($user_info_lv2 as $ui2) {
                    $this->data['user_app_lv2_nm'] = $ui2->first_name." ".$ui2->last_name; 
                }  
            }else {
                $this->data['user_app_lv2_nm'] = "";
            }

            // render data
            $this->data['user_info'] = $this->form_training_model->where('users.id',$user_id)->get_user()->result();

            $this->_render_page('form_training/detail', $this->data);
        }
    }

    function hr($id)
    {

        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else
        {
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $form_training = $this->data['form_training'] = $this->form_training_model->where('users_training.id',$id)->form_training()->result();
            $this->data['_num_rows'] = $this->form_training_model->where('users_training.id',$id)->form_training()->num_rows();

            foreach ($form_training as $fa) {
                $user_id = $fa->user_id;
                $is_app_lv1 = $fa->is_app_lv1;
                $user_app_lv1 = $fa->user_app_lv1;
                $is_app_lv2 = $fa->is_app_lv2;
                $user_app_lv2 = $fa->user_app_lv2;
            }

            //approval check
            if ($is_app_lv1 == 1) {
                $user_info_lv1 = $this->form_training_model->where('users.id',$user_app_lv1)->get_user()->result();
                foreach ($user_info_lv1 as $ui1) {
                    $this->data['user_app_lv1_nm'] = $ui1->first_name." ".$ui1->last_name; 
                }  
            }else {
                $this->data['user_app_lv1_nm'] = "";
            }
            if ($is_app_lv2 == 1) {
                $user_info_lv2 = $this->form_training_model->where('users.id',$user_app_lv2)->get_user()->result();
                foreach ($user_info_lv2 as $ui2) {
                    $this->data['user_app_lv2_nm'] = $ui2->first_name." ".$ui1->last_name; 
                }  
            }else {
                $this->data['user_app_lv2_nm'] = "";
            }

            // render data
            $this->data['penyelenggara_list'] = $this->form_training_model->where('is_deleted',0)->render_penyelenggara()->result();
            $this->data['penyelenggara_list_row'] = $this->form_training_model->where('is_deleted',0)->render_penyelenggara()->num_rows();
            $this->data['pembiayaan_list'] = $this->form_training_model->where('is_deleted',0)->render_pembiayaan()->result();
            $this->data['pembiayaan_list_row'] = $this->form_training_model->where('is_deleted',0)->render_pembiayaan()->num_rows();
            $this->data['user_info'] = $this->form_training_model->where('users.id',$user_id)->get_user()->result();

            $this->_render_page('form_training/approval/hr', $this->data);
        }
    }

    function supervisor($id)
    {
        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else
        {
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $form_training = $this->data['form_training'] = $this->form_training_model->where('users_training.id',$id)->form_training()->result();
            $this->data['_num_rows'] = $this->form_training_model->where('users_training.id',$id)->form_training()->num_rows();

            foreach ($form_training as $fa) {
                $user_id = $fa->user_id;
                $is_app_lv1 = $fa->is_app_lv1;
                $user_app_lv1 = $fa->user_app_lv1;
                $is_app_lv2 = $fa->is_app_lv2;
                $user_app_lv2 = $fa->user_app_lv2;
            }

            //approval check
           if ($is_app_lv1 == 1) {
                $user_info_lv1 = $this->form_training_model->where('users.id',$user_app_lv1)->get_user()->result();
                foreach ($user_info_lv1 as $ui1) {
                    $this->data['user_app_lv1_nm'] = $ui1->first_name." ".$ui1->last_name; 
                }  
            }else {
                $this->data['user_app_lv1_nm'] = "";
            }
            if ($is_app_lv2 == 1) {
                $user_info_lv2 = $this->form_training_model->where('users.id',$user_app_lv2)->get_user()->result();
                foreach ($user_info_lv2 as $ui2) {
                    $this->data['user_app_lv2_nm'] = $ui2->first_name." ".$ui1->last_name; 
                } 
            }else {
                $this->data['user_app_lv2_nm'] = "";
            }

            // render data
            $this->data['user_info'] = $this->form_training_model->where('users.id',$user_id)->get_user()->result();

            $this->_render_page('form_training/approval/supervisor', $this->data);
        }
    }

    public function do_approve_spv()
    {
        $user_id = $this->session->userdata('user_id');
        $date_now = date('Y-m-d');
        $form_training_id = $this->input->post('form_training_id');

        $additional_data = array(
        'is_app_lv1' => 1,
        'user_app_lv1' => $user_id, 
        'date_app_lv1' => $date_now);


       if ($this->form_training_model->update($form_training_id,$additional_data)) {
           redirect('form_training/index_superior1','refresh');
       }
    }

    public function do_approve_hr()
    {
        $this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'trim|required');
        $this->form_validation->set_rules('pembiayaan', 'Pembiayaan', 'trim|required');
        $this->form_validation->set_rules('besar_biaya', 'Besar Biaya', 'trim|required');
        $this->form_validation->set_rules('tempat', 'Tempat Pelaksanaan', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Waktu Pelaksanaan', 'trim|required');
        $this->form_validation->set_rules('jam', 'Waktu Pelaksanaan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            echo $this->input->post('user_id')."sss ".json_encode(array('st'=>0, 'errors'=>validation_errors('<div class="alert alert-danger" role="alert">', '</div>')));
        } else {
            $user_id = $this->session->userdata('user_id');
            $date_now = date('Y-m-d');
            $form_training_id = $this->input->post('form_training_id');

            $additional_data = array(
            'is_app_lv2' => 1,
            'user_app_lv2' => $user_id, 
            'date_app_lv2' => $date_now,
            'penyelenggara_id' => $this->input->post('penyelanggara'),
            'pembiayaan_id' => $this->input->post('pembiayaan'),
            'besar_biaya' => $this->input->post('besar_biaya'),
            'tempat' => $this->input->post('tempat'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'jam' => $this->input->post('jam')

            );

            //die(print_r($additional_data));

           if ($this->form_training_model->update($form_training_id,$additional_data)) {
               redirect('form_training/index_hr','refresh');
           }
       }
        
    }

    function input($ftitle = "fn:",$sort_by = "id", $sort_order = "asc", $offset = 0)
    {
        $user_id = $this->session->userdata('user_id');

        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else
        {
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            // render data
            //$this->data['keterangan_training'] = $this->form_training_model->render_keterangan()->result();
            //$this->data['num_rows_keterangan_training'] = $this->form_training_model->render_keterangan()->num_rows();
            $this->data['user_info'] = $this->form_training_model->where('user_id',$user_id)->get_user()->result();

            $this->_render_page('form_training/input', $this->data);
        }
    }

    public function add()
    {
        $this->form_validation->set_rules('training_name', 'Nama Program Pelatihan', 'trim|required');
        $this->form_validation->set_rules('tujuan_training', 'Tujuan Program Pelatihan', 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            echo $this->input->post('user_id')."sss ".json_encode(array('st'=>0, 'errors'=>validation_errors('<div class="alert alert-danger" role="alert">', '</div>')));
        }
        else
        {
            $user_id = $this->input->post('user_id');

            $year_now = date('Y');
            $comp_session_now_arr = $this->form_training_model->where('comp_session.year',$year_now)->render_session()->result();
            foreach ($comp_session_now_arr as $csn) {
                $comp_session_now = $csn->id;
            }

            $additional_data = array(
                'id_comp_session'       => $comp_session_now,
                'training_name'         => $this->input->post('training_name'),
                'tujuan_training'       => $this->input->post('tujuan_training'),
                'created_on'            => date('Y-m-d',strtotime('now')),
                'created_by'            => $this->session->userdata('user_id')
            );

            if ($this->form_validation->run() == true && $this->form_training_model->create_($user_id,$additional_data))
            {
                redirect('form_training','refresh');   
            }
        }
    }

    function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key   = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    function _valid_csrf_nonce()
    {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
            $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function _render_page($view, $data=null, $render=false)
    {
        $data = (empty($data)) ? $this->data : $data;
        if ( ! $render)
        {
            $this->load->library('template');

                if(in_array($view, array('form_training/index',
                                         'form_training/index_superior1',
                                         'form_training/index_hr',
                    )))
                {
                    $this->template->set_layout('default');

                    $this->template->add_js('jquery.min.js');
                    $this->template->add_js('bootstrap.min.js');

                    $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                    $this->template->add_js('jquery.sidr.min.js');
                    $this->template->add_js('breakpoints.js');
                    $this->template->add_js('select2.min.js');

                    $this->template->add_js('core.js');

                    $this->template->add_js('main.js');
                    $this->template->add_js('respond.min.js');

                    $this->template->add_js('jquery.bootstrap.wizard.min.js');
                    $this->template->add_js('jquery.validate.min.js');
                    //$this->template->add_js('form_training.js');

                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    
                }
                elseif(in_array($view, array('form_training/input',
                                             'form_training/detail',
                    )))
                {

                    $this->template->set_layout('default');

                    $this->template->add_js('jquery.min.js');
                    $this->template->add_js('bootstrap.min.js');

                    $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                    $this->template->add_js('jquery.sidr.min.js');
                    $this->template->add_js('breakpoints.js');
                    $this->template->add_js('select2.min.js');

                    $this->template->add_js('core.js');
                    $this->template->add_js('purl.js');

                    $this->template->add_js('main.js');
                    $this->template->add_js('respond.min.js');

                    $this->template->add_js('jquery.bootstrap.wizard.min.js');
                    $this->template->add_js('jquery.validate.min.js');
                    $this->template->add_js('bootstrap-datepicker.js');
                    $this->template->add_js('bootstrap-timepicker.js');
                    $this->template->add_js('date_form.js');
                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    $this->template->add_css('datepicker.css');
                    $this->template->add_css('bootstrap-timepicker.css');
                     
                }elseif(in_array($view, array('form_training/approval/supervisor',
                                              'form_training/approval/hr')))
                {
                    $this->template->set_layout('default');

                    $this->template->add_js('jquery.min.js');
                    $this->template->add_js('bootstrap.min.js');

                    $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                    $this->template->add_js('jquery.sidr.min.js');
                    $this->template->add_js('breakpoints.js');
                    $this->template->add_js('select2.min.js');

                    $this->template->add_js('core.js');
                    $this->template->add_js('purl.js');

                    $this->template->add_js('main.js');
                    $this->template->add_js('respond.min.js');

                    $this->template->add_js('jquery.bootstrap.wizard.min.js');
                    $this->template->add_js('jquery.validate.min.js');
                    $this->template->add_js('date_form.js');
                    $this->template->add_js('bootstrap-datepicker.js');
                    $this->template->add_js('bootstrap-timepicker.js');
                    $this->template->add_js('form_training.js');

                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    $this->template->add_css('datepicker.css');
                    $this->template->add_css('bootstrap-timepicker.css');
                    
                }


            if ( ! empty($data['title']))
            {
                $this->template->set_title($data['title']);
            }

            $this->template->load_view($view, $data);
        }
        else
        {
            return $this->load->view($view, $data, TRUE);
        }
    }
}

/* End of file form_training.php */
/* Location: ./application/modules/form_training/controllers/form_training.php */