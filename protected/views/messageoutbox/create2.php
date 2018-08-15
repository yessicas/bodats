<?php
$this->breadcrumbs=array(
	'Message Inbox'=>array('messageinbox/admin'),
	'Reply',
);

$this->menu=array(
array('label'=>'Reply Message','url'=>array('messageoutbox/create2')),
array('label'=>'Manage Message Outbox','url'=>array('admin')),
);
?>

<!--<h3>Reply Message ke <?php //echo $from_inbox; ?> </h3>-->
<center>
<h3 class= "header"><img src="repository/icon/replybig.png"> <?php echo Yii::t('strings','Reply Message') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>
<!--<div class="well">
<h4>Reply Message ke <?php echo $from_inbox; ?> </h4>
</div>
-->
<?php echo $this->renderPartial('form_reply', array('model'=>$model,'from_inbox'=>$from_inbox,'users'=>$users,'title'=>$title,)); ?>