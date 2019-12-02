<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile'; 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();  
        
        $this->form_validation->set_rules('name', 'Full name', 'required|regex_match[/[a-zA-Z]$/]');
        $this->form_validation->set_rules('nohp', 'number phone ', 'min_length[12]', 'max_length[13]');
        $this->form_validation->set_rules('alamat', 'Address name', 'regex_match[/[a-zA-Z]$/]');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $nohp = $this->input->post('nohp');
            $alamat = $this->input->post('alamat');

            //cek gambar yang di akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image){
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name',$name);
            $this->db->set('alamat',$alamat);
            $this->db->set('nohp',$nohp);
            $this->db->where('email',$email);
            $this->db->update('user');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //Function dibawah ini adalah apa saja yang dibutuhkan untuk mengganti password
        $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[3]|matches[newPassword2]');
        $this->form_validation->set_rules('newPassword2', 'Confirm New Password', 'required|trim|min_length[3]|matches[newPassword1]');
        //min_length[3] adalah jumlah digit password minimal 3 digit.

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            //jika password salah
            $currentPassword = $this->input->post('currentPassword');
            $newPassword = $this->input->post('newPassword1');
            if (!password_verify($currentPassword, $data['user']['password'])) {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                //jika password baru sama dengan password lama, maka akan terjadi error password.
                if ($currentPassword == $newPassword) {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">New password cannot be
                    the same as current password! </div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah benar
                    $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);


                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password changed! </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}

    