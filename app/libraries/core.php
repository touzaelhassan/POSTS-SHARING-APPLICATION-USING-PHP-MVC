<!-- Application Core Clas => Creates URL and loads core controller ( URL FORMAT = /controller/methods/params) -->

<?php
class Core
{
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct()
  {
    $this->get_url();
  }

  public function get_url()
  {
    echo $_GET['url'];
  }
}
