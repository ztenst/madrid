<?php
/**
 * 登录表单模型
 *
 * @author steven.allen
 * @version 2016-08-30 21:12:17
 */
class VipLoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * 验证规则
	 * @return [type] [description]
	 */
	public function rules()
	{
		return array(
			array('username, password', 'required', 'message'=>'用户名和密码必填'),
			array('password', 'authenticate'),
		);
	}

	/**
	 * 声明特性标签
	 */
	public function attributeLabels()
	{
		return array(
            'username' => '用户名',
            'password' =>  '密码',
		);
	}


	/**
	 * 验证帐号密码
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
            $this->_identity=new VipIdentity($this->username,$this->password);
            $this->_identity->authenticate();
            if($this->_identity->errorCode==10000)
				$this->addError('error','用户名或密码错误');
			// elseif($this->_identity->errorCode==20000)
			// 	$this->addError('error','手机号为黑名单号码');
   //          elseif($this->_identity->errorCode)
			// 	$this->addError('error','用户名或密码错误');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new VipIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===VipIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24 : 0; // 24小时
			Yii::app()->user->login($this->_identity, $duration);
			return true;
		}

		else
			return false;
	}
}
