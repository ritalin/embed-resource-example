<?php

namespace EmbedApp\Sample\Resource\App;

use BEAR\Resource\FactoryInterface;
use BEAR\Resource\ResourceObject;
use Embed\Sample\ItemResourceGeneratorBuilder;

class Period extends ResourceObject
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
        $values = array_map(
            function ($i) use ($from) {
                $n = $from + $i;

                return new \DateTime("+{$n} day");
            },
            range(0, $len - 1)
        );

        $this['periods'] =
            ItemResourceGeneratorBuilder::from($this->factory, $this, '/weekday')
            ->rel('weekday')
            ->valueConvertWith(
                function (\DateTime $v) { return $v->format('Y-m-d'); }
            )
            ->build(
                $values,
                function (\DateTime $v) {
                    return [ 'year' => $v->format('Y'), 'month' => $v->format('m'), 'day' => $v->format('d') ];
                }
            );

        return $this;
    }
}
