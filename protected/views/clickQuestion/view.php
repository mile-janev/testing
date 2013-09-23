<?php
/* @var $this ClickQuestionController */
/* @var $model ClickQuestion */

//$this->menu=array(
	//array('label'=>'List ClickQuestion', 'url'=>array('index')),
	//array('label'=>'Додади ново прашање', 'url'=>array('create')),
	//array('label'=>'Измени го прашањето', 'url'=>array('update', 'id'=>$model->id, 'test_id'=>$_GET['test_id'])),
//	array('label'=>'Избриши го прашањето', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage ClickQuestion', 'url'=>array('admin')),
//);
?>
<div class="popolnuvanje-prasanja-view">
    <h3>Процес на пополнување на прашања</h3>
    <?php echo $this->renderPartial('../test/_menuquestion', array('model'=>$model)); ?>
    <h3>Прашања со избор</h3>
    
    <?php 

    if($model->correct == 'answer1'){
        $tocen = $model->answer1;
    }
    else if($model->correct == 'answer2'){
        $tocen = $model->answer2;
    }
    else{
        $tocen = $model->answer3;
    }

    $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>array(
                    array(
                        'name'=>'Наслов на тестот',
                        'value'=>$model->tests->title,
                    ),
                    'question',
                    'answer1',
                    'answer2',
                    'answer3',
                    array(
                        'name'=>'Точен одговор',
                        'value'=>$tocen,
                    ),
            ),
    )); ?>
    <?php
    if($_SESSION['click_num'] != 0){
        echo CHtml::button('Следно прашање', array('submit' => array('/clickQuestion/create&test_id='.$_GET['test_id'].'&type=click'), 'class'=>'odgovaraj_test'));
        echo " ".CHtml::submitButton('Погледни тест', array('submit'=>Yii::app()->createUrl('clickQuestion/index&test_id='.$_GET['test_id'].'&type=click'), 'class'=>'pogledni_test'));
    }
    else{
        echo CHtml::button('Продолжи', array('submit' => array('/fillQuestion/create&test_id='.$_GET['test_id'].'&type=fill'), 'class'=>'odgovaraj_test'));
        echo " ".CHtml::submitButton('Погледни тест', array('submit'=>Yii::app()->createUrl('clickQuestion/index&test_id='.$_GET['test_id'].'&type=click'), 'class'=>'pogledni_test'));
    }
    ?>
</div>