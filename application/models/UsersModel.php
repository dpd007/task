<?php
class UsersModel extends CI_Model{
//	public function test(){
//		$query = $this->db->select('*')
//			->from('user')
//			->get();
//		return $query->result_array();
//	}
	public function fetch_user($email, $password){
		$query = $this->db->get_where('user', array(
			'user_mail' => $email,
			'user_password' => $password
		));
		if($query->num_rows() > 0){
			return $query->result_array();
		} else{
			return null;
		}
	}
	public function fetch_single_user($id){
		$query = $this->db->get_where('user', array(
			'id' => $id
		));
//		print_r($this->db->last_query());die();
		return $query->result_array();
	}
	public function update_data($file, $id){
		$query = $this->db->where('id', $id)
						  ->update('user', $file);
		return 1;
	}
}
?>
