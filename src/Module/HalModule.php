<?php

namespace EmbedApp\Sample\Module;

use BEAR\Resource\RenderInterface;
use Embed\Sample\Representation\HalRenderer;
use Ray\Di\AbstractModule;
use Ray\Di\Scope;

class HalModule extends AbstractModule
{
    protected function configure()
    {
        $this->bind(RenderInterface::class)->to(HalRenderer::class)->in(Scope::SINGLETON);
    }
}
