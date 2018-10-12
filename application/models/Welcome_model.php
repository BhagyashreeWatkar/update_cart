<?php

class Welcome_model extends CI_Model
{
	/*public function insert_record($userdata)
	{
		$result = $this->db->insert('users',$userdata);
		if($this->db->insert_id())
		{
			$res=array(
				'$rc'=>TRUE,
				'msg'=>'succesufully inserted'
			);
		}
		else
		{
			$res=array(
				'$rc'=>FALSE,
				'msg'=>'error'
			);
		}
		return $res;
    }*/
    public function insert_record($para,$cart_data)
    {
    	echo "<pre>" ; print_r($para);print_r($cart_data);
    	$this->db->insert('user_details',$para);
    	//var_dump($results);
    	$userid=$this->db->insert_id();
    	foreach()
   		// return $userid;

   		// $this->db->insert('order_details');

    }
}
?>