<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function admin_logged_in()
{
    $CI =& get_instance();
    $is_logged_in = $CI->session->userdata('username');
    if(!isset($is_logged_in) || $is_logged_in != true)
    {
        redirect('frontend/login');
    }       
}

function alumni_logged_in()
{
    $CI =& get_instance();
    $is_logged_in = $CI->session->userdata('username');
    if(!isset($is_logged_in) || $is_logged_in != true)
    {
        redirect('frontend/login');
    }
}

function cmb_dinamis($name, $table, $field, $pk, $selected = null, $extra = null) {
    $ci = & get_instance();
    $cmb = "<select name='$name' class='form-control' $extra>  ";
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $cmb .="<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .=">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}