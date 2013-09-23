<?php

class ClickAnswerController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','saveanswer', 'pregledaj', 'proveri'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users' => $this->admin,
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ClickAnswer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClickAnswer']))
		{
			$model->attributes=$_POST['ClickAnswer'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClickAnswer']))
		{
			$model->attributes=$_POST['ClickAnswer'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ClickAnswer');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ClickAnswer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ClickAnswer']))
			$model->attributes=$_GET['ClickAnswer'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=ClickAnswer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='click-answer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionSaveanswer()
        {
            $model=new ClickAnswer();
            
            if(isset($_POST['answer'])) //ako ne e vneseno odgovor (Mora vaka bidejki hidden polinjata sekogas se postaveni)
            {
            	$model->answer=$_POST['answer'];
                $model->click_id = $_POST['click_id'];
                $model->student_id = Yii::app()->user->id;
                
                if($model->answer == $model->clicks->correct)//Ako odgovorot e tocen daj mu 0.5 poeni za prasanjeto
                {
                    $model->points = 0.5;
                }
                
                if($model->save())
                {
                    header("location: ".$_SERVER['HTTP_REFERER']);
//                    $this->redirect('index.php?r=test/polagaj&test_id=1&type=click');
                }
            }
            header("location: ".$_SERVER['HTTP_REFERER']);
//            $this->redirect('index.php?r=test/polagaj&test_id=1&type=click');
        }
        
        public function actionPregledaj()
        {
                $test_id = $_GET['test_id'];
                $student_id = $_GET['student_id'];
                
//                $sql = "SELECT * FROM click_answer WHERE click_answer.click_id IN
//                            (SELECT click_question.id
//                             FROM click_question
//                             WHERE click_question.test_id = :test_id)
//                         AND click_answer.student_id = :student_id";
//                
//                $connection = Yii::app()->db;  
//                $command = $connection->createCommand($sql);
//                $command->bindParam(":test_id", $test_id, PDO::PARAM_STR);
//                $command->bindParam(":student_id", $student_id, PDO::PARAM_STR);
//                $odgovori = $command->queryAll();
                
                $criteria1 = new CDbCriteria();
                $criteria1->select = "t.*";
                $criteria1->join = "JOIN `click_question` ON (t.click_id = click_question.id)";
                $criteria1->addCondition("click_question.test_id = :test_id");                
                $criteria1->params[':test_id'] = $test_id;
                $criteria1->addCondition("t.student_id = :student_id");
                $criteria1->params[':student_id'] = $student_id;
                $odgovori = ClickAnswer::model()->findAll($criteria1);
                
                $criteria2 = new CDbCriteria();
                $criteria2->select = "t.*";
                $criteria2->join = "JOIN `fill_question` ON (t.fill_id = fill_question.id)";
                $criteria2->addCondition("fill_question.test_id = :test_id");                
                $criteria2->params[':test_id'] = $test_id;
                $criteria2->addCondition("t.student_id = :student_id");
                $criteria2->params[':student_id'] = $student_id;
                $criteria2->addCondition("t.checked = 0");
                $fill_alls = FillAnswer::model()->findAll($criteria2);
                $fill_num = 0;
                foreach ($fill_alls as $fill_all){$fill_num++;}
                
                $criteria3 = new CDbCriteria();
                $criteria3->select = "t.*";
                $criteria3->join = "JOIN `complete_question` ON (t.complete_id = complete_question.id)";
                $criteria3->addCondition("complete_question.test_id = :test_id");                
                $criteria3->params[':test_id'] = $test_id;
                $criteria3->addCondition("t.student_id = :student_id");
                $criteria3->params[':student_id'] = $student_id;
                $criteria3->addCondition("t.checked = 0");
                $complete_alls = CompleteAnswer::model()->findAll($criteria3);
                $complete_num = 0;
                foreach ($complete_alls as $complete_all){$complete_num++;}
                
                $test_naslov = Test::model()->findByPk($test_id);
                $student = Student::model()->findByPk($student_id);
                
                $poeni=0;
                foreach ($odgovori as $odgovor)
                {
                    $poeni = $poeni + $odgovor->points;
                }
		$this->render('pregledaj',array(
                        'poeni'=>$poeni,
                        'fill_num'=>$fill_num,
                        'complete_num'=>$complete_num,
                        'test_naslov'=>$test_naslov,
                        'student'=>$student
		));
        }
        
        public function actionProveri()
        {
                $test_id = $_GET['test_id'];
                $student_id = Yii::app()->user->id;

                $criteria1 = new CDbCriteria();
                $criteria1->select = "t.*";
                $criteria1->join = "JOIN `click_question` ON (t.click_id = click_question.id)";
                $criteria1->addCondition("click_question.test_id = :test_id");                
                $criteria1->params[':test_id'] = $test_id;
                $criteria1->addCondition("t.student_id = :student_id");
                $criteria1->params[':student_id'] = $student_id;
                
                $odgovori = ClickAnswer::model()->findAll($criteria1);
                $test = Test::model()->findByPk($test_id);
                
		$this->render('proveri',array(
                        'odgovori'=>$odgovori,
                        'test'=>$test,
		));
        }
}
