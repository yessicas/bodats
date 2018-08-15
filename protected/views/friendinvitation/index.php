<?php
$this->breadcrumbs=array(
	'Friend Invitations',
);

$this->menu=array(
array('label'=>'Create FriendInvitation','url'=>array('create')),
array('label'=>'Manage FriendInvitation','url'=>array('admin')),
);
?>

<div class="well">
<h4>Friend Invitations</h4>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
/*
'sortableAttributes'=>array(
		'attribute1',
		'attribute2',
        ),
*/
'itemView'=>'_view',
)); ?>
