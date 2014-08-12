<?php

namespace Plansky\MongolidBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('mongolid');

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('connections')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('hostname')
                                ->defaultValue('localhost')
                            ->end()
                            ->integerNode('port')
                                ->defaultValue(27017)
                                ->min(0)
                            ->end()
                            ->scalarNode('database')
                                ->defaultValue('mongolid')
                            ->end()
                            ->scalarNode('username')
                                ->defaultNull()
                            ->end()
                            ->scalarNode('password')
                                ->defaultNull()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
