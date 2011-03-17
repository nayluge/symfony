<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\EventListener;

use Symfony\Component\Form\FieldInterface;
use Symfony\Component\Form\Events;
use Symfony\Component\Form\Event\FilterDataEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Takes care of converting the input from a single radio button
 * to an array.
 *
 * @author Bernhard Schussek <bernhard.schussek@symfony-project.com>
 */
class FixRadioInputListener implements EventSubscriberInterface
{
    public function filterBoundDataFromClient(FilterDataEvent $event)
    {
        $data = $event->getData();

        $event->setData(count((array)$data) === 0 ? array() : array($data => true));
    }

    public static function getSubscribedEvents()
    {
        return Events::filterBoundDataFromClient;
    }
}