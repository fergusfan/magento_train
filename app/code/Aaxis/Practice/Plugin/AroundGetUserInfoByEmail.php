<?php


namespace Aaxis\Practice\Plugin;


class AroundGetUserInfoByEmail
{
    public function __construct()
    {
    }

    public function aroundGetUserInfoByEmail(
        \Aaxis\Practice\Block\Index\User $subject,
        callable $proceed,
        $email)
    {
        $writer = new \Zend\Log\Writer\Stream(BP.'/var/log/Practice2.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('第二次执行方法：'.__METHOD__.'- Before proceed()');

        $result = $proceed($email);

        $logger->info('第三次执行方法：'.__METHOD__.'- After proceed()');

        return $result;
//        return $email;
    }
}
