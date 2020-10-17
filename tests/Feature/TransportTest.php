<?php

namespace Tests\Feature;

use App\Transport;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TransportTest extends TestCase
{
    use RefreshDatabase;

    protected function createPermission(){

        $permission = factory(Permission::class)->create([
            'name' => 'transporting',
        ]);

        return $permission;

    }

    /** @test */
    public function can_create_transport()
    {
        $user = factory(User::class)->states('agent')->create();

        $this->withoutExceptionHandling();
        $this->loginUser($user);
        $permission = $this->createPermission();

        $response = $this->post('/transports', [
            'name' => 'transport',
            'national_id' => '159753',
            'phone' => '0920733818',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'transport',
            'national_id' => '159753',
            'phone' => '0920733818',
            'organization_id' => $user->organization->id,
        ]);

    }

    /** @test */
    public function can_edit_transport()
    {
        $user = factory(User::class)->states('agent')->create();

        $this->withoutExceptionHandling();
        $this->loginUser($user);

        $permission = $this->createPermission();
        $transport = factory(Transport::class)->create();

        $response = $this->put('transports/'. $user->id, [
            'name' => 'transport-update',
            'national_id' => '12345',
            'phone' => '0114949901',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'transport-update',
            'national_id' => '12345',
            'phone' => '0114949901',
            'organization_id' => $user->organization->id,
        ]);
    }

    /** @test */
    public function can_delete_a_transport()
    {
        $user = factory(User::class)->states('agent')->create();

        $this->withoutExceptionHandling();
        $this->loginUser($user);

        $transport = factory(Transport::class)->create();

        $this->delete('transports/'. $transport->id);

        $this->assertDatabaseMissing('transports', [
            'id' => $transport->id,
        ]);

    }

}


