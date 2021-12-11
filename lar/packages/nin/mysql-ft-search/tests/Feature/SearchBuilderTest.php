<?php

namespace Nin\MysqlFtSearch\Tests\Feature;

use Nin\MysqlFtSearch\Tests\Fixtures\SearchableModel;
use Laravel\Scout\EngineManager;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Nin\MySqlFtSearch\ServiceProvider;
use Nin\MySqlFtSearch\MySqlSearchEngine;
use Illuminate\Foundation\Testing\WithFaker;

class SearchBuilderTest extends BaseTestCase
{
    use WithFaker;

    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function defineEnvironment($app)
    {
        $app->make('config')->set('scout.driver', 'fake');
        $app->make('config')->set('database.connections.mysql.host', '192.168.68.83');
        $app->make('config')->set('database.connections.mysql.database', 'utest');
        $app->make('config')->set('database.connections.mysql.port', '3307');
        $app->make('config')->set('database.connections.mysql.username', 'root');
        $app->make('config')->set('database.connections.mysql.password', 'root');
    }

    protected function defineDatabaseMigrations()
    {
        $this->setUpFaker();
        /* $this->loadLaravelMigrations();
         $this->loadMigrationsFrom('tests/Migrations');

        SearchableModelFactory::new()->create([
            'name' => 'Ninh Nghia',
            'job' => 'developer',
        ]);

        SearchableModelFactory::new()->create([
            'name' => 'Ninh Nguyen',
            'job' => 'developer',
        ]);

        SearchableModelFactory::new()->create([
            'name' => 'Tom Hiddleston',
            'job' => 'doctor',
        ]);
        */
    }

    protected function prepareScoutSearchMockUsing()
    {
        $manager = $this->app->make(EngineManager::class);
        $manager->extend('fake', function () {
            return new MySqlSearchEngine($this->app);
        });
    }

    public function test_it_can_retrieve_results_with_empty_search()
    {
//        $this->prepareScoutSearchMockUsing();
        $manager = $this->app->make(EngineManager::class);
        $manager->extend('fake', function () {
            return new MySqlSearchEngine($this->app);
        });
//        $models = SearchableModel::search()->get();
        $model = $this->app->make(SearchableModel::class);
        $models = $model->search()->get();
        $this->assertCount(1, $models);

        /*


         $this->assertCount(1, $models);*/
    }

    /*    public function test_it_can_retrieve_results()
        {
            $models = SearchableModel::search('Nghia')->get();
            $this->assertCount(1, $models);
            $this->assertEquals(1, $models[0]->id);

            $models = SearchableModel::search('Nghia')->where('job', 'developer')->get();
            $this->assertCount(1, $models);
            $this->assertEquals(1, $models[0]->id);

            $models = SearchableModel::search('Nghia')->where('job', 'doctor')->get();
            $this->assertCount(0, $models);

            $models = SearchableModel::search('developer')->get();
            $this->assertCount(2, $models);
            $this->assertEquals(1, $models[0]->id);
            $this->assertEquals(2, $models[1]->id);

            $models = SearchableModel::search('developer')->query(function ($query) {
                $query->where('name', 'like', 'Nguyen');
            })->get();
            $this->assertCount(1, $models);
            $this->assertEquals(2, $models[0]->id);

            $models = SearchableModel::search('Ninh Nghia')->get();
            $this->assertCount(2, $models);
            $this->assertEquals(1, $models[0]->id);
            $this->assertEquals(2, $models[1]->id);

            $models = SearchableModel::search('foo')->get();
            $this->assertCount(0, $models);

            $models = SearchableModel::search('deve')->get();
            $this->assertCount(2, $models);
            $this->assertEquals(1, $models[0]->id);
            $this->assertEquals(2, $models[1]->id);
        }

        public function test_it_can_paginate_results()
        {
            $models = SearchableModel::search('foo')->paginate();
            $this->assertCount(0, $models);

            $models = SearchableModel::search('developer')->paginate();
            $this->assertCount(2, $models);
        }*/
}
