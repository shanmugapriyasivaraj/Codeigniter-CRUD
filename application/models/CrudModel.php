<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CrudModel extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function get($table_name = '', $where=array(),$limit=null,$offset=null,$order_by_field=null,$order_by_order=null)
	{
		if(!is_null($offset) and !is_null($limit))
		{
			$this->db->limit($limit,$offset);
		}
		if($order_by_field != null and $order_by_order != null)
		{
			$this->db->order_by($order_by_field, $order_by_order);
		}
		$rs = $this->db->get_where($table_name,$where);
		//$rs = $this->db->where_not_in($table_name,$where);	
		//print_r($this->db->last_query());
		//exit();
		if($rs->num_rows() > 0)
		{
			return $rs->result_array();
		}
		else
		{
			return false;
		}
	}
	  


    public function insert($table_name = '', $data=array())
	{
		//print_r($data);
		//$this->db->set($data);
		$this->db->insert($table_name,$data);
		return $this->db->insert_id();
	} 


    public function update($table_name = '', $data=array(),$where=array())
	{
		$rs = $this->db->update($table_name,$data,$where);
		if ( $rs )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
 /*   public function updatee($table_name = '', $data=array())
	{
		$rs = $this->db->update($table_name,$data);
		if ( $rs )
		{
			return true;
		}
		else
		{
			return false;
		}
	}	*/


   /*  public function find_item($id)
    {
        return $this->db->get_where('items', array('id' => $id))->row();
    }
 */
	public function between($table_name = '',$field_name='', $from_date=null,$to_date=null)
	{
		$this->db->select('*');
		//$this->db->from($table_name);
		//$this->db->where($field_name.' >= ', $from_date);
		//$this->db->where($field_name.' <= ', $to_date);
		//$this->db->where('date_created <= ', $to_date);
		//$this->db->where('date_created <= ', $to_date);
		$this->db->where($field_name .' BETWEEN "' .$from_date.'" AND "'.$to_date.'"', NULL, FALSE);
		//$this->db->where($field_name .' >= ' .$from_date.' AND '.$field_name .' <= '.$to_date, NULL, FALSE);
		$rs=$this->db->get($table_name);
		//$rs=$this->db->get();
		//$rs=$this->db->get('users');
		if($rs->num_rows() > 0)
		{
			return $rs->result_array();
		}
		else
		{
			return false;
		}
		/* $this->db->select("DATE_FORMAT($field_name, '%m/%d/%Y') as Urdate",FALSE);
		$this->db->from($table_name);
		$this->db->where("DATE_FORMAT($field_name,'%Y-%m-%d') > $from_date",NULL,FALSE);
		return $this->db->get(); */
		/* $this->db->select("DATE_FORMAT($field_name, '%m/%d/%Y') as Urdate",FALSE);
		$this->db->from($table_name);
		$this->db->where("DATE_FORMAT($field_name,'%Y-%m-%d') > $from_date",NULL,FALSE);
		return $this->db->get(); */
	}
    public function delete($table_name = '', $where=array())
	{
		$this->db->delete($table_name,$where);
		if ( $this->db->affected_rows() > 0 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function select_query($q)
	{
		$query = $this->db->query($q);

		return $query;
	
	}

	public function insert_query($q)
	{
		$this->db->query($q);

	}
	
	public function update_notification($data)
	{
		//$data = "payment_notify='0' OR document_notify='0'"
		$where = "payment_notify='1' OR document_notify='1' OR expire_notify='1'";
		$up = $this->db->update("users", $data, $where);
		if($up)
			return true;	
	}
	
	function defaultSelectQuery($query){
		$rs = $this->db->query($query);
		if($rs->num_rows() > 0)
		{
			return $rs->result_array();
		}
		else
		{
			return false;
		}
	}
}
?>