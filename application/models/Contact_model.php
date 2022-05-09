<?php
class Contact_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function getall_contact()
    {
        $this->db->select('*');
        $this->db->from("contact_inquiry");
        $this->db->order_by("c_id", "DESC");
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
        
    }
 
    function update_data($data,$cid)
    {
        $this->db->where('c_id', $cid);
        $this->db->update('contact_inquiry', $data);
    }

    function insert_data($data)
    {
        $this->db->insert('contact_inquiry', $data);
    }
    
    function  get_single_data($cid)
    {
        $this->db->select('*');
        $this->db->from('contact_inquiry');
        $this->db->where('c_id', $cid);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
        
    }
    
    function delete_id($cid)
    {
        $this->db->where('c_id', $cid);
        $this->db->delete('contact_inquiry');
    }
  
    
    
}