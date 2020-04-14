<?php
/**
 * Created by priyashantha@silverstripers.com
 * Date: 4/10/20
 * Time: 10:25 AM
 */

namespace silverstripers\randomisedcontent;

use craft\elements\Entry;
use craft\elements\MatrixBlock;
use craft\fields\Matrix;
use craft\records\MatrixBlockType;

class RandomisedContentVariable
{

    public function getRandomisedMatrixBlock(Entry $entry, $fieldName)
    {
        /* @var $blocksQuery Matrix */
        $blocksQuery = $entry->getFieldValue($fieldName);
        $blocks = $blocksQuery->getIterator();
        $count = $blocks->count();
        if ($count > 0) {
            $month = date('n');
            $currentItem = $month % $count;

            if ($currentItem == 0) {
                $currentItem = $count - 1;
            } else {
                $currentItem = $currentItem - 1;
            }
            return $blocks->offsetGet($currentItem);
        } elseif ($count > 1) {
            trigger_error(
                'You can randomise matrix field with only one block type. '
                . $fieldName. ' has ' . $count . ' block types',
                E_USER_ERROR
            );
        }
    }

}