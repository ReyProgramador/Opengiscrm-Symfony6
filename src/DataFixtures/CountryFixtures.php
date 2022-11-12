<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Country;

class CountryFixtures extends Fixture
{
	public function load(ObjectManager $manager): void
	{

		$data = [
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

		foreach ($data as $key => $value) {

			$country = new Country();

			// print_r($value['country']);

			// exit;		

			$country->setCountry($value['country']);

			$country->setLat($value['lat']);

			$country->setLongt($value['long']);

			$manager->persist($country);

			$manager->flush();
		}

		// $country = new Country();		

		// $country->setCountry($roles);

		// $country->setLat($roles);

		// $country->setLongt($roles);

		// $manager->persist($country);

		// $manager->flush();
	}
}
