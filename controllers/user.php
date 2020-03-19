<?php
class User extends MY_Controller{

	public function index()
	{
		$this->load->helper('form');
		$this->load->model('articlesmodel');
		$this->load->library('pagination');
		$config=[
                  'base_url'       =>    base_url('user/index'),
                  'per_page'       =>    5,
                  'total_rows'     =>    $this->articlesmodel->count_rows(),
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
    $all_articles=$this->articlesmodel->All_articleslist($config['per_page'],$this->uri->segment(3) );
		//$this->load->view('admin/dashword',['articles'=>$all_articles]);
		$this->load->view('public/articles',compact('all_articles'));
	}

    public  function search()
    {
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('query','Query','required');
    	if( $this->form_validation->run() )
    	{
         $query=$this->input->post();
         $search_query=$query['query'];
         return redirect("user/search_result/$search_query");
         // $this->load->model('articlesmodel');
         // $search_articles=$this->articlesmodel->search($search_query);
         // $this->load->view( 'public/search_result',compact('search_articles') );
    	}
    	else{
    		$this->index();
    	}
    }

    public function search_result($search_query)
    {
      $this->load->helper('form');
      $this->load->library('pagination');
      $this->load->model('articlesmodel');
      $config=[
                  'base_url'       =>    base_url("user/search_result/$search_query"),
                  'per_page'       =>    5,
                  'total_rows'     =>    $this->articlesmodel->count_search_result($search_query),
                  'full_tag_open'  =>    "<ul class='pagination'>",
                  'full_tag_close' =>    "</ul>",
                  'first_tag_open' =>    '<li>',
                  'uri_segment'    =>     4,
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
        $this->load->model('articlesmodel');
        $search_articles=$this->articlesmodel->search( $search_query,$config['per_page'],$this->uri->segment(4) );
        $this->load->view( 'public/search_result',compact('search_articles') );
    } 
    public function articles($article_id)
    {

      $this->load->helper('form');
      $this->load->model('articlesmodel');
      $detail=$this->articlesmodel->find($article_id);
      //print_r($detail); die;
      $this->load->view('public/article_details',compact('detail') );
    }
}
?>