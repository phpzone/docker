<?php

namespace PhpZone\Docker\Console\Script\Builder;

class DockerComposeBuilder implements Builder
{
    /**
     * @param array $options
     *
     * @return string
     */
    public function build(array $options)
    {
        $script = array('docker-compose');

        if (!empty($options['file'])) {
            $script[] = '-f';
            $script[] = $options['file'];
        }

        if (!empty($options['name'])) {
            $script[] = '-p';
            $script[] = $options['name'];
        }

        $script[] = $options['command'];

        return implode(' ', $script);
    }
}
