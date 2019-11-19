<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates {

    private $CI;
    private $header;
    private $content;
    private $footer;
    private $paths = array();

	public function __construct() {
    $this->CI =& get_instance();
    $this->header   = self::_init()['header'];
    $this->nav   = self::_init()['nav'];
    $this->content  = self::_init()['content'];
    $this->footer   = self::_init()['footer'];
  }

  private function _init(){
    return [
      'header' => '/templates/header',
      'nav' => '/templates/nav',
      'content'=> '/',
      'footer' => '/templates/footer'
    ];
  }
    
  private function _setup(){
    $this->paths = [
        $this->header,
        $this->nav,
        $this->content,
        $this->footer
    ];
    return $this->paths;
  }

  public function _render($module, $page, $data = array()){
    $this->content .= $page;
    foreach (self::_setup() as $key => $path) {
      $this->CI->load->view($module.$path, $data);
    }
  }
  public function _admin($module, $page, $data = array()){
    $this->content .= $page;
    foreach (self::_setup() as $key => $path) {
      $this->CI->load->view($module.$path, $data);
    }
  }

}