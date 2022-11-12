<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\User;

use App\Entity\Country;

use App\Entity\State;

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

		$country = new Country();

		$state = new State();				

		$user->setRoles($roles);

		$password = $this->hasher->hashPassword($user,'123');

		$user->setPassword($password);		

		$user->setEmail($email);

		$user->setImg('user.png');

		$user->setFirstName('jonathan');

		$user->setLastName('castro');

		$user->setCountry($country->getId());

		$user->setState($state->getId());

		$manager->persist($user);

		$manager->flush();
	}
}
