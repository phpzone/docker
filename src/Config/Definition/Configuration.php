<?php

namespace PhpZone\Docker\Config\Definition;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('docker');

        $rootNode
            ->useAttributeAsKey('id')
            ->prototype('array')
                ->children()
                    ->scalarNode('description')->end()
                    ->scalarNode('command')->end()
                    ->scalarNode('file')->end()
                    ->scalarNode('name')->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
