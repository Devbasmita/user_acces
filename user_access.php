
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_access extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('user_access_models');
        $this->load->database('uas');
    }


    public function index()
    {
        $this->load->view('user_access/signup');
    }

    public function signup(){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phon', 'Mobile Number', 'required|regex_match[/^[0-9]{10}$/]|is_unique[user.phon]');

        $this->form_validation->set_error_delimiters('<div class="error">' , '</div>');

        if ($this->form_validation->run()) {
            $name = $this->input->post('name');
            $phon = $this->input->post('phon');
            $created_at = date('Y-m-d');
            $user_details = array(
                'name' => $name,
                'phon' => $phon,
                'created_at' => $created_at
            );
            $users = $this->user_access_models->signup($user_details);
            
            if ($users) {
                $this->send_message($phon);
                
            } else {
                $this->session->set_flashdata('message', 'Invalid username or password');
            }
        } else {
            $this->session->set_flashdata('message', 'username and password are required');
           
        }
        $this->load->view('user_access/signup');
    }

    public function send_message($number){
        $arr=json_encode(array(
            "phone"=>$number,
            "body"=>"Hello",
           
        ));
        $url="https://eu16.chat-api.com/instance98575/sendFile?token=i7480emwmb3l1xzh";
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array(
            'Content-type:application/json',
            'Content-length:'.strlen($arr)
        ));
        $response=curl_exec($ch);
        curl_close($ch);
    
        if($response){
           $this->session->set_flashdata('message', 'message sent successfully.');
        }
        else{
           $this->session->set_flashdata('message', 'message not sent.');
        }
    }

    public function admin(){
        $this->load->view('user_access/admin_login');
    }

    public function admin_view_work(){
        $this->form_validation->set_rules('phon', 'phon', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('user_access/admin');
        } else {
            $phon = $this->input->post('phon');
            $pass = $this->input->post('password');
            $userdata['users_list'] = NUll;
            $admin_user = $this->user_access_models->admin_login($phon, $pass);

            if ($admin_user) {
               
                $this->load->view('user_access/admin_view_work',$userdata);
            } else {
                $this->session->set_flashdata('message', 'Invalid username or password');

                redirect('user_access/admin');
            }
        }
    }

    public function view_userdata(){
        // echo "<pre>";
        // print_r($_POST);
        // exit();
        $this->form_validation->set_rules('start_date', 'date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'date', 'required');

        $userdata['users_list'] = "";
        if ($this->form_validation->run() == false) {
            $this->load->view('user_access/admin_view_work',$userdata);
        } else {
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');

            $userdata['users_list'] = $this->user_access_models->show_users_list($start_date, $end_date);
  
                $this->load->view('user_access/admin_view_work',$userdata);
            
        }
    }
}    