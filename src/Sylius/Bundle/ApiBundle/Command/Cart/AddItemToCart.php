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

namespace Sylius\Bundle\ApiBundle\Command\Cart;

use Sylius\Bundle\ApiBundle\Command\OrderTokenValueAwareInterface;

class AddItemToCart implements OrderTokenValueAwareInterface
{
    /** @var string|null */
    public $orderTokenValue;

    /**
     * @var string
     * @psalm-immutable
     */
    public $productCode;

    /**
     * @var int
     * @psalm-immutable
     */
    public $quantity;

    public function __construct(string $productCode, int $quantity)
    {
        $this->productCode = $productCode;
        $this->quantity = $quantity;
    }

    public static function createFromData(string $tokenValue, string $productCode, int $quantity): self
    {
        $command = new self($productCode, $quantity);

        $command->orderTokenValue = $tokenValue;

        return $command;
    }

    public function getOrderTokenValue(): ?string
    {
        return $this->orderTokenValue;
    }

    public function setOrderTokenValue(?string $orderTokenValue): void
    {
        $this->orderTokenValue = $orderTokenValue;
    }
}
