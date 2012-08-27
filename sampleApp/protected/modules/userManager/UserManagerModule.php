<?php

/**
 * Description of UserManagerModule
 *
 * @author Benjamin
 */
class UserManagerModule extends CWebModule
{

	protected function init()
	{
		// import the module-level models and components
		$this->setImport(array(
			'userManager.models.*',
		));
	}

  public function getUserModel( $id )
  {
    return new User;
  }
}
