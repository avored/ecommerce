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
    public function testAdminUserCreateRouteTest()
    {
        $user = $this->_getAdminUser();
        $response = $this->actingAs($user, 'admin')->get(route('admin.admin-user.create'));
        $response->assertStatus(200);
        $response->assertSee('Create Admin User');
    }
}
