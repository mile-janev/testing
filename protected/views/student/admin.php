<?php
    Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
    });
    $('.search-form form').submit(function(){
            $.fn.yiiGridView.update('student-grid', {
                    data: $(this).serialize()
            });
            return false;
    });
    ");
?>

<?php echo $this->renderPartial('../test/_administration', array('model'=>$model)); ?>

<h2>Менаџирај Студенти</h2>

<p>
Може да користите и оператори за споредба (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) на почетокот на било кое поле за да нагласите како споредбата да биде направена.
</p>

<?php echo CHtml::link('Напредно пребарување','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'summaryText' => 'Прикажани се {start} - {end} од {count} записи',
	'columns'=>array(
		'id',
		'username',
//		'password',
		'index',
		'firstname',
		'lastname',
		array(
			'class'=>'CButtonColumn',
                        'buttons'=>array(
                                    'view'=>array('visible'=>'false'),
                                ),
		),
	),
)); ?>
