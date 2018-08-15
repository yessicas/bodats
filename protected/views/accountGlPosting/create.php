<?php
$this->breadcrumbs=array(
	'Account GL Postings'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Account GL Posting','url'=>array('admin')),
array('label'=>'Create Account GL Posting','url'=>array('create'),'active'=>true),

);
?>
<div id="content">
<h2>Create Account GL Posting</h2>
<hr>
</div>


<?php echo $this->renderPartial('../AccountGlPosting/_form', array('model'=>$model)); ?>