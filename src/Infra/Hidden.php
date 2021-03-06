<?php

namespace EmbedApp\Sample\Infra;

use Doctrine\DBAL\Types\Type;
use Omelet\Domain\CustomDomain;

class Hidden extends CustomDomain
{
    public function __construct($notVisible)
    {
        parent::__construct(Type::BOOLEAN, $notVisible);
    }
}
