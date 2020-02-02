<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Models extends CI_Model{

    function __construct(){
      parent::__construct();
      //my models
    }
    
    // public function verify($uname,$pass){
    //   $query = $this->db->query("SELECT * FROM admin WHERE uname = ? AND password = ? ",array($uname,md5($pass)));
    //   $data = array();
    //   if ($query->num_rows() == 1) {
    //       foreach ($query->result() as $row) {
    //       $data['full_name'] = $row->full_name;
    //       $data['uname']     = $row->uname;
    //       }
    //     return $data;
    //   } else {
    //       return false;
    //   }
    // }

    function insert($table,$datas){
      return $this->db->insert($table,$datas);
    }

    function update($table,$datas,$where){
      return $this->db->update($table,$datas,$where);
    }

    function openquery($sql,$darray){
      $query	= $this->db->query($sql, $darray);
      return	$query->result();
    }

    function openquery2($sql){
      $query	= $this->db->query($sql);
      return	$query->result();
    }

    function getdata($sql,$data,$field){
      $var	= $this->openquery($sql, $data);
      $rs		= null;
      foreach($var AS $dt){$rs = $dt->$field;}
      return $rs;
    }

    function countrows($sql,$data){
      $query = $this->db->query($sql,$data);
      return $query->num_rows();
    }

}