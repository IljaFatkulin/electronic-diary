<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerDd34HPt\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerDd34HPt/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerDd34HPt.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerDd34HPt\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerDd34HPt\App_KernelDevDebugContainer([
    'container.build_hash' => 'Dd34HPt',
    'container.build_id' => '1d04c5a4',
    'container.build_time' => 1680347671,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerDd34HPt');
