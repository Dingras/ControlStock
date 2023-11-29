<?php
    class articulo_model extends CI_Model{

        protected $tabla = "articulos";
        protected $pk = "id";

        public function nuevo($datos=array()){
            $this->db->insert($this->tabla, $datos);
            if ($this->db->affected_rows()){
                return $this->db->insert_id();
            }else{
                return false;
            }
        }
        public function editar($id=null, $datos=array()){
            $this->db->where($this->pk, $id);
            $this->db->update($this->tabla, $datos);
            return $this->db->affected_rows();
        }
        public function mostrar(){
            $rec = $this->db->get($this->tabla);
            return $rec->result_array();
        }
    }