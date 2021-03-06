<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'security.password_encoder' shared service.

include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Encoder\\UserPasswordEncoderInterface.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Encoder\\UserPasswordEncoder.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Encoder\\EncoderFactoryInterface.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Encoder\\EncoderFactory.php';

return $this->services['security.password_encoder'] = new \Symfony\Component\Security\Core\Encoder\UserPasswordEncoder(($this->privates['security.encoder_factory.generic'] ?? ($this->privates['security.encoder_factory.generic'] = new \Symfony\Component\Security\Core\Encoder\EncoderFactory(array()))));
