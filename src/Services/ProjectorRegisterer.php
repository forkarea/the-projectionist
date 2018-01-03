<?php namespace Projectionist\Services;

use Projectionist\ValueObjects\ProjectorReference;
use Projectionist\ValueObjects\ProjectorReferenceCollection;

class ProjectorRegisterer
{
    private static $projectors = [];

    public function register($projectors)
    {
        self::$projectors = array_unique(
            array_merge_recursive(self::$projectors, $projectors),
            SORT_REGULAR
        );
    }

    public function all(): ProjectorReferenceCollection
    {
        return new ProjectorReferenceCollection(array_map(function($projector_class){
            return ProjectorReference::makeFromClass($projector_class);
        }, self::$projectors));
    }
}