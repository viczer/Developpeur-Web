<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerCn4yTqa\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerCn4yTqa/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerCn4yTqa.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerCn4yTqa\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerCn4yTqa\srcApp_KernelDevDebugContainer(array(
    'container.build_hash' => 'Cn4yTqa',
    'container.build_id' => '97fd1953',
    'container.build_time' => 1549271612,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerCn4yTqa');
