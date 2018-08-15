<?php
$this->breadcrumbs=array(
	'Friend Invitations'=>array('index'),
	$model->id_invitation=>array('view','id'=>$model->id_invitation),
	'Update',
);

	$this->menu=array(
	array('label'=>'List FriendInvitation','url'=>array('index')),
	array('label'=>'Create FriendInvitation','url'=>array('create')),
	array('label'=>'View FriendInvitation','url'=>array('view','id'=>$model->id_invitation)),
	array('label'=>'Manage FriendInvitation','url'=>array('admin')),
	);
	?>

<div class="well">
<h4>Update FriendInvitation <?php echo $model->id_invitation; ?></h4>
<hr>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>