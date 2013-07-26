<?php

/**
 * LoginForm class file.
 */
class LoginForm extends CFormModel
{
    public $username;
    public $password;
    public $rememberMe;
    
    /**
     * @see CModel::rules()
     */
    public function rules()
    {
        return array(
            array('username, password', 'authenticate'),
            array('rememberMe', 'boolean'),
        );
    }
    
    /**
     * @see CModel::attributeLabels()
     */
    public function attributeLabels()
    {
        return array(
            'username' => 'ユーザ名',
            'password' => 'パスワード',
            'rememberMe' => '次回から自動的にログイン',
        );
    }
    
    /**
     * authenticate
     */
    public function authenticate($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $identity = new UserIdentity($this->username, $this->password);
            $identity->authenticate();

            if ($identity->errorCode === UserIdentity::ERROR_NONE) {
                $duration = $this->rememberMe ? 3600*24*30 : 0; // 30 days
                Yii::app()->user->login($identity, $duration);
            } else {
                $this->addError(null, 'ログイン情報が正しくありません。');
            }
        }
    }
}

