<?php
 $config = [

  'protocol'  => 'smtp',
  'smtp_host' => 'ssl://mail.cls-indo.com',
  'smtp_user' => 'admin.legal@cls-indo.com',
  'smtp_pass' => 'supThecls1234!',
  'smtp_port' => 465,
  'mailtype'  => 'html',
  'charset'   => 'utf-8',
  'newline'   => "\r\n"
];

// Load library email dan konfigurasinya
// $this->load->library('email', $config);
$this->email->initialize($config);

// Email dan nama pengirim
$this->email->from('admin.legal@cls-indo.com', 'Admin Legal PT CLS System');

// Email penerima
$this->email->to($this->input->post('email')); // Ganti dengan email tujuan
$this->email->cc("sofyan@cls-indo.com"); // Ganti dengan email tujuan

// Subject email
$this->email->subject('Account Registered');

// Isi email

$this->email->message('Hallo '. $this->input->post('name').' Thank you for register at Legal PT CLS SYSTEM, With username '. $this->input->post('email').  ', And do not forget to save the password below '. $this->input->post('password1') );


// Tampilkan pesan sukses atau error
if ($this->email->send()) {
  return true;
} else {
  // echo 'Error! email tidak dapat dikirim.';
  echo $this->email->print_debugger();
  die;
}
?>
