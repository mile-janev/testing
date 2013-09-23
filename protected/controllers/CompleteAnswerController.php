<?php

class CompleteAnswerController extends Controller
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
				'actions'=>array('create','update','saveanswer', 'pregledaj', 'savepoints', 'proveri'),
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
		$model=new CompleteAnswer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CompleteAnswer']))
		{
			$model->attributes=$_POST['CompleteAnswer'];
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

		if(isset($_POST['CompleteAnswer']))
		{
			$model->attributes=$_POST['CompleteAnswer'];
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
		$dataProvider=new CActiveDataProvider('CompleteAnswer');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CompleteAnswer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CompleteAnswer']))
			$model->attributes=$_GET['CompleteAnswer'];

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
		$model=CompleteAnswer::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='complete-answer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
                
        public function actionSaveanswer()
        {
            $model=new CompleteAnswer();
            
            if(isset($_POST))
            {
            	$model->answer=$_POST['answer'];
                $model->complete_id = $_POST['complete_id'];
                $model->student_id = Yii::app()->user->id;
		
                if($model->save())
                {
                    header("location: ".$_SERVER['HTTP_REFERER']);
//                    $this->redirect('index.php?r=test/polagaj&test_id=1&type=complete');
                }
            }
            header("location: ".$_SERVER['HTTP_REFERER']);
//            $this->redirect('index.php?r=test/polagaj&test_id=1&type=complete');
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
                $criteria1->join = "JOIN `complete_question` ON (t.complete_id = complete_question.id)";
                $criteria1->addCondition("complete_question.test_id = :test_id");                
                $criteria1->params[':test_id'] = $test_id;
                $criteria1->addCondition("t.student_id = :student_id");
                $criteria1->params[':student_id'] = $student_id;
                
                $odgovori = CompleteAnswer::model()->findAll($criteria1);
                
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
                
		$this->render('pregledaj',array(
			'odgovori'=>$odgovori,
                        'fill_num'=>$fill_num,
                        'complete_num'=>$complete_num,
                        'test_naslov'=>$test_naslov,
                        'student'=>$student
		));
        }
        
        public function actionSavepoints() //Zacuvuva poeni i komentari od profesorot
        {
                $model1 = new CompleteAnswer;
                $model2 = new CompleteReply;
                
                $completeanswer_id = $_POST['completeanswer_id'];
                $points = $_POST['CompleteAnswer']['points'];
                
                if($_POST['comment'] != '')
                {
                    $comment = $_POST['comment'];
                    $model2->completeanswer_id = $completeanswer_id;
                    $model2->user_id = Yii::app()->user->id;
                    $model2->comment = $comment;
                    
                    if(Yii::app()->session['student'])
                    {
                        $model2->isstudent = 1;
                    }
                    else
                    {
                        $model2->isstudent = 0;
                    }
                    $model2->save();
                }
                
                $model1 = CompleteAnswer::model()->findByPk($completeanswer_id);
                $model1->points = $points;
                $model1->checked = 1;
                
                if($model1->save())
                {
                    header("Location: ".$_SERVER['HTTP_REFERER']);
                }
                echo "Greska. <a href='".$_SERVER['HTTP_REFERER']."'>Klikni ovde za da se vratis nazad</a>";   
        }
        
        public function actionProveri()
        {
                $test_id = $_GET['test_id'];
                $student_id = Yii::app()->user->id;

                $criteria1 = new CDbCriteria();
                $criteria1->select = "t.*";
                $criteria1->join = "JOIN `complete_question` ON (t.complete_id = complete_question.id)";
                $criteria1->addCondition("complete_question.test_id = :test_id");                
                $criteria1->params[':test_id'] = $test_id;
                $criteria1->addCondition("t.student_id = :student_id");
                $criteria1->params[':student_id'] = $student_id;
                
                $odgovori = CompleteAnswer::model()->findAll($criteria1);
                $test = Test::model()->findByPk($test_id);
                
		$this->render('proveri',array(
                        'odgovori'=>$odgovori,
                        'test'=>$test,
		));
        }
}
