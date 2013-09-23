<div class="student-left">
    <h3>Тестови во тек</h3>
    <?php
        foreach ($vo_tek as $votek)
        {
            $start = date_format(date_create($votek['start']), "H:i:s d-m-Y");
            $end = date_format(date_create($votek['end']), "H:i:s d-m-Y");
            $tester = Tester::model()->findByPk($votek['tester_id']);//Upit sto go naogja imeto na testerot
            
            echo "<div class='test_eden'>";
            echo "<b>Наслов на тестот:</b> ".$votek['title']."<br />";
            echo "<b>Професор:</b> ".$tester->firstname." ".$tester->lastname."<br />";
            echo "<b>Почеток:</b> ".$start."<br />";
            echo "<b>Крај:</b> ".$end;

            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'polagaj_test',
                'action'=>Yii::app()->createUrl('/test/polagaj&test_id='.$votek['id'].'&type=click'),//Kje ne odvede do ovaa akcija no taa seuste ne postoi
                'enableAjaxValidation'=>false,
            ));
            echo CHtml::submitButton('Одговарај го тестот', array('id'=>$votek['id'], 'class'=>'odgovaraj_test')); 
            $this->endWidget();

            echo "</div><br /><hr />";
        }
    ?>
</div>
<div class="student-center">
    <h3>Следен тест</h3>
        <?php
            if(isset($_GET['obid'])){ echo "<script type='text/javascript'>alert('Тестот уште не е започнат');</script>"; }

            foreach ($sleden_test as $sledentest)
            {
                $start = date_format(date_create($sledentest['start']), "H:i:s d-m-Y");
                $end = date_format(date_create($sledentest['end']), "H:i:s d-m-Y");
                $tester = Tester::model()->findByPk($sledentest['tester_id']);//Upit sto go naogja imeto na testerot
                
                echo "<div class='test_eden'>";
                echo "<b>Наслов на тестот:</b> ".CHtml::link($sledentest['title'], Yii::app()->createUrl('test/tutoriali', array('test_id'=>$sledentest['id'])))."<br />";
                echo "<b>Професор:</b> ".$tester->firstname." ".$tester->lastname."<br />";
                echo "<b>Почеток:</b> ".$start."<br />";
                echo "<b>Крај:</b> ".$end;

                $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'polagaj_test',
                    'action'=>Yii::app()->createUrl('/test/polagaj&test_id='.$sledentest['id'].'&type=click'),//Kje ne odvede do ovaa akcija no taa seuste ne postoi
                    'enableAjaxValidation'=>false,
                ));
                echo CHtml::submitButton('Одговарај го тестот', array('id'=>$sledentest['id'], 'class'=>'odgovaraj_test')); 
                $this->endWidget();
                
                echo "</div><br /><hr />";
                
                $godina = date('Y', strtotime($sledentest['start']));
                $mesec = date('m', strtotime($sledentest['start']));
                $den = date('d', strtotime($sledentest['start']));
                $cas = date('H', strtotime($sledentest['start']));
                $minuti = date('i', strtotime($sledentest['start']));
                $sekundi = date('s', strtotime($sledentest['start']));
            }
         ?>
                <div id="tajmer"></div>
</div>
<div class="student-right">
    <h3>Незапочнати тестови</h3>
    <?php
        foreach ($nezapocnati_testovi as $nezapocnat_test)
        {
            $start = date_format(date_create($nezapocnat_test['start']), "H:i:s d-m-Y");
            $end = date_format(date_create($nezapocnat_test['end']), "H:i:s d-m-Y");
            $tester = Tester::model()->findByPk($nezapocnat_test['tester_id']);//Upit sto go naogja imeto na testerot
            
            echo "<div class='test_eden'>";
            echo "<b>Наслов на тестот:</b> ".CHtml::link($nezapocnat_test['title'], Yii::app()->createUrl('test/tutoriali', array('test_id'=>$nezapocnat_test['id'])))."<br />";
            echo "<b>Професор:</b> ".$tester->firstname." ".$tester->lastname."<br />";
            echo "<b>Почеток:</b> ".$start."<br />";
            echo "<b>Крај:</b> ".$end;
            echo "</div><br /><hr />";
        }
    ?>
</div>
<?php if(isset($godina)){ ?>
    <style type="text/css">
    @import "js/counter/jquery.countdown.css";
    #defaultCountdown { width: 240px; height: 45px; }
    </style>
    <script type="text/javascript" src="js/counter/jquery.countdown.js"></script>
    <script type="text/javascript">
            var pocetok = new Date(<?php echo $godina; ?>, <?php echo $mesec; ?> - 1, <?php echo $den; ?>, <?php echo $cas; ?>, <?php echo $minuti; ?>, <?php echo $sekundi; ?>);
            $('#tajmer').countdown({until: pocetok, description: 'до почеток на тестот'});
    </script>
<?php }?>