<?php

namespace Container6lmaYwh;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_VSIVsfEService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.vSIVsfE' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.vSIVsfE'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\AdminPanel\\AdminTimetableController::deleteLesson' => ['privates', '.service_locator.p0i0Zwr', 'get_ServiceLocator_P0i0ZwrService', true],
            'App\\Controller\\AdminPanel\\AdminTimetableController::timetable' => ['privates', '.service_locator.p0i0Zwr', 'get_ServiceLocator_P0i0ZwrService', true],
            'App\\Controller\\AdminPanel\\AdminTimetableController::timetableChange' => ['privates', '.service_locator._V4FQaK', 'get_ServiceLocator_V4FQaKService', true],
            'App\\Controller\\AdminPanel\\AdminUsersController::user_choose' => ['privates', '.service_locator.yAO3wGb', 'get_ServiceLocator_YAO3wGbService', true],
            'App\\Controller\\AdminPanel\\AdminUsersController::user_profile' => ['privates', '.service_locator.ma17XGR', 'get_ServiceLocator_Ma17XGRService', true],
            'App\\Controller\\AdminPanel\\AdminUsersController::users_index' => ['privates', '.service_locator.9bChvBr', 'get_ServiceLocator_9bChvBrService', true],
            'App\\Controller\\PostController::index' => ['privates', '.service_locator.M.WXHx5', 'get_ServiceLocator_M_WXHx5Service', true],
            'App\\Controller\\PostController::remove' => ['privates', '.service_locator.PYF7PhY', 'get_ServiceLocator_PYF7PhYService', true],
            'App\\Controller\\PostController::show' => ['privates', '.service_locator.PYF7PhY', 'get_ServiceLocator_PYF7PhYService', true],
            'App\\Controller\\ProfileController::changeLogin' => ['privates', '.service_locator.GdtSQz_', 'get_ServiceLocator_GdtSQzService', true],
            'App\\Controller\\ProfileController::profileAction' => ['privates', '.service_locator.0WrcZnf', 'get_ServiceLocator_0WrcZnfService', true],
            'App\\Controller\\RegistrationController::register' => ['privates', '.service_locator.BW0.tUC', 'get_ServiceLocator_BW0_TUCService', true],
            'App\\Controller\\SecurityController::login' => ['privates', '.service_locator.rSTd.nA', 'get_ServiceLocator_RSTd_NAService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\AdminPanel\\AdminTimetableController:deleteLesson' => ['privates', '.service_locator.p0i0Zwr', 'get_ServiceLocator_P0i0ZwrService', true],
            'App\\Controller\\AdminPanel\\AdminTimetableController:timetable' => ['privates', '.service_locator.p0i0Zwr', 'get_ServiceLocator_P0i0ZwrService', true],
            'App\\Controller\\AdminPanel\\AdminTimetableController:timetableChange' => ['privates', '.service_locator._V4FQaK', 'get_ServiceLocator_V4FQaKService', true],
            'App\\Controller\\AdminPanel\\AdminUsersController:user_choose' => ['privates', '.service_locator.yAO3wGb', 'get_ServiceLocator_YAO3wGbService', true],
            'App\\Controller\\AdminPanel\\AdminUsersController:user_profile' => ['privates', '.service_locator.ma17XGR', 'get_ServiceLocator_Ma17XGRService', true],
            'App\\Controller\\AdminPanel\\AdminUsersController:users_index' => ['privates', '.service_locator.9bChvBr', 'get_ServiceLocator_9bChvBrService', true],
            'App\\Controller\\PostController:index' => ['privates', '.service_locator.M.WXHx5', 'get_ServiceLocator_M_WXHx5Service', true],
            'App\\Controller\\PostController:remove' => ['privates', '.service_locator.PYF7PhY', 'get_ServiceLocator_PYF7PhYService', true],
            'App\\Controller\\PostController:show' => ['privates', '.service_locator.PYF7PhY', 'get_ServiceLocator_PYF7PhYService', true],
            'App\\Controller\\ProfileController:changeLogin' => ['privates', '.service_locator.GdtSQz_', 'get_ServiceLocator_GdtSQzService', true],
            'App\\Controller\\ProfileController:profileAction' => ['privates', '.service_locator.0WrcZnf', 'get_ServiceLocator_0WrcZnfService', true],
            'App\\Controller\\RegistrationController:register' => ['privates', '.service_locator.BW0.tUC', 'get_ServiceLocator_BW0_TUCService', true],
            'App\\Controller\\SecurityController:login' => ['privates', '.service_locator.rSTd.nA', 'get_ServiceLocator_RSTd_NAService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\AdminPanel\\AdminTimetableController::deleteLesson' => '?',
            'App\\Controller\\AdminPanel\\AdminTimetableController::timetable' => '?',
            'App\\Controller\\AdminPanel\\AdminTimetableController::timetableChange' => '?',
            'App\\Controller\\AdminPanel\\AdminUsersController::user_choose' => '?',
            'App\\Controller\\AdminPanel\\AdminUsersController::user_profile' => '?',
            'App\\Controller\\AdminPanel\\AdminUsersController::users_index' => '?',
            'App\\Controller\\PostController::index' => '?',
            'App\\Controller\\PostController::remove' => '?',
            'App\\Controller\\PostController::show' => '?',
            'App\\Controller\\ProfileController::changeLogin' => '?',
            'App\\Controller\\ProfileController::profileAction' => '?',
            'App\\Controller\\RegistrationController::register' => '?',
            'App\\Controller\\SecurityController::login' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\AdminPanel\\AdminTimetableController:deleteLesson' => '?',
            'App\\Controller\\AdminPanel\\AdminTimetableController:timetable' => '?',
            'App\\Controller\\AdminPanel\\AdminTimetableController:timetableChange' => '?',
            'App\\Controller\\AdminPanel\\AdminUsersController:user_choose' => '?',
            'App\\Controller\\AdminPanel\\AdminUsersController:user_profile' => '?',
            'App\\Controller\\AdminPanel\\AdminUsersController:users_index' => '?',
            'App\\Controller\\PostController:index' => '?',
            'App\\Controller\\PostController:remove' => '?',
            'App\\Controller\\PostController:show' => '?',
            'App\\Controller\\ProfileController:changeLogin' => '?',
            'App\\Controller\\ProfileController:profileAction' => '?',
            'App\\Controller\\RegistrationController:register' => '?',
            'App\\Controller\\SecurityController:login' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}