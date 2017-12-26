<?php
declare(strict_types=1);

namespace Ruwork\AdminBundle\Config\Model\Action;

use Ruwork\AdminBundle\Config\Model\AbstractConfig;
use Ruwork\AdminBundle\Config\Model\Field\ListFieldConfig;

/**
 * @property bool              $enabled
 * @property int               $perPage
 * @property string[]          $requiresGranted
 * @property string            $title
 * @property ListFieldConfig[] $fields
 * @property string            $orderByAsc
 * @property string            $orderByDesc
 */
class ListActionConfig extends AbstractConfig
{
}
