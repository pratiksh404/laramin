<?php

namespace Pratiksh\Laramin\Providers;

use App\Models\User;
use Illuminate\Routing\Router;
use Pratiksh\Laramin\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Pratiksh\Laramin\Models\Setting;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Pratiksh\Laramin\Models\Permission;
use Pratiksh\Laramin\Policies\RolePolicy;
use Pratiksh\Laramin\Policies\UserPolicy;
use Pratiksh\Laramin\View\Components\Card;
use Pratiksh\Laramin\Policies\SettingPolicy;
use Pratiksh\Laramin\View\Components\Action;
use Pratiksh\Laramin\Mixins\LaraminAuthMixins;
use Pratiksh\Laramin\View\Components\EditPage;
use Pratiksh\Laramin\View\Components\ShowPage;
use Pratiksh\Laramin\Policies\PermissionPolicy;
use Pratiksh\Laramin\Repository\RoleRepository;
use Pratiksh\Laramin\Repository\UserRepository;
use Pratiksh\Laramin\View\Components\IndexPage;
use Pratiksh\Laramin\View\Components\CreatePage;
use Pratiksh\Laramin\Repository\ProfileRepository;
use Pratiksh\Laramin\Repository\SettingRepository;
use Pratiksh\Laramin\Http\Middleware\RoleMiddleware;
use Pratiksh\Laramin\Repository\PermissionRepository;
use Pratiksh\Laramin\Console\Commands\MakeTraitCommand;
use Pratiksh\Laramin\Contracts\RoleRepositoryInterface;
use Pratiksh\Laramin\Contracts\UserRepositoryInterface;
use Pratiksh\Laramin\Console\Commands\MakeServiceCommand;
use Pratiksh\Laramin\Contracts\ProfileRepositoryInterface;
use Pratiksh\Laramin\Contracts\SettingRepositoryInterface;
use Pratiksh\Laramin\Console\Commands\MakeSuperUserCommand;
use Pratiksh\Laramin\Console\Commands\InstallLaraminCommand;
use Pratiksh\Laramin\Console\Commands\MakePermissionCommand;
use Pratiksh\Laramin\Contracts\PermissionRepositoryInterface;
use Pratiksh\Laramin\Console\Commands\MakeCRUDGeneratorCommand;
use Pratiksh\Laramin\Console\Commands\MakeRepositoryPatternCommand;

class LaraminServiceProvider extends ServiceProvider
{
    // Register Policies
    protected $policies = [
        User::class => UserPolicy::class,
        Permission::class => PermissionPolicy::class,
        Role::class => RolePolicy::class,
        Setting::class => SettingPolicy::class
    ];
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish Ressource
        if ($this->app->runningInConsole()) {
            $this->publishResource();
        }
        // Register Resources
        $this->registerResource();
        // Register Middleware
        $this->registerMiddleware();
        // Register Directives
        $this->directives();
        // Register Policies
        $this->registerPolicies();
        // Register View Components
        $this->registerComponents();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register Package Commands
        $this->registerCommands();
        /* Repository Interface Binding */
        $this->repos();
        // Register Mixins
        Route::mixin(new LaraminAuthMixins());
    }

    /**
     *
     * Publish Package Resource
     *
     *@return void
     *
     */
    protected function publishResource()
    {
        // Publish Config File
        $this->publishes([
            __DIR__ . '/../../config/laramin.php' => config_path('laramin.php'),
        ], 'laramin-config');
        // Publish View Files
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/laramin'),
        ], 'laramin-views');
        // Publish Migration Files
        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path('migrations'),
        ], 'laramin-migrations');
        // Publish Database Seeds
        $this->publishes([
            __DIR__ . '/../../database/seeds' => database_path('seeders'),
        ], 'laramin-seeds');
        $this->publishes([
            __DIR__ . '/../../payload/assets' => public_path('laramin/assets'),
        ], 'laramin-assets-files');
        // Publish Static Files
        $this->publishes([
            __DIR__ . '/../../payload/static' => public_path('laramin/static'),
        ], 'laramin-static-files');
    }

    /**
     *
     * Register Package Resource
     *
     *@return void
     *
     */
    protected function registerResource()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations'); // Loading Migration Files
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'laramin'); // Loading Views Files
        $this->registerRoutes();
    }

    /**
     *
     * Register Routes
     *
     * @return void
     *
     */
    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        });
    }

    /**
     *
     * Register Route Configuration
     *
     * @return void
     *
     */
    protected function routeConfiguration()
    {
        return [
            'prefix' => config('laramin.prefix', 'admin'),
            'middleware' => config('laramin.middleware', ['web', 'auth'])
        ];
    }

    /**
     *
     * Register Package Command
     *
     *@return void
     *
     */
    protected function registerCommands()
    {
        $this->commands([
            MakeCRUDGeneratorCommand::class,
            MakePermissionCommand::class,
            MakeRepositoryPatternCommand::class,
            MakeServiceCommand::class,
            MakeSuperUserCommand::class,
            MakeTraitCommand::class,
            InstallLaraminCommand::class
        ]);
    }

    /**
     *
     * Blade Directives
     *
     * @return void
     *
     */
    protected function directives()
    {
        Blade::if('hasRole', function ($roles) {
            $hasAccess = false;
            $roles_array = explode("|", $roles);
            foreach ($roles_array as $role) {
                $hasAccess = $hasAccess || Auth::user()->hasRole($role) || Auth::user()->isSuperAdmin();
            }
            return $hasAccess;
        });
    }

    /**
     *
     * Repository Binding
     *
     * @return void
     *
     */
    protected function repos()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
    }

    /**
     *
     * Register Middlewares
     *
     *@return void
     *
     */
    protected function registerMiddleware()
    {
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('role', RoleMiddleware::class);
    }

    /**
     *
     * Register View Components
     *
     *@return void
     *
     */
    protected function registerComponents()
    {
        $this->loadViewComponentsAs('laramin', [
            Action::class,
            Card::class,
            CreatePage::class,
            EditPage::class,
            IndexPage::class,
            ShowPage::class
        ]);
    }

    /**
     *
     * Register Policies
     *
     *@return void
     *
     */
    protected function registerPolicies()
    {
        foreach ($this->policies as $key => $value) {
            Gate::policy($key, $value);
        }
    }
}
