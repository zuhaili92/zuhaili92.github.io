<?php

use Illuminate\Database\Seeder;
use App\Department, App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = array(
    		array('department_name' => 'JABATAN TEKNOLOGI MAKLUMAT'),
    		array('department_name' => 'JABATAN KEJURUTERAAN ELEKTRONIK'),
    		array('department_name' => 'JABATAN KEJURUTERAAN MEKANIKAL')
    		);

    	foreach ($departments as $department) {
    		Department::create($department);
    	}

    	User::create([
    		'name' => 'Administrator',
    		'tel_no' => '013252299',
    		'id_card' => '01HEP10H1555',
    		'department' => '1',
    		'roles' => 'admin',
			'email' => 'admin@hostelcomplaint.com',
			'password' => bcrypt('admin')
    		]);

    }
}
