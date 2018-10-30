<?php
/**
 * User: adpusel
 * Date: 29/10/2018
 * Time: 12:33
 */


namespace OCFram;


class HTTPResponse extends ApplicationComponent
{
  protected $page;

  public function __construct(Application $app)
  {
	parent::__construct($app);
  }

  public function addHeader($header)
  {
	header($header);
  }

  public function redirect($location)
  {
	header('Location: ' . $location);
	exit;
  }

  public function redirect404()
  {

  }

  public function send()
  {
	exit($this->page->getGeneratedPage());
  }

  public function setPage(Page $page)
  {
	$this->page = $page;
  }

  // Changement par rapport à la fonction setcookie() : le dernier argument est par défaut à true
  public function setCookie($name, $value = '', $expire = 0, $path = null,
							$domain = null, $secure = false, $httpOnly = true)
  {
	setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
  }
}