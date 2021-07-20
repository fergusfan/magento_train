<?php


namespace Aaxis\Practice\Plugin;


class AfterGetUserInfoByEmail
{
    public function __construct()
    {
    }

    public function afterGetUserInfoByEmail(
        \Aaxis\Practice\Block\Index\User $subject,
        $result, $email)
    {
        $writer = new \Zend\Log\Writer\Stream(BP.'/var/log/Practice2.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('第四次执行方法：'.__METHOD__);

        $result->new = 'This new add info';

        return $result;
    }

}
