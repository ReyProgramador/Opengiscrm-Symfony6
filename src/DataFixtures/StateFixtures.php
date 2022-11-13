<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


use App\Entity\State;

use App\Entity\Country;

class StateFixtures extends Fixture
{
	public function load(ObjectManager $manager): void
	{

		$data = [
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

		foreach ($data as $key => $value) {

			$state = new State();

			$country = new Country();

			// $country->setId(1)

			// print_r($country->setId($value['country_id']));

			// $country->setId($value['country_id']);

			// var_dump($country->getId());

			// var_dump($country->getCountry());

			// print_r($country->getId());

			// print_r($value['country']);

			// exit;		

			$state->setState($value['state']);

			$state->setCountry($country->getCountry());

			// $state->setCountry($country->setId($value['country_id']));					

			$manager->persist($state);

			$manager->flush();
		}
	}
}
