<?php
namespace Plansky\MongolidBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Zizaco\Mongolid\MongoDbConnector;
use Zizaco\Mongolid\Model;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class MongolidExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $connector = new MongoDbConnector();
        Model::$connection = $connector->getConnection(
            $this->getConnectionString($config['connections']['default'])
        );

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     * Retrieves a connection string to MongoDB
     *
     * @param  array $config
     *
     * @return  string
     */
    private function getConnectionString(array $config)
    {
        $connectionString = 'mongodb://';

        if (false === is_null($config['username'])) {
            $connectionString .= sprintf(
                '%s:%s@',
                $config['username'],
                $config['password']
            );
        }

        $connectionString .= sprintf(
            '%s:%s/%s',
            $config['hostname'],
            $config['port'],
            $config['database']
        );

        return $connectionString;
    }
}
