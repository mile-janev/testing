<?php
/* @var $this TestStudentController */
/* @var $model TestStudent */

$this->breadcrumbs=array(
	'Test Students'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TestStudent', 'url'=>array('index')),
	array('label'=>'Create TestStudent', 'url'=>array('create')),
	array('label'=>'Update TestStudent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TestStudent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TestStudent', 'url'=>array('admin')),
);
?>

<h1>View TestStudent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'test_id',
		'student_id',
		'points',
		'grade',
	),
)); ?>
