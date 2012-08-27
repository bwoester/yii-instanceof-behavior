<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>What it's all about...</h1>



<h2>Lets have a look at our user class...</h2>

<p>
<?php $this->beginWidget('system.web.widgets.CTextHighlighter', array('language'=>'php')); ?>
  $user = Yii::app()->user;
  CVarDumper::dump( $user, 1, true );
<?php $this->endWidget(); ?>
</p>

<p>
<?php
  $user = Yii::app()->user;
  CVarDumper::dump( $user, 1, true );
?>
</p>



<h2>Can it be used as IWebUser?</h2>

<p>
<?php $this->beginWidget('system.web.widgets.CTextHighlighter', array('language'=>'php')); ?>
  CVarDumper::dump( $user instanceof IWebUser, 1, true );
<?php $this->endWidget(); ?>
</p>

<p>
<?php
  CVarDumper::dump( $user instanceof IWebUser, 1, true );
?>
</p>



<h2>But my UserManagementModule works on IUser interfaces. Can the user class also be used as IUser?</h2>

<p>
<?php $this->beginWidget('system.web.widgets.CTextHighlighter', array('language'=>'php')); ?>
  CVarDumper::dump( $user instanceof IUser, 1, true );
<?php $this->endWidget(); ?>
</p>

<p>
<?php
  CVarDumper::dump( $user instanceof IUser, 1, true );
?>
</p>



<h2>But CWebUser is a CComponent, right?</h2>

<p>
<?php $this->beginWidget('system.web.widgets.CTextHighlighter', array('language'=>'php')); ?>
  CVarDumper::dump( $user instanceof CComponent, 1, true );
<?php $this->endWidget(); ?>
</p>

<p>
<?php
  CVarDumper::dump( $user instanceof CComponent, 1, true );
?>
</p>



<h2>So I can attach CBehaviors!</h2>

<p>
<?php $this->beginWidget('system.web.widgets.CTextHighlighter', array('language'=>'php')); ?>
  $user->attachBehavior( 'CWebUserAdapter', array(
    'class' => 'CWebUserAdapter'
  ));
<?php $this->endWidget(); ?>
</p>

<p>
<?php
  $user->attachBehavior( 'CWebUserAdapter', array(
    'class' => 'CWebUserAdapter'
  ));
?>
</p>



<h2>And I can use CComponents AS A attached CBehavior:</h2>

<p>
<?php $this->beginWidget('system.web.widgets.CTextHighlighter', array('language'=>'php')); ?>
  $webUserAdapter = $user->asa( 'CWebUserAdapter' );
  CVarDumper::dump( $webUserAdapter, 1, true );
<?php $this->endWidget(); ?>
</p>

<p>
<?php
  $webUserAdapter = $user->asa( 'CWebUserAdapter' );
  CVarDumper::dump( $webUserAdapter, 1, true );
?>
</p>



<h2>Now, if that adapter implemented the needed Interface...</h2>

<p>
<?php $this->beginWidget('system.web.widgets.CTextHighlighter', array('language'=>'php')); ?>
  CVarDumper::dump( $webUserAdapter instanceof IUser, 1, true );
<?php $this->endWidget(); ?>
</p>

<p>
<?php
  CVarDumper::dump( $webUserAdapter instanceof IUser, 1, true );
?>
</p>



<h2>I could obviously work on the adapter. But I could also work on my user as if it implemented that interface itself!</h2>

<p>
<?php $this->beginWidget('system.web.widgets.CTextHighlighter', array('language'=>'php')); ?>
  echo CHtml::image( $user->getImage() );
<?php $this->endWidget(); ?>
</p>

<p>
<?php
  echo CHtml::image( $user->getImage() );
?>
</p>



<h2>Too bad that I have to remember what CBehaviors are attached to which CComponent. Too bad I can't simply do:</h2>

<p>
<?php $this->beginWidget('system.web.widgets.CTextHighlighter', array('language'=>'php')); ?>
  CVarDumper::dump( $user instanceof IUser, 1, true );
