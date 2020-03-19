<?php
class Admin extends MY_Controller{
	public function dashboard(){
		$this->load->library('pagination');
		$config=[
                  'base_url'       =>    base_url('admin/dashboard'),
                  'per_page'       =>    5,
                  'total_rows'     =>    $this->articlesmodel->num_rows(),
                  'full_tag_open'  =>    "<ul class='pagination'>",
                  'full_tag_close' =>    "</ul>",
                  'first_tag_open' =>    '<li>',
                  'first_tag_close'=>    '</li>',
                  'last_tag_open'  =>    '<li>',
                  'last_tag_close' =>    '</li>',
                  'next_tag_open'  =>    '<li>',
                  'next_tag_close' =>    '</li>',
                  'prev_tag_open'  =>    '<li>',
                  'prev_tag_close' =>    '</li>',
                  'num_tag_open'   =>    '<li>',
                  'num_tag_close'  =>    '</li>',
                  'cur_tag_open'   =>    "<li class='active'><a>",
                  'cur_tag_close'  =>    '</a></li>',
		];
		$this->pagination->initialize($config);
        $all_articles=$this->articlesmodel->articleslist($config['per_page'],$this->uri->segment(3) );
		$this->load->view('admin/dashword',['articles'=>$all_articles]);
	}

	public function add_articles(){
       $this->load->view('admin/add_articles');
	}

	public function store_article(){
		$config=[
                'upload_path'   => './images',
                'allowed_types' =>  'jpg|png|gif|jpeg',

		];
		$this->load->library('upload',$config);
		$this->load->library('form_validation');
		if( $this->form_validation->run('add_article_rules' ) && $this->upload->do_upload('userfile') ){
         $post=$this->input->post();
         $data=$this->upload->data();
         //print_r($data); die;
         $image_path=base_url("images/".$data['raw_name'].$data['file_ext']);
         $post['image_path']= $image_path;
         unset($post['submit']);
         return $this->_flashAndRedirect(
            $this->articlesmodel->insert_articles($post),
            'Article Added Successfully.',
            'Article Do Not Add successfully.'
        	);
		}
		else{
		$upload_error=$this->upload->display_errors();
        $this->load->view('admin/add_articles',compact('upload_error') );
		}
	}
	public function delete_article($article_id){
       unset($post['submit']);
        return $this->_flashAndRedirect(
            $this->articlesmodel->delete_article($article_id),
            'Article Deleted Successfully.',
            'Article Do not Delete successfully.'
        	);
	}
	public function edit_article($article_id){
      $data=$this->articlesmodel->find_article($article_id);
      $this->load->view('admin/edit_article',['article'=>$data]);
	}

	public function update_article($article_id){
        $this->load->library('form_validation');
		if( $this->form_validation->run('add_article_rules') ){
	        $post=$this->input->post();
	        //echo $article_id; exit();
	        //print_r($post); exit();
	        unset($post['submit']); 
	        return $this-> _flashAndRedirect($this->articlesmodel->update_article($article_id,$post),
                'Article Update Successfully.',
                'Article Do not update successfully.'
	        	); 
		}
		else{
            $this->load->view('admin/edit_article');
		}
	}
	public function __construct(){
		parent::__construct();
		if( ! $this->session->userdata('user_id') ){
			return redirect('login');
		}
		$this->load->model('articlesmodel');
		$this->load->helper('form');
	}
	private function _flashAndRedirect($Successfull,$successMessage,$failuremessage)
	{
		if($Successfull){
			$this->session->set_flashdata('feedback',$successMessage);
		}
		else{
         $this->session->set_flashdata('failed',$failuremessage);
		}
		return redirect('admin/dashboard'); 
	} 
}
?>