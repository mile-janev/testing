<div class="popolnuvanje-prasanja">
    <h3>Наслов на тестот: <?php echo $model->tests->title; ?></h3>
    <?php echo $this->renderPartial('../test/_menuquestion2', array('model'=>$model)); ?>
    <h4>Прашање со целосен одговор <?php if(isset($_GET['i'])){echo $_GET['i'];} ?></h4>

    <?php echo $this->renderPartial('_form2', array('model'=>$model)); ?>
</div>