<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Log;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\User;
use App\Policies\LogPolicy;
use App\Policies\OrganizationPolicy;
use App\Policies\OrganizationUserPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Log::class => LogPolicy::class,
        User::class=>UserPolicy::class,
        OrganizationUser::class=>OrganizationUserPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
