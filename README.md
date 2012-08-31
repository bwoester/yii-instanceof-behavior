This behavior allows you to quickly check if a given object, or behaviors that might be attached to the object, implement an interface or inherit from some class. It is essentially the same as PHP's instanceof operator, but takes Yii's behaviors into accout.

##Requirements

 - PHP >= 5.3
 - Yii >= 1.0.2

##Usage

1.  Extract the behavior
2.  Attach the behavior to your application:

    ~~~
    [php]
    // application.config.main
    return array(
   
      'behaviors' => array(
        'instanceof' => array(
          // alias to the behavior
          'class' => 'ext.behaviors.InstanceofBehavior',
        ),
      ),

      // more config stuff...
    );
    ~~~

3.  Use it like this

    ~~~
    [php]
    // quick version
    // check if $model or one of the behaviors attached to $model implement IRestResource
    if (Yii::app()->isInstanceof($model,'IRestResource'))
    {
      /* @var $instance IRestResource */
      // work on $model as if it was an IRestResource
    }

    // safe version
    // check if $model or one of the behaviors attached to $model implement IRestResource
    // and return the object that implements it (this might be $model itself, or one of the
    // behavior instances attached to $model). This way, even if $model and the returned
    // behaviors have methods with the same name, you will call the correct method (the
    // method of the object implementing the interface).
    if ($instance=Yii::app()->getInstanceof($model,'IRestResource'))
    {
      /* @var $instance IRestResource */
      // work on $instance. It is an IRestResource.
    }
    ~~~
