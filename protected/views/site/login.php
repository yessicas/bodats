<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<?php if(Yii::app()->user->hasFlash('success')):?>
<div class = "animated flash">
    <?
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
));
    ?>
</div>
<?php endif; ?>

<center>
<p>Silahkan Isi Data Login Anda</p>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Login',
        'headerIcon' => 'icon-cog',
        'htmlOptions' => array('class' => 'bootstrap-widget-table','style'=>'width : 330px;'),
   
    )
);?>


<?php $form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm',
    array(
        'id' => 'verticalForm',
        //'action'=>array('login'),  
        'enableClientValidation'=>true,
		'clientOptions'=>array(
		'validateOnSubmit'=>true,
								),
        'htmlOptions' => array('style'=>'margin: 0 10px 20px;'), // for inset effect
    )
);

echo"<br>";
echo $form->textField(
    $model,
    'username',
    array(
        'class' => 'span3',
        'placeholder' => 'User ID',
        'prepend' => '<i class="icon-user"></i>'
    )
);
echo $form->error($model,'username');

echo"<br>";
echo $form->passwordField(
    $model,
    'password',
    array(
        'class' => 'span3',
        'placeholder' => 'Password',
        'prepend' => '<i class="icon-lock"></i>'
    )
);
echo $form->error($model,'password');

echo"<br>";
$this->widget(
    'bootstrap.widgets.TbButton',
    array('buttonType' => 'submit', 'label' => 'Login','type'=>'primary','icon'=>'ok white')
);
 
$this->endWidget();
unset($form); ?>

<?php $this->endWidget(); ?>
</center>