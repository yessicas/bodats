<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yudhi
 * Date: 7/7/13
 * Time: 11:22 AM
 * To change this template use File | Settings | File Templates.
 */
class EmailComm
{
    public function configure($mailer)
    {
        
    }
    public function getMailer()
    {
        $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
        $this->configure($mailer);
        return $mailer;
    }
    public function testSendEmail()
    {
        $mailer = $this->getMailer();
        $mailer->From = 'noreply-testing@test.com';
        $mailer->AddReplyTo('suakanto.sinung@test.com');
        $mailer->AddAddress('suakanto.sinung@gmail.com');

        $mailer->FromName = 'Testing Only';
        $mailer->CharSet = 'UTF-8';
        $mailer->Subject = 'Automatic email system';
        //$mailer->Body = $message;
        $mailer->MsgHTML('This is email system. Use it and check it again.');
        $mailer->Send();
    }

}
