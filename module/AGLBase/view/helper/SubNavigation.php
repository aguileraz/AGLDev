<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class SubNavigation extends AbstractHelper
{
    public function __invoke($class = null)
    {
        $view = $this->getView();
        $menu = $view->navigation()->menu();

        $container = $view->navigation()->getContainer();
        $active    = $view->navigation()->setRenderInvisible(true)->findActive($container);

        if (!$active) {
            return;
        }

        $container = $active['page'];
        $depth     = $active['depth'];

        while (0 !== $depth) {
            $container = $container->getParent();
            $depth--;
        }

        $visible = $container->isVisible();
        $html    = $menu->setContainer($container->setVisible(true))
                        ->setUlClass('')
                        ->setOnlyActiveBranch(false)
                        ->setMinDepth(null)
                        ->setMaxDepth(null)
                        ->render();

        $container->setVisible($visible);

        if (strlen($html)) {
            return sprintf('<ul %s><li%s><a href="%s">%s</a>%s</li></ul>',
                    (null !== $class) ? ' class="' . $class . '"' : null,
                    ($container->isActive())? ' class="active"' : null,
                    $container->getHref(),
                    $container->getLabel(),
                    $html);
        }
    }
}