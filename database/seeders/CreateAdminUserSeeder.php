<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user1 = User::create([
        //     'name' => 'Admin', 
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);
        
        // $role = Role::create(['name' => 'Admin']);
        // $user1->assignRole([$role->id]);

        $user2 = User::create([
            'name' => 'Manager', 
            'email' => 'manager@gmail.com',
            'password' => bcrypt('123456')
        ]);
        
        $role = Role::create(['name' => 'Manager']);
        $user2->assignRole([$role->id]);
    }
}