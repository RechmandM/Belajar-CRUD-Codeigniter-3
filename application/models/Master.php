<?php

class Master extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function getAlljoin($table, $table2, $table3)
    {
        return $this->db->query("SELECT b.*, j.nama_jurusan, p.nama_pa FROM $table b LEFT JOIN $table2 j ON b.id_jurusan = j.id_jurusan LEFT JOIN $table3 p ON b.id_pa = p.id_pa");
    }
    function getAll($table)
    {
        return $this->db->query("SELECT * FROM $table");
    }
    function input_data($table, $data)
    {
        $this->db->insert($table, $data);
    }
    function getby_id($table, $field, $id)
    {
        return $this->db->query("SELECT * FROM $table where $id='$field'");
    }
    function update_data($table, $data, $id, $field)
    {
        $this->db->update($table, $data, array($field => $id));
    }
    function delete($table, $id, $field)
    {
        $this->db->delete($table, [$field => $id]);
    }
}
