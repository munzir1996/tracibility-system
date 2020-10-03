<?php

namespace Tests\Feature;

use App\Organization;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Config;
class UserTest extends TestCase
{
    use RefreshDatabase;

    protected function createPermission(){

        $permission = factory(Permission::class)->create();

        return $permission;

    }

    /** @test */
    public function can_create_a_user()
    {
        $this->withoutExceptionHandling();
        $this->loginUser();

        $permission = $this->createPermission();
        $organization = factory(Organization::class)->states('harvest')->create();


        $response = $this->post('/users', [
            'name' => 'Admin',
            'national_id' => '11111',
            'phone' => '0114949901',
            'password' => 'password',
            'password_confirmation' => 'password',
            'permission' => $permission,
            'organization_id' => $organization->id,
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Admin',
            'national_id' => '11111',
            'phone' => '0114949901',
            'organization_id' => $organization->id,
        ]);

    }

    /** @test */
    public function can_edit_a_user(){

        $organization = factory(Organization::class)->states('agent')->create();
        $user = factory(User::class)->create([
            'organization_id' => $organization->id,
        ]);

        $this->withoutExceptionHandling();
        $this->loginUser();
        $permission = $this->createPermission();

        $this->put('users/'. $user->id, [
            'name' => 'harvestor',
            'national_id' => '159753',
            'phone' => '0920733818',
            'permission' => $permission,
            'password' => 'password',
            'password_confirmation' => 'password',
            'organization_id' => $organization->id,
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'harvestor',
            'national_id' => '159753',
            'phone' => '0920733818',
            'organization_id' => $organization->id,
        ]);

    }

    /** @test */
    public function can_delete_a_user(){

        $user = factory(User::class)->create();

        $this->delete('users/'. $user->id);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);

    }

}




