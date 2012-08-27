<?php

/**
 * Description of IUserAdapter
 *
 * @author Benjamin
 */
class CWebUserAdapter extends CBehavior implements IUser
{
  public $userManagementModuleId = 'userManager';

  public function getEMail()
  {
    $model = $this->getUserModel();
    return $model->email;
  }

  public function getImage()
  {
    $model = $this->getUserModel();
    return $model->image;
  }

  public function getName()
  {
    $model = $this->getUserModel();
    return $model->name;
  }

  public function getId()
  {
    $model = $this->getUserModel();
    return $model->id;
  }

  private function getUserManagementModule() {
    $filepath = Yii::getPathOfAlias('application.modules.userManager.UserManagerModule');
    return Yii::app()->getModule( $this->userManagementModuleId );
  }

  /**
   * @return CWebUser
   */
  private function getWebUser() {
    return $this->owner;
  }

  private function getUserModel()
  {
    $module = $this->getUserManagementModule();
    $webUser = $this->getWebUser();
    return $module->getUserModel( $webUser->getId() );
  }

}
