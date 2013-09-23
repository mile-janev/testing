<?php

class TesterController extends Controller
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
                    //Treba da se ogranice ovde samo grupata na testeri da ima pristap do ovie akcii na TesterController
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view', 'update'),
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
		$model=new Tester;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Tester']))
		{
			$model->attributes=$_POST['Tester'];
                        $kime = $model->attributes['username'];//Vrednosta od formata

                        $ima_te = Tester::model()->findByAttributes(array('username'=>$kime));
                        if(empty($ima_te))//Proveruva ako nema tester so toa korisnicko ime go vnesuva vo baza
                        {
                            if($model->save())
                            {
                                $this->redirect(array('view','id'=>$model->id));
                            }
                        }
                        else
                        {
                            echo "Korisnickoto ime e zafateno";
                        }
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

		if(isset($_POST['Tester']))
		{
			$model->attributes=$_POST['Tester'];
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
                
                $offset=2*60*60;//Dva casa napred
                $now = gmdate("Y-m-d H:i:s", time()+$offset);
                
                //Nezapocnati
                $criteria1 = new CDbCriteria();
                $criteria1->select = "*";
                $criteria1->addCondition("tester_id = :user_id");                
                $criteria1->params[':user_id'] = Yii::app()->user->id;
                $criteria1->addCondition("start > :now");
                $criteria1->params[':now'] = $now;
                $nezapocnati = Test::model()->findAll($criteria1);
                
                //Nepregledani se tie sto ova pole im e 0 i testot e zavrsen
                $criteria3 = new CDbCriteria();
                $criteria3->select = "*";
                $criteria3->addCondition("tester_id = :user_id");                
                $criteria3->params[':user_id'] = Yii::app()->user->id;
                $criteria3->addCondition("checked = 0 and end < :now");
                $criteria3->params[':now'] = $now;
                $nepregledani = Test::model()->findAll($criteria3);
                
                //Testovi sto se vo tek
                $criteria2 = new CDbCriteria();
                $criteria2->select = "*";
                $criteria2->addCondition("tester_id = :user_id");                
                $criteria2->params[':user_id'] = Yii::app()->user->id;
                $criteria2->addCondition("start < :now");
                $criteria2->params[':now'] = $now;
                $criteria2->addCondition("end > :now");
                $criteria2->params[':now'] = $now;
                $vo_tek = Test::model()->findAll($criteria2);
                
		$this->render('index',array(
                        'nezapocnati'=>$nezapocnati,
                        'nepregledani'=>$nepregledani,
                        'vo_tek'=>$vo_tek,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tester('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tester']))
			$model->attributes=$_GET['Tester'];

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
		$model=Tester::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tester-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
