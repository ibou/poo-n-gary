<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
    //test UserService send
    public function testRegister()
    {
        $emailService = $this->createMock(\App\EmailServiceInterface::class);
        $logger = $this->createMock(\App\LoggerInterface::class);
        $userService = new \App\Service\UserService($emailService, $logger);
        $email = 'emailtest@gmail.com';
        $emailService->expects($this->once())
            ->method('send')
            ->with(
                $this->equalTo($email),
                $this->equalTo('Welcome'),
                $this->equalTo('Thank you for registering')
            );
        $userService->register($email);

    }


}