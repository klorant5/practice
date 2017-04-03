<?php
namespace frontend\tests\unit\models;

use common\fixtures\User as UserFixture;
use common\modules\signup\controllers\factories\SignUpFormFactory;
use common\modules\signup\models\CompanySignUpForm;
use common\modules\signup\models\PersonSignUpForm;
use common\modules\signup\models\TempCompanyDetails;
use common\modules\signup\models\TempPersonDetails;
use common\modules\signup\models\TempUser;
use common\modules\signup\models\TempUserAddress;
use frontend\models\SignupForm;

class SignupFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
//            'user' => [
//                'class' => UserFixture::className(),
//                'dataFile' => codecept_data_dir() . 'user.php'
//            ]
        ]);
    }

    /*public function testCorrectSignup()
    {
        $model = new SignupForm([
            'username' => 'some_username',
            'email' => 'some_email@example.com',
            'password' => 'some_password',
        ]);

        $user = $model->signup();

        expect($user)->isInstanceOf('common\models\User');

        expect($user->username)->equals('some_username');
        expect($user->email)->equals('some_email@example.com');
        expect($user->validatePassword('some_password'))->true();
    }*/

    public function testNotCorrectSignup()
    {
        $model = new SignupForm([
            'username' => 'troy.becker',
            'email' => 'nicolas.dianna@hotmail.com',
            'password' => 'some_password',
        ]);

        expect_not($model->signup());
        expect_that($model->getErrors('username'));
        expect_that($model->getErrors('email'));

        expect($model->getFirstError('username'))
            ->equals('This username has already been taken.');
        expect($model->getFirstError('email'))
            ->equals('This email address has already been taken.');
    }

    /**
     * \advanced\frontend mappában kiadni ezt a parancsot a futtatáshoz:
     * codecept run tests\unit\models\SignupFormTest.php:testCompanySignupCorrect
     */
    public function testCompanySignupCorrect()
    {

        $testEmailAddress = "lorant@asdasd.asd";
        $testCompanyName = "Test co.";

        /* @var CompanySignUpForm $form */
        $form = SignUpFormFactory::run(SignUpFormFactory::TYPE_COMPANY_FORM);

        $form->contact_title = 1;
        $form->contact_email = $testEmailAddress;
        $form->company_name = $testCompanyName;
        $form->contact_phone_type = 1;
        $form->contact_phone_country_code = 1;

        expect_that($form);
        expect_that($form->company_regnum);     //not empty
        expect($form->city)->equals("Singapore");

        $form->save();

//        $tempUser = TempUser::find()
////            ->with('tempCompanyDetails')
////            ->with('addresses')
////            ->with('contactPhone')
//            ->where(["email" => $testEmailAddress])->limit(1)->one();
//
//        expect($tempUser->email)->equals($testEmailAddress);        //1 assertions


        $this->tester->seeRecord(TempUser::className(), ["email" => $testEmailAddress]);      //0 assertions
        $this->tester->seeRecord(TempCompanyDetails::className(), [
            "company_name" => $testCompanyName,
            "registration_number" => $form->company_regnum
        ]);      //0 assertions
        $this->tester->seeRecord(TempUserAddress::className(), [
            "street" => $form->street,
            "city" => $form->city,
            "building_number" => $form->building_number,
        ]);      //0 assertions


    }

    /**
     *
     */
    public function testPersonSignupCorrect()
    {

        $testEmailAddress = "lorant2@asdasd.asd";


        /* @var PersonSignUpForm $form */
        $form = SignUpFormFactory::run(SignUpFormFactory::TYPE_PERSON_FORM);

        $form->contact_email = $testEmailAddress;
        $form->contact_title = 1;
        $form->contact_firstname = "Lóránt";
        $form->contact_lastname = "Kovács";
        $form->contact_phone_type = 1;
        $form->contact_phone_country_code = 1;

        expect_that($form);
        expect($form->city)->equals("Singapore");

        $form->save();


        $this->tester->seeRecord(TempUser::className(), ["email" => $testEmailAddress]);      //0 assertions
        $this->tester->seeRecord(TempPersonDetails::className(), [
            "first_name" => $form->contact_firstname,
            "last_name" => $form->contact_lastname
        ]);      //0 assertions
        $this->tester->seeRecord(TempUserAddress::className(), [
            "street" => $form->street,
            "city" => $form->city,
            "building_number" => $form->building_number,
        ]);      //0 assertions


    }

    /**
     * Minden teszt után lefut??
     */
    public function _after()
    {

    }
}
