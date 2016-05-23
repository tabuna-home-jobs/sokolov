<?php

class Test extends TestCase
{
    /**
     * @var FakerGenerator
     */
    protected $faker;

    /**
     * Setup faker.
     */
    public function setUp()
    {
        parent::setUp();
        $this->faker = new Faker\Generator();
    }

    /**
     * My test implementation.
     */
    public function testAllianceIsGorgeous()
    {
        $this->visit('/');
        $this->visit('/auth/login');
        $this->type('bliz48rus@gmail.com', 'email');
        $this->type('03af4dE1', 'password');
        $this->press('Log In');
        $this->seePageIs('/dashboard');
        $this->see('Статистика');
    }
}
