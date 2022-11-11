<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\User;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
	private UserPasswordHasherInterface $hasher;

	public function __construct(UserPasswordHasherInterface $hasher)
	{
		$this->hasher = $hasher;
	}
	
	public function load(ObjectManager $manager): void
	{ 

		$email = $_ENV["EMAIL_ADMIN"];     

		$roles[] = 'ROLE_ADMIN';


		$user = new User();		

		$user->setRoles($roles);

		$password = $this->hasher->hashPassword($user,'123');

		$user->setPassword($password);		

		$user->setEmail($email);	


		$manager->persist($user);

		$manager->flush();
	}
}
