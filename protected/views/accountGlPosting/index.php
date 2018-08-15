<?php
$this->breadcrumbs=array(
	'Account GL Postings',
);

$this->menu=array(
array('label'=>'Create Account GL Posting','url'=>array('create')),
array('label'=>'Manage Account GL Posting','url'=>array('admin')),
);
?>
<div id="content">
<h2>Account GL Postings</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
