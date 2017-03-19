<?php

use common\modules\signup\controllers\factories\SignUpFormFactory;
use yii\bootstrap\Tabs;


$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>Sign up</h1>

<div>
    <p>If you would like to use our service, you will need to register.</p>
    <p>Please fill in all the necessary information and click the ‘I send a registration request’ button.</p>

    <p>Please note, we will send a postal letter with the login details to your postal address, therefore please check
        your address twice before you click the button.</p>
</div>

<?= Tabs::widget([
    'items' => [
        [
            'label'   => Yii::t('sign up', 'Company'),
            'content' => $this->render("_company_form", [
                'signUpType' => SignUpFormFactory::TYPE_COMPANY_FORM,
                'model'      => SignUpFormFactory::run(SignUpFormFactory::TYPE_COMPANY_FORM),
            ]),
        ],
        [
            'label'   => Yii::t('sign up', 'Person'),
            'content' => $this->render("_person_form", [
                'signUpType' => SignUpFormFactory::TYPE_PERSON_FORM,
                'model'      => SignUpFormFactory::run(SignUpFormFactory::TYPE_PERSON_FORM),
            ]),
        ],
        [
            'label'   => Yii::t('sign up', 'Debt collector'),
            'content' => $this->render("_company_form", [
                'signUpType' => SignUpFormFactory::TYPE_DEBT_COLLECTOR_FORM,
                'model'      => SignUpFormFactory::run(SignUpFormFactory::TYPE_DEBT_COLLECTOR_FORM),
            ]),
        ],
    ],
]) ?>
