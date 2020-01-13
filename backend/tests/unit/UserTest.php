<?php namespace backend\tests;

use common\models\User;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testValidation()
    {
        $user = new User();

        $user->Username = null;
        $this->assertFalse($user->validate(['Username']));

        $user->Username = 'toolooooongnaaaaaaameeeefghjkcxdftyhbcfghnvghtoolooooongnaaaaaaameeeefghjkcxdftyh';
        $this->assertFalse($user->validate(['Username']));

        $user->Username = 'davert';
        $this->assertTrue($user->validate(['Username']));
    }
}