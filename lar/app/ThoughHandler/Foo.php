<?php

namespace App\ThoughHandler;

class Foo
{
    public $pipeline;
    public $object;

    public function __construct($pipeline, $object)
    {
        $this->pipeline = $pipeline;
        $this->object = $object;
    }

    public function __invoke()
    {
        return $this->pipeline
            ->send($this->object)
            ->through([
                Active::class
            ])
            ->thenReturn();
    }

}
