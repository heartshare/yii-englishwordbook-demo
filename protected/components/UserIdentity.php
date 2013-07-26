<?php

/**
 * UserIdentity class file.
 */
class UserIdentity extends CUserIdentity
{
    private $id;
    
    /**
     * @see CUserIdentity::authenticate()
     */
    public function authenticate()
    {
        $user = User::model()->findByAttributes(array(
            'username' => $this->username,
        ));

        if ($this->password === '') {
            $this->password = 'dummy';
        }

        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;

        } elseif (!CPasswordHelper::verifyPassword($this->password, $user->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;

        } else {
            $this->id = $user->id;
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
    
    /**
     * @see CUserIdentity::getId()
     */
    public function getId()
    {
        return $this->id;
    }
}

