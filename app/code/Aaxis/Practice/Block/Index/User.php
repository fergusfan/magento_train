<?php


namespace Aaxis\Practice\Block\Index;

use Magento\Framework\App\Request\Http;
use Magento\Framework\Data\Collection;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\User\Model\UserFactory;
use Magento\User\Api\Data\UserInterface;


class User extends Template
{
    /**
     * @var UserFactory
     */
    protected $userFactory;

    /**
     * User constructor.
     *
     * @param Context     $context
     * @param array       $data
     * @param UserFactory $userFactory
     */
    public function __construct(
        Context $context,
        array $data = [],
        UserFactory $userFactory
    )
    {
        $this->userFactory = $userFactory;
        parent::__construct($context, $data);
    }

    public function getUserInfoByEmail()
    {
        $email = $this->_request->getParam('email');
        if (empty($email)) {
            return null;
        }
        $collection = $this->userFactory->create()->getCollection();
        $collection->addFieldToFilter('email', ['eq' => $email])
            ->setPageSize(1);
        $user = $collection->getFirstItem();
        if ($user) {
            return $user;
        } else {
            return null;
        }
        return $user;
    }

}