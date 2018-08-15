<?php
$this->breadcrumbs=array(
	'Cpanel Leftmenus',
);

$this->menu=array(
array('label'=>'Create CpanelLeftmenu','url'=>array('create')),
array('label'=>'Manage CpanelLeftmenu','url'=>array('admin')),
);
?>
<div id="content">
<h2>Cpanel Leftmenus</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
