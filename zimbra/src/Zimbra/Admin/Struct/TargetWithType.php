<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Admin\Struct;

use Zimbra\Struct\Base;

/**
 * TargetWithType struct class
 *
 * @package    Zimbra
 * @subpackage Admin
 * @category   Struct
 * @author     Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright  Copyright © 2013 by Nguyen Van Nguyen.
 */
class TargetWithType extends Base
{
    /**
     * Constructor method for TargetWithType
     * @param  string $type Target type
     * @param  string $value Value matching
     * @return self
     */
    public function __construct($type, $value = null)
    {
        parent::__construct(trim($value));
        $this->setProperty('type', trim($type));
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->getProperty('type');
    }

    /**
     * Sets type
     *
     * @param  string $type
     * @return self
     */
    public function setType($type)
    {
        return $this->setProperty('type', trim($type));
    }

    /**
     * Returns the array representation of this class 
     *
     * @param  string $name
     * @return array
     */
    public function toArray($name = 'target')
    {
        return parent::toArray($name);
    }

    /**
     * Method returning the xml representation of this class
     *
     * @param  string $name
     * @return SimpleXML
     */
    public function toXml($name = 'target')
    {
        return parent::toXml($name);
    }
}
