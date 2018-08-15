<?php
$this->breadcrumbs=array(
	'Account GL Postings'=>array('index'),
	$model->id_gl_posting=>array('view','id'=>$model->id_gl_posting),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List AccountGlPosting','url'=>array('index')),
	array('label'=>'Manage Account GL Posting','url'=>array('admin')),
	array('label'=>'Create Account GL Posting','url'=>array('create')),
	//array('label'=>'View AccountGlPosting','url'=>array('view','id'=>$model->id_gl_posting)),
	array('label'=>'Update Account GL Posting','url'=>array('update','id'=>$model->id_gl_posting),'active'=>true),
	
	);
	?>

	<h3> Update <font color=#BD362F> <?php echo $model->Accgl->gl_name; ?></font></h3>
	
<?php echo $this->renderPartial('../AccountGlPosting/_form',array('model'=>$model)); ?>