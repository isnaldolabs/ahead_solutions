<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->output->cache(0);
  }

  public function ct_error_404()
  {
    $this->output->set_status_header('404');
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_error_404');
    $this->load->view('patterns/v_footer');
  }
  
  public function ct_error_500()
  {
    $this->output->set_status_header('500');
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_error_500');
    $this->load->view('patterns/v_footer');
  }
  
  public function ct_error_503()
  {
    $this->output->set_status_header('503');
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_error_503');
    $this->load->view('patterns/v_footer');
  }

  public function ct_error_505()
  {
    $this->output->set_status_header('505');
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_error_505');
    $this->load->view('patterns/v_footer');
  }

  public function ct_error_file_not_found()
  {
    $this->output->set_status_header('999');
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_error_file_not_found');
    $this->load->view('patterns/v_footer');
  }

}