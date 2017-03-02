<?php

namespace common\modules\signup\controllers;

use common\modules\signup\models\CompanySignUpForm;
use common\modules\signup\models\PersonSignUpForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the `signup` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionHandleCompanySignUp()
    {
        $model = new CompanySignUpForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

        } elseif ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(["thank-you"]);
        }
    }

    public function actionHandlePersonSignUp()
    {
        $model = new PersonSignUpForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

        } elseif ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(["thank-you"]);
        }
    }

    /**
     * sign up thank you page
     * @return string
     */
    public function actionThankYou()
    {

        return $this->render("thank-you");
    }
}
