<?php


namespace Aaxis\Practice\Plugin;

use \Magento\Framework\App\RequestInterface;

class BeforeGetUserInfoByEmail
{
    private $request;

    public function __construct(
        RequestInterface $request
    )
    {
        $this->request = $request;
    }

    /**
     * @param \Aaxis\Practice\Block\Index\User $subject
     * @param                                  $email
     *
     * @return string[]
     */
    public function beforeGetUserInfoByEmail(
        \Aaxis\Practice\Block\Index\User $subject,
        $email)
    {
        $email_defualt = $this->request->getParam('email');

        if (!(isset($email_defualt)) || $email_defualt == null) {
            $email = '1987421063@qq.com';
        } else {
            $email = $email_defualt;
        }

        $writer = new \Zend\Log\Writer\Stream(BP.'/var/log/Practice2.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('第一次执行方法：'.__METHOD__);

        return [$email];
    }
}
