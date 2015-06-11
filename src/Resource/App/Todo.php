<?php

namespace EmbedApp\Sample\Resource\App;

use BEAR\Resource\ResourceObject;
use BEAR\Resource\Annotation\Embed;

use EmbedApp\Sample\Infra\TodoDao;

class Todo extends ResourceObject {
    private $todoDao;
    
    public function __construct(TodoDao $todoDao) {
        $this->todoDao = $todoDao;
    }
    
    /**
     * @Embed(rel="period", src="/period?from=0&len=3")
     */
    public function onGet() {
        $this['todo'] = $this->todoDao->listByPub(new \DateTime('2015/4/10'), new \DateTime('2015/5/18'));
        
        return $this;
    }
}
