<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login() {
        if ($this->input->post()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('users', ['email' => $email])->row();

            if ($user && password_verify($password, $user->password)) {
                $data = [
                    'id' => $user->id,
                    'nama' => $user->nama,
                    'role' => $user->role,
                    'login' => true
                ];
                $this->session->set_userdata($data);

                redirect('dashboard');
            } else {
                echo "Login gagal!";
            }
        }

        $this->load->view('auth/login');
    }

    public function register() {
        if ($this->input->post()) {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'user'
            ];
            $this->db->insert('users', $data);
            redirect('auth/login');
        }

        $this->load->view('auth/register');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function reset_password() {
        if ($this->input->post()) {
            $email = $this->input->post('email');
            $password_baru = $this->input->post('password_baru');
            $password_confirm = $this->input->post('password_confirm');

            if ($password_baru !== $password_confirm) {
                $data['error'] = "Password tidak cocok!";
                $this->load->view('auth/reset_password', $data);
                return;
            }

            $hash = password_hash($password_baru, PASSWORD_DEFAULT);
            $this->db->where('email', $email);
            $result = $this->db->update('users', ['password' => $hash]);

            if ($result) {
                $data['success'] = "Password berhasil direset! Silakan login dengan password baru.";
            } else {
                $data['error'] = "Email tidak ditemukan!";
            }
            $this->load->view('auth/reset_password', $data);
        } else {
            $this->load->view('auth/reset_password');
        }
    }
}