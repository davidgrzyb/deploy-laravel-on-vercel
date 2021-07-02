<?php

namespace DavidGrzyb\DeployLaravelOnVercel;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DavidGrzyb\DeployLaravelOnVercel\Skeleton\SkeletonClass
 */
class DeployLaravelOnVercelFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'deploy-laravel-on-vercel';
    }
}
