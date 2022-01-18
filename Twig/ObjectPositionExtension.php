<?php

namespace Pix\SortableBehaviorBundle\Twig;

use Pix\SortableBehaviorBundle\Services\PositionORMHandler;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ObjectPositionExtension extends AbstractExtension
{
    public const NAME = 'sortableObjectPosition';

    private $positionHandler;

    public function __construct(PositionORMHandler $positionHandler)
    {
        $this->positionHandler = $positionHandler;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('currentObjectPosition', [$this, 'currentPosition']),
            new TwigFunction('lastPosition', [$this, 'lastPosition']),
        ];
    }

    /**
     * @return int
     */
    public function currentPosition($entity)
    {
        return $this->positionHandler->getCurrentPosition($entity);
    }

    /**
     * @return int
     */
    public function lastPosition($entity)
    {
        return $this->positionHandler->getLastPosition($entity);
    }
}

