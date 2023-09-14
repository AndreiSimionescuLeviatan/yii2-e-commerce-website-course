<?php

namespace app\components;

use yii\i18n\MissingTranslationEvent;

class TranslationEventHandler
{
    public function HandleMissingTranslation(MissingTranslationEvent $event)
    {
        $event->translatedMessage='[['.$event->message.'-'.$event->category.'-'.$event->language.']]';
    }
}