<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->output->cache(0);
  }

  public function index(){
    redirect(RT_SIGNIN_01);
  }

}