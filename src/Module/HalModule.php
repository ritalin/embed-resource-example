<?php

namespace EmbedApp\Sample\Module;

use Ray\Di\AbstractModule;
use Ray\Di\Scope;

use BEAR\Resource\RenderInterface;

use Embed\Sample\Representation\HalRenderer;

class HalModule extends AbstractModule {
    protected function configure() {
        $this->bind(RenderInterface::class)->to(HalRenderer::class)->in(Scope::SINGLETON);
    }
}
