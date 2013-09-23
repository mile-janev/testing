<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $index
 * @property string $firstname
 * @property string $lastname
 */
class Student extends CActiveRecord
{
    public $password2;
//    public $currentPassword;

    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, password2, index, firstname, lastname', 'required', 'message'=>'Полето {attribute} е задолжително'),
                        array('username, password, password2', 'length', 'min'=>6, 'max'=>40, 'tooShort'=>'Полето {attribute} треба да има минимум {min} карактери'),
                        array('password2', 'compare', 'compareAttribute'=>'password','message'=>'Лозинките не се совпаѓаат','allowEmpty'=>true),
			array('firstname, lastname', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, index, firstname, lastname', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ИД',
			'username' => 'Корисничко име',
			'password' => 'Лозинка',
			'index' => 'Индекс',
			'firstname' => 'Име',
			'lastname' => 'Презиме',
                        'password2' => 'Повтори лозинка',
		);
	}
        
        public function beforeSave()
        {
            if(trim($this->password) != "")
            {
                $this->password = sha1($this->password);                
            }
            else
            {
                unset($this->password);
                unset($this->password2);
            }

            return parent::beforeSave();
        }
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('index',$this->index,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
//        function currentPasswordCheck()
//        {
//            $uid = Student::model()->findByPk(Yii::app()->user->id);
//            if(trim($this->currentPassword)!="")
//            {
//                if (sha1($this->currentPassword) !== $uid->password) { // Invalid password!
//                    $this->addError('currentPassword','Pogresna lozinka.');
//                }
//            }
//        }
}