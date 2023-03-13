<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\CustomerOrderCancellationPlugin\Twig;

use Sylius\CustomerOrderCancellationPlugin\Checker\CustomerOrderCancellationCheckerInterface;
use Twig\Extension\AbstractExtension;
use Twig\Extension\ExtensionInterface;
use Twig\TwigFunction;

final class CustomerOrderCancellationExtension extends AbstractExtension implements ExtensionInterface
{
    /** @var CustomerOrderCancellationCheckerInterface */
    private $customerOrderCancellationChecker;

    public function __construct(CustomerOrderCancellationCheckerInterface $customerOrderCancellationChecker)
    {
        $this->customerOrderCancellationChecker = $customerOrderCancellationChecker;
    }

    public function getFunctions(): array
    {
        return [new TwigFunction('can_customer_cancel_order', [$this->customerOrderCancellationChecker, 'canBeCancelled'])];
    }
}
