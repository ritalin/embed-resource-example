<?php

namespace EmbedApp\Sample\Module;

use BEAR\Package\PackageModule;
use BEAR\Package\Provide\Router\AuraRouterModule;
use EmbedApp\Sample\Infra\TodoDao;
use Omelet\Builder\Configuration;
use Omelet\Module\DaoBuilderBearModule;
use Psr\Log\LoggerInterface;
use Ray\Di\AbstractModule;
use Ray\Di\Scope;

class AppModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->install(new PackageModule);
        $this->override(new AuraRouterModule);

        $projectRoot = dirname(dirname(__DIR__));

        $daoConf = new Configuration(function ($c) use ($projectRoot) {
            $c->daoClassPath = $projectRoot . '/var/tmp/auto_generated';
            $c->sqlRootDir = $projectRoot . '/sql';
            $c->watchMode = 'Always';
            $c->connectionString = http_build_query([
                'driver' => 'pdo_sqlite', 'path' => $projectRoot . '/var/db/todo.sqlite3'
            ]);
        });

        $this->install(new DaoBuilderBearModule($daoConf, [
            TodoDao::class,
        ]));
    }
}
