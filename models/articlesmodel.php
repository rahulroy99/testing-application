<?php
class Articlesmodel extends CI_Model
{
	public function articleslist($limit,$offset)
	{
        $query=$this->db
                       ->limit($limit,$offset)
                       ->get('article');
        return $query->result();
	}
    public function count_rows(){
    	$query=$this->db->get('article');
        return $query->num_rows();
    }

    public function All_articleslist($limit,$offset){
        $query=$this->db
                       ->limit($limit,$offset)
                       ->order_by('created_on','DESC')
                       ->get('article');
        return $query->result();
	}
    public function num_rows(){
    	$query=$this->db->get('article');
        return $query->num_rows();
    }

	public function insert_articles($array)
	{
		return $this->db->insert('article',$array);
	}

	public function find_article($article_id)
	{
		$result=$this->db->select(['id','title','body'])
		                 ->where('id',$article_id)
		                 ->get('article');
		                 return $result->row();

	}
    
	public function update_article($article_id,Array $article)
	{
    return $this->db
              ->where('id',$article_id)
              ->update('article',$article);
	}

	public function delete_article($article_id)
	{
		return $this->db
		            ->where('id',$article_id)
		            ->delete('article');
	}
	public function search($search_query,$limit,$offset)
	{
     $data=$this->db->from('article')
              ->like('title',$search_query)
              ->limit($limit,$offset)
              ->get();
              return $data->result();
	}
	public function count_search_result($search_query)
	{
     $result=$this->db->from('article')
              ->like('title',$search_query)
              ->get();
              return $result->num_rows(); 
	}

	public function find($id)
	{
		$result=$this->db->from('article')
		        ->where('id',$id)
		        ->get();
		        if($result->num_rows() )
		        {
		        	return $result->row();
		        }
		        else
		        {
                 return false;
		        }
	}
}
?>