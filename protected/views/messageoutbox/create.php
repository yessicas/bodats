<?php
$this->breadcrumbs=array(
	'Message'=>array('create'),
	'New Message',
);

$this->menu=array(
array('label'=>'Create Message','url'=>array('messageoutbox/create')),
array('label'=>'Manage Message Outbox','url'=>array('messageoutbox/admin')),
array('label'=>'Manage Message Inbox','url'=>array('messageinbox/admin')),
);
?>

<?php if(Yii::app()->user->hasFlash('danger')):?>
<div class = "animated flash">
	<?
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'danger' => array('closeText' => '&times;'), 

    ),
));
    ?>
</div>
<?php endif; ?>

<center>
<h3 class= "header"><img src="repository/icon/messagebig.png"> <?php echo Yii::t('strings','Create New Message') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>

<!-- <div class="well">
<h4><img src="repository/icon/messagebig.png"> <?php //echo Yii::t('strings','Create New Message') ?> </h4>
</div>
-->
<?php echo $this->renderPartial('_form', array('model'=>$model,'users'=>$users)); ?>