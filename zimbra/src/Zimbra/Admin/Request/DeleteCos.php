<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Admin\Request;

/**
 * DeleteCos request class
 * Delete a Class of Service (COS).
 *
 * @package    Zimbra
 * @subpackage Admin
 * @category   Request
 * @author     Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright  Copyright © 2013 by Nguyen Van Nguyen.
 */
class DeleteCos extends Base
{
    /**
     * Constructor method for DeleteCos
     * @param  string $id Zimbra ID
     * @return self
     */
    public function __construct($id)
    {
        parent::__construct();
        $this->setChild('id', trim($id));
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->getChild('id');
    }

    /**
     * Sets id
     *
     * @param  string $id
     * @return self
     */
    public function setId($id)
    {
        return $this->setChild('id', trim($id));
    }
}
