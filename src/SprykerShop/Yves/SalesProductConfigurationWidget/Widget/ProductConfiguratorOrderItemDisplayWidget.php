<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\SalesProductConfigurationWidget\Widget;

use Generated\Shared\Transfer\ItemTransfer;
use Spryker\Yves\Kernel\Widget\AbstractWidget;

/**
 * @method \SprykerShop\Yves\SalesProductConfigurationWidget\SalesProductConfigurationWidgetFactory getFactory()
 * @method \SprykerShop\Yves\SalesProductConfigurationWidget\SalesProductConfigurationWidgetConfig getConfig()
 */
class ProductConfiguratorOrderItemDisplayWidget extends AbstractWidget
{
    protected const PARAMETER_IS_VISIBLE = 'isVisible';
    protected const PARAMETER_SALES_ORDER_ITEM_CONFIGURATION = 'salesOrderItemConfiguration';
    protected const PARAMETER_PRODUCT_CONFIGURATION_TEMPLATE = 'productConfigurationTemplate';

    /**
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     */
    public function __construct(ItemTransfer $itemTransfer)
    {
        $this->addIsVisibleParameter($itemTransfer);

        if (!$itemTransfer->getSalesOrderItemConfiguration()) {
            return;
        }

        $this->addSalesOrderItemConfigurationParameter($itemTransfer);
        $this->addProductConfigurationTemplateParameter($itemTransfer);
    }

    /**
     * @return string
     */
    public static function getName(): string
    {
        return 'ProductConfiguratorOrderItemDisplayWidget';
    }

    /**
     * @return string
     */
    public static function getTemplate(): string
    {
        return '@SalesProductConfigurationWidget/views/product-configurator-order-item-display-widget/product-configurator-order-item-display-widget.twig';
    }

    /**
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     *
     * @return void
     */
    protected function addIsVisibleParameter(ItemTransfer $itemTransfer): void
    {
        $this->addParameter(static::PARAMETER_IS_VISIBLE, $itemTransfer->getSalesOrderItemConfiguration());
    }

    /**
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     *
     * @return void
     */
    protected function addSalesOrderItemConfigurationParameter(ItemTransfer $itemTransfer): void
    {
        $this->addParameter(static::PARAMETER_SALES_ORDER_ITEM_CONFIGURATION, $itemTransfer->getSalesOrderItemConfiguration());
    }

    /**
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     *
     * @return void
     */
    protected function addProductConfigurationTemplateParameter(ItemTransfer $itemTransfer): void
    {
        $productConfigurationTemplateTransfer = $this->getFactory()
            ->createProductConfigurationTemplateResolver()
            ->resolveProductConfigurationTemplate($itemTransfer->getSalesOrderItemConfiguration());

        $this->addParameter(static::PARAMETER_PRODUCT_CONFIGURATION_TEMPLATE, $productConfigurationTemplateTransfer);
    }
}
