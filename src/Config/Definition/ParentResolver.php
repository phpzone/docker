<?php

namespace PhpZone\Docker\Config\Definition;

class ParentResolver
{
    /**
     * @param array $definitions
     *
     * @return array
     */
    public function resolve(array $definitions)
    {
        $resolvedDefinitions = array();

        foreach ($definitions as $key => $definition) {
            if (!empty($definition['parent'])) {
                $definition = $this->mergeParents($definition, $definitions);
            }

            $resolvedDefinitions[$key] = $definition;
        }

        return $resolvedDefinitions;
    }

    /**
     * @param array $definition  Child definition
     * @param array $definitions Collection of all definitions
     *
     * @return array Merged definition
     */
    private function mergeParents(array $definition, array $definitions)
    {
        $parentId = $definition['parent'];
        unset($definition['parent']);

        $definition = array_merge($definitions[$parentId], $definition);

        if (!empty($definition['parent'])) {
            $definition = $this->mergeParents($definition, $definitions);
            unset($definition['parent']);
        }

        return $definition;
    }
}
