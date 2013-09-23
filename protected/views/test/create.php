<div class="register-student-tester">
    <?php
        if(isset($_GET['format']))
        {
            $format = $_GET['format'];
            if($format==='ekts')
            {
                ?><h3>Креирање на ЕКТС тест</h3><?php
                $this->renderPartial('_ekts', array('model'=>$model));
            }
            else
            {
                ?><h3>Креирање на обичен тест</h3><?php
                $this->renderPartial('_ordinary', array('model'=>$model));
            }
        }
    ?>
</div>