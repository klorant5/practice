<?php

namespace backend\modules\user\controllers\actions\temp_user;


use backend\modules\user\models\TempUserSaveForm;
use common\models\User;

class BaseTempUserAction
{
    /**
     * @var TempUserSaveForm
     */
    public $form;

    /**
     * @var string A pillanatnyi error szövegét tartalmazza
     */
    public $errorMsg;

    /**
     *
     */
    public function execute()
    {
        
    }

    /**
     * reference idk alapján elvégezzük a szükséges műveleteket
     */
    protected function handleFurtherActions()
    {
        switch ($this->form->temp_user->reference_type) {
            case User::REFERENCE_TYPE_SIGN_UP:
                $this->handleSignUpAction();
                break;
                //TODO: ... valahogy a user_id-t átadni ennek a fvnek...
        }
    }

    /**
     *
     */
    protected function handleSignUpAction()
    {

    }
}