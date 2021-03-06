<?php

declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\SyliusProductBundlesPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addProductBundlesMenu(MenuBuilderEvent $builderEvent): void
    {
        $catalogSubnemu = $builderEvent->getMenu()->getChild('catalog');
        if (null !== $catalogSubnemu) {
            $catalogSubnemu
                ->addChild('product_bundles', ['route' => 'solutiondrive_admin_product_bundle_index'])
                ->setLabel('solutiondrive.ui.product_bundles')
                ->setLabelAttribute('icon', 'sitemap');
        }
    }
}
