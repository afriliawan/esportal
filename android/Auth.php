<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    //Berlaku untuk digunakan semua methode pada Controller Auth.php
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
	
	public function index()
	{
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');

        if ($this->form_validation->run() == false){
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');

        } else {
            //validasi sukses
            $this->_login(); //_login adalah method private
        }
    }

    private function _login()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        if($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1){   
                //cek password
                if(password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'nama_yanglogin' => $user['name'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1 ){
                        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Success login ! Welcome.</div>');
                        redirect('superadmin/role');
                    } else {
                        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Success login ! Welcome.</div>');
                        redirect('user');
                    } 
                } else {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function registration()
	{
        $this->form_validation->set_rules('name', 'Name', 'required|regex_match[/[a-zA-Z]$/]'); //trim berfungsi agar spasi tidak masuk kedalam database
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [ 
            'is_unique' => 'This email has been registered!'
        ]); //is_unique[user.email] agar tidak bisa mendaftarkan email yg sudah ada di dalam database
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
            'matches' => 'Password dont match !',
            'min_length' => 'Password too short !'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'ESportal User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $name = $this->input->post('name', true);
            $email = $this->input->post('email', true);
            $data = [
                'name'          => htmlspecialchars($name),
                'email'         => htmlspecialchars($email),
                'image'         => 'default.jpg',
                'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'       => 4,
                'is_active'     => 0,
                'date_created'  => time()
            ];


            //siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            //tanda " _ " artinya modifier private, harus dibuat construct terlebih dahulu
            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Congratulation! Your account has been
            created. Please activate your account.</div>');
            redirect('auth');
        }
    }

    public function _sendEmail($token, $type)
    {
        //untuk mengirim email melalui google
        //465 adalah port google
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://mail.plug-in.id',
            'smtp_user' => 'esportal@plug-in.id',
            'smtp_pass' => 'E_sportal12345',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        //$config masuk kedalam parameter library
        // $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('esportal@plug-in.id', 'Esportal');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a href="'. base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="'. base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }
        
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }

    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array(); //satu baris saja

        if($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if ($user_token[strtotime('date_created')] < (60 * 60 * 1)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account verification failed! Invalid token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account verification failed! Invalid email.</div>');
            redirect('auth');
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }

    public function blocked() //bisa digunakan untuk penambahan menu management event nantinya, otomatis biar seperti ini jika belum dibuat pagenya.
    {
        $this->load->view('auth/blocked');
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        //jika salah
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1]) -> row_array();

            if($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email'         => $email,
                    'token'         => $token,
                    'date_created'  => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
                redirect('auth/forgotPassword');

            } else {
                //jika email tidak terdaftar atau belum di aktifkan
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
                redirect('auth/forgotPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token){
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            }else {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }

        } else {
            //jika user mengubah email secara asal pada URL
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    public function changePassword() 
    {
        //agar user tidak sembarangan ganti password tanpa lewat email
        if (!$this->session->userdata('reset_email')) {
            redirect ('auth');
        }
        
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if($this->form_validation->run() == false){
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password'); 
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');       
        }
    }
}
