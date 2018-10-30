<?php
/**
 * Created by PhpStorm.
 * User: adpusel
 * Date: 10/30/18
 * Time: 11:43 AM
 */

namespace App\Frontend;


use OCFram\Application;

class FrontendApplication extends Application
{
  public function __construct($user, $config)
  {
	parent::__construct($user, $config);
	$this->name = 'Frontend';
  }

  public function run()
  {
	$controller  = $this->getController();
	$controller=

  }
}