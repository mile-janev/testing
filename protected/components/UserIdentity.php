<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
//	/**
//	 * Authenticates a user.
//	 * The example implementation makes sure if the username and password
//	 * are both 'demo'.
//	 * In practical applications, this should be changed to authenticate
//	 * against some persistent user identity storage (e.g. database).
//	 * @return boolean whether authentication succeeds.
//	 */
//	public function authenticate()
//	{
//		$users=array(
//			// username => password
//			'demo'=>'demo',
//			'admin'=>'admin',
//		);
//		if(!isset($users[$this->username]))
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		else if($users[$this->username]!==$this->password)
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//			$this->errorCode=self::ERROR_NONE;
//		return !$this->errorCode;
//	}
        private $_id;
        public $student;
       public function authenticate()
       {
           $student = Yii::app()->session['student'];
//           var_dump($student); exit();
           if($student)
           {
               $record=Student::model()->findByAttributes(array('username'=>$this->username)); 
           }
           else
           {
               $record=Tester::model()->findByAttributes(array('username'=>$this->username)); 
           }
           
           if($record===null)
           {
                $this->_id='user Null';
                $this->errorCode=self::ERROR_USERNAME_INVALID;
           }
           else if($record->password!==sha1($this->password))//Se sporeduvaat lozinkite, pri sto tekovnata se hesira so sha1 i posle se sporeduva
           {
                $this->_id=$this->username;
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
           }
           else
           {
                $this->_id=$record['id'];
                if($student === false)//Ako ne e student najaven
                {
                    $administrator = Admin::model()->findAllByAttributes(array(), 'tester_id = :tester_id', array(':tester_id' => $record['id']));

                    if(!empty($administrator)){//Ako e administrator vo sesiskata stavame true
                        Yii::app()->session['isadmin'] = true;//Ova gledaj da go otstranes, dovolno e dolnata sesija
                        Yii::app()->session['admin'] = $record['username'];//Niza od administratori i samo oni mozat da brisat i modivikuvaat korisnici
                    }
                    else{
                        Yii::app()->session['isadmin'] = false;
                    }
                }
//                $this->setState('username', $record['username']);
                $this->errorCode=self::ERROR_NONE;

           }
           return !$this->errorCode;
       }

       public function getId()       //  override Id
       {
           return $this->_id;
       }

}