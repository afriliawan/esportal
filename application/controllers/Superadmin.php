<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'role', 'required|regex_match[/[a-zA-Z]$/]');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]); //untuk membuat menu baru
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('superadmin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1); //digunakan agar superadmin tidak ditampilkan, untuk mencegah agar tidak terjadi kesalahan
                                     //jika tidak sengaja un checklist dapat mengakibatkan rusaknya sistem (tidak ada yang bisa diakses)
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if($result->num_rows() <1){
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function reqtour()
    {
        $data['title'] = 'Tournament Request';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $request = "SELECT * FROM tournament WHERE is_active='2'";
        $this->data['hasil'] = $this->superadmin_model_crud->getQuery($request);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/vi_reqtour/request-tour', $this->data);
        $this->load->view('templates/footer');
    }

    public function acceptreqTour($id)
    {
        $acceptreqTour = $this->superadmin_model_crud->acceptdatareqTour('tournament',$id);
		if($acceptreqTour > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Accept tournament request has been successfully !</div>');
			redirect('superadmin/reqtour');
    }

    public function deletereqTour($id)
	{
		$hapusRegis = $this->superadmin_model_crud->hapusdatareqTour('tournament',$id);
		if($hapusRegis > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">This event has been rejected !</div>');
			redirect('superadmin/reqtour');
    }

    public function deleteGathering($id)
	{
		$hapusGath = $this->superadmin_model_crud->hapusdataGathering('gathering',$id);
		if($hapusGath > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">This event has been deleted !</div>');
			redirect('superadmin/allGathering');
    }

    public function viewfotoStruk($id)
    {
        $data['title'] = 'Upload Struk';
        $data['dataviewStruk'] = $this->superadmin_model_crud->dataviewStruk('tournament',$id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/vi_reqtour/view-struk', $data);
        $this->load->view('templates/footer');
    }

    public function accadminPUBG()
    {
        $data['title'] = 'Data Admin PUBG';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $accadmin = "SELECT * FROM user WHERE role_id='2'";
        $this->data['hasil'] = $this->superadmin_model_crud->getQuery($accadmin);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/vi_accadminPUBG/acc-adminPUBG', $this->data);
        $this->load->view('templates/footer');
    }

    public function accadminML()
    {
        $data['title'] = 'Data Admin ML';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $accadmin = "SELECT * FROM user WHERE role_id='3'";
        $this->data['hasil'] = $this->superadmin_model_crud->getQuery($accadmin);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/vi_accadminML/acc-adminML', $this->data);
        $this->load->view('templates/footer');
    }

    public function accPanitia()
    {
        $data['title'] = 'Data Panitia';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $accpanitia = "SELECT * FROM user WHERE role_id='4'";
        $this->data['hasil'] = $this->superadmin_model_crud->getQuery($accpanitia);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/vi_accpanitia/acc-panitia', $this->data);
        $this->load->view('templates/footer');
    }

    public function accPlayer()
    {
        $data['title'] = 'Data Player';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $accplayer = "SELECT * FROM user WHERE role_id='5'";
        $this->data['hasil'] = $this->superadmin_model_crud->getQuery($accplayer);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/vi_accplayer/acc-player', $this->data);
        $this->load->view('templates/footer');
    }

    public function activeadminPUBG($id)
	{
        $activeAcc = $this->superadmin_model_crud->activeAccount('user',$id);
		if($activeAcc > 0)
		{
            echo 'Berhasil dihapus';
		}else{
            echo 'Gagal dihapus';
        }
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Activated account has been succesfully !</div>');
        redirect('superadmin/accadminPUBG');
    }

    public function deleteadminPUBG($id)
	{
        $deleteAcc = $this->superadmin_model_crud->deleteAccount('user',$id);
		if($deleteAcc > 0)
		{
            echo 'Berhasil dihapus';
		}else{
            echo 'Gagal dihapus';
        }
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Deleted account has been succesfully !</div>');
        redirect('superadmin/accadminPUBG');
    }

    public function deactiveadminPUBG($id)
	{
        $deactiveAcc = $this->superadmin_model_crud->deactiveAccount('user',$id);
		if($deactiveAcc > 0)
		{
            echo 'Berhasil dihapus';
		}else{
            echo 'Gagal dihapus';
        }
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Deactivated account has been succesfully !</div>');
        redirect('superadmin/accadminPUBG');
    }

    public function activeadminML($id)
	{
        $activeAcc = $this->superadmin_model_crud->activeAccount('user',$id);
		if($activeAcc > 0)
		{
            echo 'Berhasil dihapus';
		}else{
            echo 'Gagal dihapus';
        }
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Activated account has been succesfully !</div>');
        redirect('superadmin/accadminML');
    }

    public function deleteadminML($id)
	{
        $deleteAcc = $this->superadmin_model_crud->deleteAccount('user',$id);
		if($deleteAcc > 0)
		{
            echo 'Berhasil dihapus';
		}else{
            echo 'Gagal dihapus';
        }
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Deleted account has been succesfully !</div>');
        redirect('superadmin/accadminML');
    }

    public function deactiveadminML($id)
	{
        $deactiveAcc = $this->superadmin_model_crud->deactiveAccount('user',$id);
		if($deactiveAcc > 0)
		{
            echo 'Berhasil dihapus';
		}else{
            echo 'Gagal dihapus';
        }
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Deactivated account has been succesfully !</div>');
        redirect('superadmin/accadminML');
    }

    public function activePanitia($id)
	{
        $activeAcc = $this->superadmin_model_crud->activeAccount('user',$id);
		if($activeAcc > 0)
		{
            echo 'Berhasil dihapus';
		}else{
            echo 'Gagal dihapus';
        }
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Activated account has been succesfully !</div>');
        redirect('superadmin/accPanitia');
    }

    public function deletePanitia($id)
	{
        $deleteAcc = $this->superadmin_model_crud->deleteAccount('user',$id);
		if($deleteAcc > 0)
		{
            echo 'Berhasil dihapus';
		}else{
            echo 'Gagal dihapus';
        }
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Deleted account has been succesfully !</div>');
        redirect('superadmin/accPanitia');
    }

    public function deactivePanitia($id)
	{
        $deactiveAcc = $this->superadmin_model_crud->deactiveAccount('user',$id);
		if($deactiveAcc > 0)
		{
            echo 'Berhasil dihapus';
		}else{
            echo 'Gagal dihapus';
        }
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Deactivated account has been succesfully !</div>');
        redirect('superadmin/accPanitia');
    }
    
    public function activePlayer($id)
	{
        $activeAcc = $this->superadmin_model_crud->activeAccount('user',$id);
		if($activeAcc > 0)
		{
            echo 'Berhasil dihapus';
		}else{
            echo 'Gagal dihapus';
        }
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Activated account has been succesfully !</div>');
        redirect('superadmin/accPlayer');
    }

    public function deletePlayer($id)
	{
        $deleteAcc = $this->superadmin_model_crud->deleteAccount('user',$id);
		if($deleteAcc > 0)
		{
            echo 'Berhasil dihapus';
		}else{
            echo 'Gagal dihapus';
        }
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete account has been succesfully !</div>');
        redirect('superadmin/accPlayer');
    }

    public function deactivePlayer($id)
	{
        $deactiveAcc = $this->superadmin_model_crud->deactiveAccount('user',$id);
		if($deactiveAcc > 0)
		{
            echo 'Berhasil dihapus';
		}else{
            echo 'Gagal dihapus';
        }
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Deactivated account has been succesfully !</div>');
        redirect('superadmin/accPlayer');
    }

    public function rankingpoint()
    {
        $data['title'] = 'Ranking Point';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $accadmin = "SELECT * FROM user WHERE role_id='5'";
        $this->data['hasil'] = $this->superadmin_model_crud->getQuery($accadmin);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/vi_rankingpoint/ranking-point', $this->data);
        $this->load->view('templates/footer');
    }

    public function createAdminPUBG()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|regex_match[/[a-zA-Z]$/]'); //trim berfungsi agar spasi tidak masuk kedalam database
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [ 
            'is_unique' => 'This email has been registered!'
        ]); //is_unique[user.email] agar tidak bisa mendaftarkan email yg sudah ada di dalam database
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
            'matches' => 'Password dont match !',
            'min_length' => 'Password too short !'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Admin PUBG';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/vi_accadminPUBG/create-adminPUBG', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name', true);
            $email = $this->input->post('email', true);
            $data = [
                'name'          => htmlspecialchars($name),
                'email'         => htmlspecialchars($email),
                'image'         => 'default.jpg',
                'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'       => 2,
                'is_active'     => 1,
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

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New admin has been created !</div>');
            redirect('superadmin/accadminPUBG');
        }
    }

    public function createAdminML()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|regex_match[/[a-zA-Z]$/]'); //trim berfungsi agar spasi tidak masuk kedalam database
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [ 
            'is_unique' => 'This email has been registered!'
        ]); //is_unique[user.email] agar tidak bisa mendaftarkan email yg sudah ada di dalam database
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
            'matches' => 'Password dont match !',
            'min_length' => 'Password too short !'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Admin ML';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/vi_accadminML/create-adminML', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name', true);
            $email = $this->input->post('email', true);
            $data = [
                'name'          => htmlspecialchars($name),
                'email'         => htmlspecialchars($email),
                'image'         => 'default.jpg',
                'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'       => 3,
                'is_active'     => 1,
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

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New admin has been created !</div>');
            redirect('superadmin/accadminML');
        }
    }

    public function allEvent()
    {
        $data['title'] = 'Event';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $semuaEvent = "SELECT * FROM tournament WHERE is_active!=2";
        $this->data['hasil'] = $this->superadmin_model_crud->getQuery($semuaEvent);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/vi_allEvent/all-event', $this->data);
        $this->load->view('templates/footer');
    }

    public function allTeamdata()
    {
        $data['title'] = 'Data Tim';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $semuaTeam = "SELECT * FROM tournament_regis";
        $this->data['hasil'] = $this->superadmin_model_crud->getQuery($semuaTeam);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/vi_allTeamdata/all-teamdata', $this->data);
        $this->load->view('templates/footer');
    }

    public function allChampion()
    {
        $data['title'] = 'Hasil Pertandingan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->data['hasil'] = $this->superadmin_model_crud->get_relasi(); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/vi_allChampion/all-champion', $this->data);
        $this->load->view('templates/footer');
    }

    public function allGathering()
    {
        $data['title'] = 'Data Gathering';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $semuaTeam = "SELECT * FROM gathering WHERE is_active='1'";
        $this->data['hasil'] = $this->superadmin_model_crud->getQuery($semuaTeam);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/vi_allGathering/all-gathering', $this->data);
        $this->load->view('templates/footer');
    }

    public function formviewPemenang($id, $show)
    {
       // $data['dataviewPemenang'] = $this->admin_pubgm_model_crud->dataviewPemenang('tournament_regis',$id);
        // $viewPemenang = "SELECT * FROM tournament_regis WHERE idGame='1'";
        $data['title'] = 'Hasil Pertandingan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataviewPemenang'] = $this->superadmin_model_crud->get_relasi_viewPemenang($id, $show);
        // echo "<pre>";
        // var_dump(data);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/vi_allChampion/viewTeam', $data);
        $this->load->view('templates/footer');
    }

    public function limaribuPoint($id)
    {
        $limaribuP = $this->superadmin_model_crud->rewardlimaribuPoint('user',$id);
		if($limaribuP > 0){
            $where = ['id'=> $id];
            $getData = $this->superadmin_model_crud->tampildata_dengankondisi('user', $where);
            foreach ($getData as $r) {
                $data = [
                'id'              => $r['id'],
                'name'            => $r['name'],
                'reward'          => 5000,
                'tanggalUpdate'   => date('Y-m-d')
                ];
            }
            $transferSuccess = $this->superadmin_model_crud->transferData('reward_history', $data);
            //mentransfer atau meng-insert data sesuai kebutuhan, cek pada bagian $data
            if ($transferSuccess == TRUE) 
            {
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Added 5000 point successfully !</div>');
                redirect('superadmin/rankingpoint');
            }else {
                echo "Gagal !";
            }
        }else{
            echo 'Gagal !';
        }
    }

    public function tigaribuPoint($id)
    {
        $tigaribuP = $this->superadmin_model_crud->rewardtigaribuPoint('user',$id);
		if($tigaribuP > 0){
            $where = ['id'=> $id];
            $getData = $this->superadmin_model_crud->tampildata_dengankondisi('user', $where);
            foreach ($getData as $r) {
                $data = [
                'id'              => $r['id'],
                'name'            => $r['name'],
                'reward'          => 3000,
                'tanggalUpdate'   => time()
                ];
            }
            $transferSuccess = $this->superadmin_model_crud->transferData('reward_history', $data);
            //mentransfer atau meng-insert data sesuai kebutuhan, cek pada bagian $data
            if ($transferSuccess == TRUE) 
            {
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Added 3000 point successfully !</div>');
                redirect('superadmin/rankingpoint');
            }else {
                echo "Gagal !";
            }
        }else{
            echo 'Gagal !';
        }
    }

    public function duaribuPoint($id)
    {
        $duaribuP = $this->superadmin_model_crud->rewardduaribuPoint('user',$id);
		if($duaribuP > 0){
            $where = ['id'=> $id];
            $getData = $this->superadmin_model_crud->tampildata_dengankondisi('user', $where);
            foreach ($getData as $r) {
                $data = [
                'id'              => $r['id'],
                'name'            => $r['name'],
                'reward'          => 2000,
                'tanggalUpdate'   => time()
                ];
            }
            $transferSuccess = $this->superadmin_model_crud->transferData('reward_history', $data);
            //mentransfer atau meng-insert data sesuai kebutuhan, cek pada bagian $data
            if ($transferSuccess == TRUE) 
            {
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Added 2000 point successfully !</div>');
                redirect('superadmin/rankingpoint');
            }else {
                echo "Gagal !";
            }
        }else{
            echo 'Gagal !';
        }
    }

    public function biayaPendaftaran()
    {
        $data['title'] = 'Biaya Pendaftaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['biaya_pendaftaran'] = $this->db->get('biaya_pendaftaran')->result_array();

        $this->form_validation->set_rules('biayaPendaftaran', 'registration fee', 'required|trim');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/vi_biayaPendaftaran/biaya-pendaftaran', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('biaya_pendaftaran', ['biayaPendaftaran' => $this->input->post('biayaPendaftaran')]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Add new registrasi fee success!</div>');
            redirect('superadmin/biayaPendaftaran');
        }
    }

    public function formeditbiayaPendaftaran($id)
    {
        $this->form_validation->set_rules('biayaPendaftaran', 'registration fee', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Biaya Pendaftaran';
            $data['dataeditBiaya'] = $this->superadmin_model_crud->dataeditbiayaPendaftaran('biaya_pendaftaran',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/vi_biayaPendaftaran/editbiaya-pendaftaran', $data);
            $this->load->view('templates/footer');
        } else {
            $biaya_pendaftaran  = $_POST['biayaPendaftaran'];

		$data = array('biayaPendaftaran' => $biaya_pendaftaran);
        $editBiaya = $this->superadmin_model_crud->editdatabiayaPendaftaran('biaya_pendaftaran',$data, $id);
		if($editBiaya > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update registration fee has been successfully !</div>');
			redirect('superadmin/biayaPendaftaran');
            }
        }

    public function deleteBiaya($id)
	{
		$hapusBiaya = $this->superadmin_model_crud->hapusbiayaPendaftaran('biaya_pendaftaran',$id);
		if($hapusBiaya > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete registration fee has been successfully !</div>');
			redirect('superadmin/biayaPendaftaran');
    }

    public function lokasiTurnamen()
    {
        $data['title'] = 'Lokasi Turnamen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['lokasi_turnamen'] = $this->db->get('tb_tempat')->result_array();

        $this->form_validation->set_rules('namaTempat', 'Location name', 'required|trim');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/vi_lokasiTurnamen/lokasi-turnamen', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('tb_tempat', ['namaTempat' => $this->input->post('namaTempat')]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Add location place success!</div>');
            redirect('superadmin/lokasiTurnamen');
        }
    }

    public function formeditlokasiTurnamen($id)
    {
        $this->form_validation->set_rules('namaTempat', 'Location name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Lokasi Turnamen';
            $data['dataeditLokasi'] = $this->superadmin_model_crud->dataeditlokasiTurnamen('tb_tempat',$id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/vi_lokasiTurnamen/editlokasi-turnamen', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_tempat  = $_POST['namaTempat'];

		$data = array('namaTempat' => $nama_tempat);
        $editLokasi = $this->superadmin_model_crud->editdatalokasiTurnamen('tb_tempat',$data, $id);
		if($editLokasi > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update location name has been successfully !</div>');
			redirect('superadmin/lokasiTurnamen');
            }
        }

        
    public function deletelokasiTurnamen($id)
	{
		$hapusLokasi = $this->superadmin_model_crud->hapuslokasiTurnamen('tb_tempat',$id);
		if($hapusLokasi > 0)
		{
			echo 'Berhasil dihapus';
		}else{
			echo 'Gagal dihapus';
        }
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete location has been successfully !</div>');
			redirect('superadmin/lokasiTurnamen');
    }
}  