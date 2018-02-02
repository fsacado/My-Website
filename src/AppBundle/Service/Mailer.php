<?php
/**
 * Created by PhpStorm.
 * User: wilder12
 * Date: 31/01/18
 * Time: 22:14
 */

namespace AppBundle\Service;


class Mailer
{
    private $swiftmailer;

    public function __construct(\Swift_Mailer $swift_Mailer)
    {
        $this->swiftmailer = $swift_Mailer;
    }

    public function indexAction($subject, $setFrom, $setTo, $setBody)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($setFrom)
            ->setTo($setTo)
            ->setBody(
                $setBody,
                'text/html'
            );
        $this->swiftmailer->send($message);
    }
}