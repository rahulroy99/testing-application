<?php
    $config =  [  
                'add_article_rules'  =>    [
										        [  
								                'field' => 'title',
								                'label' => 'Title',
								                'rules' => 'required'
										        ],
								                [ 
								                'field' => 'body',
								                'label' => 'Article',
								                'rules' => 'required',
								                ]
				                        ]
        ];

  //$this->form_validation->set_rules($config);
?>