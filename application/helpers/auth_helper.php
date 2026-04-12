<?php

function cek_login() {
    $CI =& get_instance();
    if (!$CI->session->userdata('login')) {
        redirect('auth/login');
    }
}

function cek_admin() {
    $CI =& get_instance();
    if ($CI->session->userdata('role') != 'admin') {
        redirect('dashboard');
    }
}