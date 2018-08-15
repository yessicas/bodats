<?php
$this->breadcrumbs=array(
	'Friend Invitations'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List FriendInvitation','url'=>array('index')),
array('label'=>'Manage FriendInvitation','url'=>array('admin')),
);
?>

<div class="well">
<h4>Create FriendInvitation</h4>
<hr>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>