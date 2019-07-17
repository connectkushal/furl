<?php

namespace Connectkushal\Furl;

//use Connectkushal\Furl\CurlBuilder;
use Symfony\Component\Process\Process;

Class Furl extends CurlBuilder
{

    public $output;

    public function send()
    {
        $process = new Process($this->curlCommand);

        $process->run();

        return $process;
    }

    public function process($command)
    {
        $procress = new Process($command);

        return $process;
    }
}
