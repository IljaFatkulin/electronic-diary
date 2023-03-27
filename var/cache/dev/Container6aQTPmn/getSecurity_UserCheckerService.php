<?php

namespace Container6aQTPmn;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_UserCheckerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'security.user_checker' shared service.
     *
     * @return \Symfony\Component\Security\Core\User\InMemoryUserChecker
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/User/UserCheckerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/User/InMemoryUserChecker.php';

        return $container->privates['security.user_checker'] = new \Symfony\Component\Security\Core\User\InMemoryUserChecker();
    }
}
