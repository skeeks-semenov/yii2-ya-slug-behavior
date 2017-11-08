<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 04.11.2017
 */
namespace skeeks\yii2\yaslug;
use Cocur\Slugify\RuleProvider\RuleProviderInterface;
use Cocur\Slugify\Slugify;

use yii\base\InvalidConfigException;
use yii\db\BaseActiveRecord;
use yii\behaviors\AttributeBehavior;
use yii\base\Event;

/**
 * Class YaSlugHelper
 * @package skeeks\yii2\yaslug
 */
class YaSlugHelper
{
    static public function slugify($string)
    {
        $slugify = new Slugify([
            'rulesets' => ['default', 'russian'],
            'regexp' => '/([^A-Za-z0-9хХ]|-)+/',
            'lowercase' => true,
            'separator' => "-",
            'trim' => true,
        ]);

        $slugify->addRule('ё', 'yo');
        $slugify->addRule('Ё', 'Yo');

        $slugify->addRule('й', 'j');
        $slugify->addRule('Й', 'J');

        $slugify->addRule('х', 'Х');
        $slugify->addRule('Х', 'Х');

        $slugify->addRule('ц', 'c');
        $slugify->addRule('Ц', 'C');

        $slugify->addRule('щ', 'shch');
        $slugify->addRule('Щ', 'Shch');

        $slugify->addRule('э', 'eh');
        $slugify->addRule('Э', 'Eh');

        //1 step
        $string = $slugify->slugify($string);

        return $string;
    }
}
