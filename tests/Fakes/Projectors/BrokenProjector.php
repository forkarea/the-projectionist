<?php namespace ProjectonistTests\Fakes\Projectors;

class BrokenProjector
{
    public function whenThingHappened()
    {
        throw new \Exception("I am broken");
    }
}