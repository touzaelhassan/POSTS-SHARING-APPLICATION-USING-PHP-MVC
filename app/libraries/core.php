<!-- Application Core Clas => Creates URL and loads core controller ( URL FORMAT = /controller/methods/params) -->

<?php
class Core
{
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct()
  {
    $url = $this->get_url();

    if (file_exists('../app/controllers' . ucwords($url[0]) . '.php')) {
      $this->currentController = ucwords($url[0]);
      unset($url[0]);
    }

    require_once '../app/controllers/' . $this->currentController . '.php';
    $this->currentController = new $this->currentController;
  }

  public function get_url()
  {
    if (isset($_GET["url"])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
