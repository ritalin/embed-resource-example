<?php

namespace EmbedApp\Sample\Resource\App;

use BEAR\Resource\FactoryInterface;
use BEAR\Resource\ResourceObject;
use Embed\Sample\ItemResourceGeneratorBuilder;

class Period2 extends ResourceObject
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function onGet($from, $len)
    {
        $dateFrom = new \DateTime("+{$from} day");
        $this['periods'] = array_map(
            function ($i) use ($from) {
                $n = $from + $i;

                return new \DateTime("+{$n} day");
            },
            range(0, $len - 1)
        );

        return $this;
    }
}
