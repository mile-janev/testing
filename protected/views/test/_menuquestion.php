<ul class="questionmenu">
    <li><?php echo CHtml::link('Избор ('.Yii::app()->session['click_num'].') ', $this->createUrl('/clickQuestion/create', array('test_id'=>$_GET['test_id'], 'type'=>'click'))); ?></li>
    <li><?php echo CHtml::link('Дополнување ('.Yii::app()->session['fill_num'].') ', $this->createUrl('/fillQuestion/create', array('test_id'=>$_GET['test_id'], 'type'=>'fill'))); ?></li>
    <li><?php echo CHtml::link('Целосен одговор ('.Yii::app()->session['complete_num'].') ', $this->createUrl('/completeQuestion/create', array('test_id'=>$_GET['test_id'], 'type'=>'complete'))); ?></li>
</ul>