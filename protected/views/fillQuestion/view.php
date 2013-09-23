<?php
/* @var $this FillQuestionController */
/* @var $model FillQuestion */

//$this->menu=array(
	//array('label'=>'List FillQuestion', 'url'=>array('index')),
	//array('label'=>'Create FillQuestion', 'url'=>array('create')),
	//array('label'=>'Измени го прашањето', 'url'=>array('update', 'id'=>$model->id, 'test_id'=>$_GET['test_id'])),
//	array('label'=>'Избриши го прашањето', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage FillQuestion', 'url'=>array('admin')),
//);
?>
<div class="popolnuvanje-prasanja-view">
    <h3>Процес на пополнување на прашања</h3>
    <?php echo $this->renderPartial('../test/_menuquestion', array('model'=>$model)); ?>
    <h3>Прашања со дополнување на збор или фраза</h3>
    <?php   $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>array(
                    array(
                        'name'=>'Наслов на тестот',
                        'value'=>$model->tests->title,
                    ),
                    'question',
                    'correct',
            ),
    )); ?>

    <?php
    if($_SESSION['fill_num'] != 0){
        echo CHtml::button('Следно прашање', array('submit' => array('/fillQuestion/create&test_id='.$_GET['test_id'].'&type=fill'), 'class'=>'odgovaraj_test'));
        echo " ".CHtml::submitButton('Погледни тест', array('submit'=>Yii::app()->createUrl('fillQuestion/index&test_id='.$_GET['test_id'].'&type=fill'), 'class'=>'pogledni_test'));
    }
    else{
        echo CHtml::button('Продолжи', array('submit' => array('/completeQuestion/create&test_id='.$_GET['test_id'].'&type=complete'), 'class'=>'odgovaraj_test'));
        echo " ".CHtml::submitButton('Погледни тест', array('submit'=>Yii::app()->createUrl('fillQuestion/index&test_id='.$_GET['test_id'].'&type=fill'), 'class'=>'pogledni_test'));
    }
    ?>
</div>