<?php
/**
 * Created by priyashantha@silverstripers.com
 * Date: 4/10/20
 * Time: 10:43 AM
 */

namespace silverstripers\randomisedcontent;

use craft\web\twig\variables\CraftVariable;
use yii\base\Event;
use yii\base\Module;

class RandomiseModule extends Module
{
    public $id = 'randomise-content';

    public $_settingsModel = null;

    /**
     * Initializes the module.
     */
    public function init()
    {
        parent::init();

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('randomisedContent', RandomisedContentVariable::class);
            }
        );

    }

}