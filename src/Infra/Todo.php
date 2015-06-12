<?php

namespace EmbedApp\Sample\Infra;

use Omelet\Annotation\Column;
use Omelet\Annotation\Entity;

class Todo
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $todo;

    /**
     * @var \DateTime
     */
    public $created;

    /**
     * @var Hidden
     */
    public $hidden;

    /**
     * @param calable(Todo -> Void) fn
     */
    public function __construct(callable $fn = null)
    {
        if ($fn !== null) {
            $fn($this);
        }
    }

    public static function __set_state($values)
    {
        return new Todo(function ($obj) use ($values) {
            $obj->id = $values['id'];
            $obj->todo = $values['todo'];
            $obj->created = $values['created'];
            $obj->hidden = $values['hidden'];
        });
    }
}
