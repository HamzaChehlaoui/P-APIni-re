<?php

namespace Tests\Unit;

use App\Enums\RoleEnum;
use App\Http\Controllers\AuthController;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Services\JWTService;
use Illuminate\Support\Facades\Hash;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    protected MockInterface $jwtService;



    public function test_logout_returns_success_message()
    {
        // Create an instance of the AuthController
        $authController = $this->app->make(AuthController::class);

        // Call the logout method
        $response = $authController->logout();

        // Assert the response
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(['message' => 'Logged out successfully'], $response->getData(true));
    }
}
