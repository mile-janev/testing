<?php
    if(Yii::app()->session['isadmin'])
    {
        echo $this->renderPartial('../test/_administration', array('model'=>$model));
    }
?>

<h1>Наслов: <?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array(
                    'name'=>'Тестер',
                    'value'=>$model->testers->firstname." ".$model->testers->lastname,//Imame relacija vo modelot zatoa moze vaka da pristapime do tester tabelata
                ),
                 array(
                    'name'=>'Институција',
                    'value'=>$model->testers->institution,
                ),
                array(
                    'name'=>'Статус',
                    'value'=>($model->checked == 0)? "Незапочнат" : "Завршен",
                ),
                array(
                    'name'=>'start',
                    'value'=>date('H:i:s d-m-Y', strtotime($model->start)),
                ),
                array(
                    'name'=>'end',
                    'value'=>date('H:i:s d-m-Y', strtotime($model->end)),
                ),
                array(
                    'name'=>'average_grade',
                    'value'=>$model->average_grade,
                ),
	),
)); ?>
