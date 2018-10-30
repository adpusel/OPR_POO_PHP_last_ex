<?php
/**
 * User: adpusel
 * Date: 29/10/2018
 * Time: 12:25
 */


namespace OCFram;


/**
 * Class HTTPRequest
 *
 * cet class represente la requete du client
 *
 * @package OCFram
 */
class HTTPRequest extends ApplicationComponent
{
  public function __construct(Application $app)
  {
	parent::__construct($app);
  }

  public function cookieData($key)
  {
	return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
  }

  public function cookieExists($key)
  {
	return isset($_COOKIE[$key]);
  }

  public function getData($key)
  {
	return isset($_GET[$key]) ? $_GET[$key] : null;
  }

  public function getExists($key)
  {
	return isset($_GET[$key]);
  }

  public function method()
  {
	return $_SERVER['REQUEST_METHOD'];
  }

  public function postData($key)
  {
	return isset($_POST[$key]) ? $_POST[$key] : null;
  }

  public function postExists($key)
  {
	return isset($_POST[$key]);
  }

  public function requestURI()
  {
	return $_SERVER['REQUEST_URI'];
  }
}