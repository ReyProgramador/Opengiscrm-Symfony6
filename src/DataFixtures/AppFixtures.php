<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Country;

use App\Entity\State;

use App\Entity\Lead;

use App\Entity\User;

use App\Entity\UserLead;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
	private UserPasswordHasherInterface $hasher;

	public function __construct(UserPasswordHasherInterface $hasher)
	{
		$this->hasher = $hasher;
	}
	

	public function load(ObjectManager $manager): void
	{
		$data_country = [
			[
				'country' => '-None-',
				'lat' => 0.0000,
				'long' => -00.0000
			],
			[
				'country' => 'Argentina',
				'lat' => -34.0000000,
				'long' => -64.0000000
			],
			[
				'country' => 'Mexico',
				'lat' => 23.0000000,
				'long' => -102.0000000
			],
			[
				'country' => 'Venezuela',
				'lat' => 40.6643,
				'long' => -73.9385
			],
		];

		$data_state = [
			[
				'state' => '-None-',
				'country_id' => 1
			],
			[
				'state' => 'Buenos Aires',
				'country_id' => 2
			],
			[				
				'state' => 'Mexico DF',
				'country_id' => 3
			],
			[
				'state' => 'Distrito Federal',
				'country_id' => 4
			],
		];

		$country = new Country();

		foreach ($data_country as $key => $value) {

			// $country = new Country();

			// print_r($value['country']);

			// exit;		

			$country->setCountry($value['country']);

			$country->setLat($value['lat']);

			$country->setLongt($value['long']);

			$manager->persist($country);

			$manager->flush();
		}

		$state = new State();

		foreach ($data_state as $key => $value) {

			// $state = new State();

			// $country = new Country();				

			$state->setState($value['state']);

			$state->setCountry($country);

			// $state->setCountry($country->setId($value['country_id']));					

			$manager->persist($state);

			$manager->flush();
		}


		$email = $_ENV["EMAIL_ADMIN"];   

		$data_lead = [
			[				
				'first_name' => 'jonathan',
				'last_name' => 'castro',
				'company' => 'OpenGisCRM',
				'email' => $email.'test0',
				'img' => 'user.png',
				'id_state' => 1,
				'city' => '7275 St Rt 17m M',
				'id_country' => 1,
				'postal_code' => '11953'				
			],
			[				
				'first_name' => 'jon',
				'last_name' => 'cast',
				'company' => 'OpenGisCRM2',
				'email' => $email.'test1',
				'img' => 'user.png',
				'id_state' => 2,
				'city' => '7275 St Rt 17m M',
				'id_country' => 2,
				'postal_code' => '11953'			 
			],
			[				
				'first_name' => 'jonas',
				'last_name' => 'castrox',
				'company' => 'OpenGisCRM3',
				'email' => $email.'test2',
				'img' => 'user.png',
				'id_state' => 3,
				'city' => '7275 St Rt 17m M',
				'id_country' => 3,
				'postal_code' => '11953'				
			],
			[				
				'first_name' => 'jonasthan',
				'last_name' => 'castrol',
				'company' => 'OpenGisCRM4',
				'email' => $email.'test3',
				'img' => 'user.png',
				'id_state' => 4,
				'city' => '7275 St Rt 17m M',
				'id_country' => 4,
				'postal_code' => '11953'				
			],
		];

		$lead = new Lead();


		foreach ($data_lead as $key => $value) {

			// $lead = new Lead();

			// print_r($value['country']);

			// exit;		

			$lead->setFirstName($value['first_name']);

			$lead->setLastName($value['last_name']);

			$lead->setCompany($value['company']);

			$lead->setEmail($value['email']);

			$lead->setImg($value['img']);

			$lead->setIdState($state->getId());

			$lead->setCity($value['city']);

			$lead->setIdCountry($country->getId());

			$lead->setPostalCode($value['postal_code']);			

			$manager->persist($lead);

			$manager->flush();
		}


		$roles[] = 'ROLE_ADMIN';


		$user = new User();

		// $country = new Country();

		// $state = new State();				

		$user->setRoles($roles);

		$password = $this->hasher->hashPassword($user,'123');

		$user->setPassword($password);		

		$user->setEmail($email);

		$user->setImg('user.png');

		$user->setFirstName('jonathan');

		$user->setLastName('castro');

		// $user->setCountry($country->getId());

		// $user->setCountry($country->setId(1));

		$user->setCountry($country);			

		// $user->setState($state->getId());

		// $user->setCountry($state->setId(1));	

		$user->setState($state);	

		$manager->persist($user);

		$manager->flush();



		$data_user_lead = [
			[			
				'id_user' => 1,
				'id_lead' => 2				
			],
			[				
				'id_user' => 1,
				'id_lead' => 3				
			],			
		];

		$user_lead = new UserLead();

		foreach ($data_user_lead as $key => $value) {

			// $user_lead = new UserLead();

			// $user = new User();

			// $lead = new Lead();

			// print_r($country->id);

			// print_r($value['country']);

			// exit;		

			// $state->setState($value['state']);

			$user_lead->addLeadd($lead);

			// $user_lead->addLeadd($lead->getUserLeads());

			// $user_lead->addLeadd($lead->getId());			

			$user_lead->addUser($user);

			// $user_lead->addUser($user->getUserLeads());	

			// $user_lead->addUser($user->getId());				

			$manager->persist($user_lead);

			$manager->flush();
		}

	}
}
