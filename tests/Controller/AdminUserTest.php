<?php

namespace AvoRed\Ecommerce\Tests\Controller;

use AvoRed\Ecommerce\Tests\BaseTestCase;

class AdminUserTest extends BaseTestCase
{
    /**
     * Test to check if admin user index route is working
     *
     * @return void
     */
    public function testAdminUserIndexRouteTest()
    {
        $user = $this->_getAdminUser();
        $response = $this->actingAs($user, 'admin')->get(route('admin.admin-user.index'));
        $response->assertStatus(200);
        $response->assertSee('Purvesh');
        $response->assertSee('Patel');
    }

    /**
     * Test to check if admin user create route is working
     *
     * @return void
     */
    public function testAdminUserCreateGetRouteTest()
    {
        $user = $this->_getAdminUser();
        $response = $this->actingAs($user, 'admin')->get(route('admin.admin-user.create'));
        $response->assertStatus(200);
        $response->assertSee('Create Admin User');
    }

    /**
     * Test to check if admin user create route is working
     *
     * @return void
     */
    public function testAdminUserCreatePostRouteTest()
    {
        $user = $this->_getAdminUser();
        $response = $this
                        ->actingAs($user, 'admin')
                        ->post(
                            route('admin.admin-user.store'),
                                        [
                                            'first_name' => 'test',
                                            'last_name' => 'test',
                                            'email' => 'admin@test.com',
                                            'password' => 'admin123',
                                            'password_confirmation' => 'admin123',
                                            'role_id' => $user->role_id
                                        ]
                        );
        $response->assertRedirect(route('admin.admin-user.index'));
    }
}
