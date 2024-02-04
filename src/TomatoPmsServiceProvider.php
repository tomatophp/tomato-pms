<?php

namespace TomatoPHP\TomatoPms;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoAdmin\Facade\TomatoMenu;
use TomatoPHP\TomatoAdmin\Services\Contracts\Menu;


class TomatoPmsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \TomatoPHP\TomatoPms\Console\TomatoPmsInstall::class,
        ]);

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-pms.php', 'tomato-pms');

        //Publish Config
        $this->publishes([
           __DIR__.'/../config/tomato-pms.php' => config_path('tomato-pms.php'),
        ], 'tomato-pms-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tomato-pms-migrations');
        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-pms');

        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-pms'),
        ], 'tomato-pms-views');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-pms');

        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => base_path('lang/vendor/tomato-pms'),
        ], 'tomato-pms-lang');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->app->bind('tomato-projects', function () {
            return new Services\TomatoProjectsSlots();
        });

    }

    public function boot(): void
    {
        TomatoMenu::register([
           Menu::make()
            ->group(__('PMS'))
            ->label(__('Projects'))
            ->route('admin.projects.index')
            ->icon('bx bxs-business')
        ]);
    }
}
