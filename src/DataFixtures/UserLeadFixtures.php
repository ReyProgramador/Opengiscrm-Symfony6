<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\User;

use App\Entity\Lead;

use App\Entity\UserLead;



class UserLeadFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [
			[			
				'id_user' => 1,
				'id_lead' => 2				
			],
			[				
				'id_user' => 1,
				'id_lead' => 3				
			],			
		];

		foreach ($data as $key => $value) {

			$user_lead = new UserLead();

			$user = new User();

			$lead = new Lead();

			// print_r($country->id);

			// print_r($value['country']);

			// exit;		

			// $state->setState($value['state']);

			$user_lead->addLeadd($lead->getId());	

			$user_lead->addUser($user->getId());			

			$manager->persist($user_lead);

			$manager->flush();
		}


    }
}
