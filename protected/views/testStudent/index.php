<?php
/* @var $this TestStudentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Test Students',
);

$this->menu=array(
	array('label'=>'Create TestStudent', 'url'=>array('create')),
	array('label'=>'Manage TestStudent', 'url'=>array('admin')),
);
?>

<h1>Test Students</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