<?php $this->endWidget(); ?>
</p>

<p>
<?php
  CVarDumper::dump( $user instanceof IUser, 1, true );
?>
</p>



<h2>To get the response "Yes, that's okay, go on, use it as IUser"</h2>

<h2>Now, what if...</h2>

<h2>What if there was some "instanceof" utility, that knew about Yii's capabilities?</h2>

<h2>That's where InstanceofBehavior comes into play.</h2>

<h2>Actually, this application is configured with this Behavior.</h2>

<h2>And that's why I can do:</h2>

<p>
<?php $this->beginWidget('system.web.widgets.CTextHighlighter', array('language'=>'php')); ?>
  if (Yii::app()->isInstanceof($user,'IUser'))
  {
    echo CHtml::image( $user->getImage() );
  }
<?php $this->endWidget(); ?>
</p>

<p>
<?php
  if (Yii::app()->isInstanceof($user,'IUser'))
  {
    echo CHtml::image( $user->getImage() );
  }
?>
</p>



<h2>But granted, this isn't really safe...</h2>

<h2>If in an upcomming release CWebUser got a method "getImage", the wrong method would be called.</h2>

<h2>We can only invoke methods of a CBehavior, if the behavior's owner doesn't define the method itself.</h2>

<h2>That's why it might be safer to use this version:</h2>

<p>
<?php $this->beginWidget('system.web.widgets.CTextHighlighter', array('language'=>'php')); ?>
  if ($instanceofIUser = Yii::app()->getInstanceof($user,'IUser'))
  {
    echo CHtml::image( $instanceofIUser->getImage() );
  }
<?php $this->endWidget(); ?>
</p>

<p>
<?php
  if ($instanceofIUser = Yii::app()->getInstanceof($user,'IUser'))
  {
    echo CHtml::image( $instanceofIUser->getImage() );
  }
?>
</p>



<h2>And what do you think $instanceofIUser is?</h2>

<p>
<?php $this->beginWidget('system.web.widgets.CTextHighlighter', array('language'=>'php')); ?>
  CVarDumper::dump( $instanceofIUser, 1, true );
<?php $this->endWidget(); ?>
</p>

<p>
<?php
  CVarDumper::dump( $instanceofIUser, 1, true );
?>
</p>



<h2>Correct, the behavior implementing the class/ interface we've asked for.</h2>

<h2>That's why we can even call colliding methods:</h2>

<p>
<?php $this->beginWidget('system.web.widgets.CTextHighlighter', array('language'=>'php')); ?>
  if ($instanceofIUser = Yii::app()->getInstanceof($user,'IUser'))
  {
    CVarDumper::dump( $user->getName()           , 1, true );
    CVarDumper::dump( $instanceofIUser->getName(), 1, true );
  }
<?php $this->endWidget(); ?>
</p>

<p>
<?php
  if ($instanceofIUser = Yii::app()->getInstanceof($user,'IUser'))
  {
    CVarDumper::dump( $user->getName()           , 1, true );
    CVarDumper::dump( $instanceofIUser->getName(), 1, true );
  }
?>
</p>



<h2>Of course, the methods also work for normal inheritance:</h2>

<p>
<?php $this->beginWidget('system.web.widgets.CTextHighlighter', array('language'=>'php')); ?>
  CVarDumper::dump( Yii::app()->isInstanceof($user,'IWebUser'), 1, true );
  CVarDumper::dump( Yii::app()->getInstanceof($user,'IWebUser'), 1, true );
<?php $this->endWidget(); ?>
</p>

<p>
<?php
  CVarDumper::dump( Yii::app()->isInstanceof($user,'IWebUser'), 1, true );
  CVarDumper::dump( Yii::app()->getInstanceof($user,'IWebUser'), 1, true );
?>
</p>



<h2>And we no longer have to remember under which name we attached the behavior.</h2>

<h2>Do you remember its name? :)</h2>
