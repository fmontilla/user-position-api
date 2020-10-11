<?php

use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends Laravel\Lumen\Testing\TestCase
{
    /* @var \Faker\Generator $faker */
    public $faker;

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        $this->faker = Faker\Factory::create('pt_BR');
        return require __DIR__.'/../bootstrap/app.php';
    }

    protected function setUpTraits()
    {
        parent::setUpTraits();

        $uses = array_flip(class_uses_recursive(get_class($this)));

        if (isset($uses[DatabaseMigrations::class])) {
            $this->artisan('migrate');
        }
    }
}
