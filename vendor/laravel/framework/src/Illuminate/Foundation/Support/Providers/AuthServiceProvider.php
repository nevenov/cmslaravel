<?php

namespace Illuminate\Foundation\Support\Providers;

<<<<<<< HEAD
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
=======
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
>>>>>>> dev

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [];

    /**
     * Register the application's policies.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function registerPolicies(GateContract $gate)
    {
        foreach ($this->policies as $key => $value) {
            $gate->policy($key, $value);
=======
     * @return void
     */
    public function registerPolicies()
    {
        foreach ($this->policies as $key => $value) {
            Gate::policy($key, $value);
>>>>>>> dev
        }
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    public function register()
    {
        //
=======
     * Get the policies defined on the provider.
     *
     * @return array
     */
    public function policies()
    {
        return $this->policies;
>>>>>>> dev
    }
}
