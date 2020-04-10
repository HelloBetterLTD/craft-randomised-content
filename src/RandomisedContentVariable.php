<?php
/**
 * Created by priyashantha@silverstripers.com
 * Date: 4/10/20
 * Time: 10:25 AM
 */

namespace silverstripers\randomisedcontent;

use craft\elements\Entry;
use craft\fields\Matrix;

class RandomisedContentVariable
{

    public function getRandomisedContentBlock(Entry $entry, $fieldName)
    {
        echo 'test';die();
        /* @var $content Matrix */
        $content = $entry->getFieldValue($fieldName);
        $count = $content->getIterator()->count();
        if ($count > 0) {
            $month = date('n');
            $currentItem = $month % $count;

            if ($currentItem == 0) {
                $currentItem = $count - 1;
            } else {
                $currentItem = $currentItem - 1;
            }
//			echo '<pre>'.print_r( $content->getIterator()->offsetGet($currentItem), 2);die();
            return $content->getIterator()->offsetGet($currentItem);
        }
    }

}