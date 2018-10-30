<?php

namespace OCFram;


/**
 * Class ApplicationComponent
 *    permet d'accede au contener de mon componnant
 *
 * @package OCFram
 */
abstract class ApplicationComponent
{
  /**
   * @var Application
   */
  protected $app;

  /**
   * ApplicationComponent constructor.
   *
   * @param Application $app
   */
  public function __construct(Application $app)
  {
	$this->app = $app;
  }

  /**
   * @return Application
   */
  public function app()
  {
	return $this->app;
  }
}