<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\SalesProductConfigurationWidget\Resolver;

use Generated\Shared\Transfer\ProductConfigurationTemplateTransfer;
use Generated\Shared\Transfer\SalesOrderItemConfigurationTransfer;

interface ProductConfigurationTemplateResolverInterface
{
    public function resolveProductConfigurationTemplate(
        SalesOrderItemConfigurationTransfer $salesOrderItemConfigurationTransfer
    ): ProductConfigurationTemplateTransfer;
}
