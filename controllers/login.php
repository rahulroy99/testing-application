<?php
class Login extends CI_Controller
{
	public function index()
	{
		if( $this->session->userdata('user_id') ){
			return redirect('admin/dashboard');
		}
		$this->load->helper('form');
		$this->load->view('public/admin_login');
	}
	public function admin_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','User Name','required|alpha|trim',array(
			'required'      => 'You have not provided %s.',
            'alpha'         => 'Only contain aplhavatical character.'
        ) );
		$this->form_validation->set_rules('password','Password','required');
		if( $this->form_validation->run() )
		{
			$username=$this->input->post('username');
			$paswd=$this->input->post('password');
			$this->load->model('loginmodel');
			$login_data=$this->loginmodel->login_valid($username,$paswd);
			//print_r($userlogin); die;
			if($login_data)
			{
                $this->session->set_userdata('user_id',$login_data);
                $this->session->userdata('user_id');
                //echo $name->uname; die;
                return redirect('admin/dashboard');
			}
			else
			{
                $this->session->set_flashdata('login_failed','Invalid Username/Password.');
                return redirect('login');
			}
		}
		else
		{
			$this->load->view('public/admin_login');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('user_id');
		return redirect('login');
	}
}
?>