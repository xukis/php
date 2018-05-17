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

use Zimbra\Admin\Struct\MailboxByAccountIdSelector as Mailbox;

/**
 * RecalculateMailboxCounts request class
 * Recalculate Mailbox counts.
 * Forces immediate recalculation of total mailbox quota usage and all folder unread and size counts 
 *
 * @package    Zimbra
 * @subpackage Admin
 * @category   Request
 * @author     Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright  Copyright © 2013 by Nguyen Van Nguyen.
 */
class RecalculateMailboxCounts extends Base
{
    /**
     * Constructor method for RecalculateMailboxCounts
     * @param Mailbox $mbox Specify reindexing to perform
     * @return self
     */
    public function __construct(Mailbox $mbox)
    {
        parent::__construct();
        $this->setChild('mbox', $mbox);
    }

    /**
     * Gets the mbox.
     *
     * @return Mailbox
     */
    public function getMailbox()
    {
        return $this->getChild('mbox');
    }

    /**
     * Sets the mbox.
     *
     * @param  Mailbox $mbox
     * @return self
     */
    public function setMailbox(Mailbox $mbox)
    {
        return $this->setChild('mbox', $mbox);
    }
}
