<?php

namespace EmbedApp\Sample\Infra;

use Omelet\Annotation\Dao;
use Omelet\Annotation\ParamAlt;
use Omelet\Annotation\Select;

/**
 * @Dao("/")
 */
interface TodoDao
{
    /**
     * @Select
     *
     * @param \DateTime $from
     * @param \DateTime $to
     *
     * @return Todo[]
     */
    public function listByPub(\DateTime $from, \DateTime $to);
}
