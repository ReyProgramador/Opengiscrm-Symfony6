<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Lead;

class LeadFixtures extends Fixture
{
	public function load(ObjectManager $manager): void
	{
		$email = $_ENV["EMAIL_ADMIN"];   

		$data = [
			[
				// 'id_stripe' => 'cus_example1',
				'first_name' => 'jonathan',
				'last_name' => 'castro',
				'company' => 'OpenGisCRM',
				'email' => $email.'test0',
				'img' => 'user.png',
				'id_state' => 1,
				'city' => '7275 St Rt 17m M',
				'id_country' => 1,
				'postal_code' => '11953'
				// 'title' => 'VP Accounting',
				// 'phone' => '0000-1111111',
				// 'cell_phone' => '0000-1111111',
				// 'id_source' => 1,
				// 'id_sector' => 1,
				// 'id_project' => 1,
				// 'income' => 'test income',
				// 'fax' => 'test fax',
				// 'website' => 'https://opengiscrm.com/',
				// 'id_state_client' => 1,
				// 'quantity_worker' => 'test quantity',
				// 'id_qualification' => 1,
				// 'id_skype' => '@opengiscrm',
				// 'id_twitter' => '@opengiscrm',
				// 'description' => 'test test test test'  
			],
			[
				// 'id_stripe' => 'cus_example2',
				'first_name' => 'jon',
				'last_name' => 'cast',
				'company' => 'OpenGisCRM2',
				'email' => $email.'test1',
				'img' => 'user.png',
				'id_state' => 2,
				'city' => '7275 St Rt 17m M',
				'id_country' => 2,
				'postal_code' => '11953'
				// 'title' => 'VP Accounting',
				// 'phone' => '0000-1111111',
				// 'cell_phone' => '0000-1111111',
				// 'id_source' => 2,
				// 'id_sector' => 2,
				// 'id_project' => 2,
				// 'income' => 'test income',
				// 'fax' => 'test fax',
				// 'website' => 'https://opengiscrm.com/',
				// 'id_state_client' => 2,
				// 'quantity_worker' => 'test quantity',
				// 'id_qualification' => 2,
				// 'id_skype' => '@opengiscrm2',
				// 'id_twitter' => '@opengiscrm2',
				// 'description' => 'test test test test'  
			],
			[
				// 'id_stripe' => 'cus_example3',
				'first_name' => 'jonas',
				'last_name' => 'castrox',
				'company' => 'OpenGisCRM3',
				'email' => $email.'test2',
				'img' => 'user.png',
				'id_state' => 3,
				'city' => '7275 St Rt 17m M',
				'id_country' => 3,
				'postal_code' => '11953'
				// 'title' => 'VP Accounting',
				// 'phone' => '0000-1111111',
				// 'cell_phone' => '0000-1111111',
				// 'id_source' => 3,
				// 'id_sector' => 3,
				// 'id_project' => 3,
				// 'income' => 'test income',
				// 'fax' => 'test fax',
				// 'website' => 'https://opengiscrm.com/',
				// 'id_state_client' => 3,
				// 'quantity_worker' => 'test quantity',
				// 'id_qualification' => 3,
				// 'id_skype' => '@opengiscrm3',
				// 'id_twitter' => '@opengiscrm3',
				// 'description' => 'test test test test'  
			],
			[
				// 'id_stripe' => 'cus_example4',
				'first_name' => 'jonasthan',
				'last_name' => 'castrol',
				'company' => 'OpenGisCRM4',
				'email' => $email.'test3',
				'img' => 'user.png',
				'id_state' => 4,
				'city' => '7275 St Rt 17m M',
				'id_country' => 4,
				'postal_code' => '11953'
				// 'title' => 'VP Accounting',
				// 'phone' => '0000-1111111',
				// 'cell_phone' => '0000-1111111',
				// 'id_source' => 4,
				// 'id_sector' => 4,
				// 'id_project' => 4,
				// 'income' => 'test income',
				// 'fax' => 'test fax',
				// 'website' => 'https://opengiscrm.com/',
				// 'id_state_client' => 4,
				// 'quantity_worker' => 'test quantity',
				// 'id_qualification' => 4,
				// 'id_skype' => '@opengiscrm3',
				// 'id_twitter' => '@opengiscrm3',
				// 'description' => 'test test test test' 
			],
		];

		foreach ($data as $key => $value) {

			$lead = new Lead();

			// print_r($value['country']);

			// exit;		

			$lead->setFirstName($value['first_name']);

			$lead->setLastName($value['last_name']);

			$lead->setCompany($value['company']);

			$lead->setEmail($value['email']);

			$lead->setImg($value['img']);

			$lead->setIdState($value['id_state']);

			$lead->setCity($value['city']);

			$lead->setIdCountry($value['id_country']);

			$lead->setPostalCode($value['postal_code']);			

			$manager->persist($lead);

			$manager->flush();
		}
	}
}
