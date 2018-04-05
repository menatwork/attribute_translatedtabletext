<?php
/**
 * This file is part of MetaModels/attribute_translatedmulti.
 *
 * (c) 2018 MenAtWork.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels
 * @subpackage AttributeTranslatedMulti
 * @author     Andreas Dziemba <dziemba@men-at-work.de>
 * @copyright  2018 MenAtWork.
 * @filesource
 */

use MetaModels\AttributeTranslatedMultiBundle\Attribute\AttributeTypeFactory;
use MetaModels\AttributeTranslatedMultiBundle\Attribute\TranslatedMulti;

// This hack is to load the "old locations" of the classes.
spl_autoload_register(
    function ($class) {
        static $classes = [
            'MetaModels\Attribute\TranslatedMulti\TranslatedMulti'      => TranslatedMulti::class,
            'MetaModels\Attribute\TranslatedMulti\AttributeTypeFactory' => AttributeTypeFactory::class
        ];

        if (isset($classes[$class])) {
            // @codingStandardsIgnoreStart Silencing errors is discouraged
            @trigger_error('Class "' . $class . '" has been renamed to "' . $classes[$class] . '"', E_USER_DEPRECATED);
            // @codingStandardsIgnoreEnd

            if (!class_exists($classes[$class])) {
                spl_autoload_call($class);
            }

            class_alias($classes[$class], $class);
        }
    }
);