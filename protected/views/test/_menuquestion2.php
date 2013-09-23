<ul class="questionmenu">
    <li><?php echo CHtml::link('Избор', $this->createUrl('/clickQuestion/index', array('test_id'=>$_GET['test_id'], 'type'=>'click'))); ?></li>
    <li><?php echo CHtml::link('Дополнување', $this->createUrl('/fillQuestion/index', array('test_id'=>$_GET['test_id'], 'type'=>'fill'))); ?></li>
    <li><?php echo CHtml::link('Целосен одговор', $this->createUrl('/completeQuestion/index', array('test_id'=>$_GET['test_id'], 'type'=>'complete'))); ?></li>
    <li><?php echo CHtml::link('Туториали', $this->createUrl('test/forum', array('test_id'=>$_GET['test_id']))); ?></li>
</ul>