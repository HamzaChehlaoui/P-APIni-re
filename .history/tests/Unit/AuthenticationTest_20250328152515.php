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

    // public function setUp(): void
    // {
    //     parent::setUp();
    //     $this->jwtService = $this->mock(JWTService::class);
    // }

    // public function tearDown(): void
    // {
    //     Mockery::close();
    //     parent::tearDown();
    // }

    // public function test_signup_creates_user_and_returns_token_with_valid_data()
    // {
    //     // Prepare test data
    //     $testData = [
    //         'name' => 'John Doe',
    //         'email' => 'john1@example.com',
    //         'password' => 'password123',
    //         'role_id' => RoleEnum::CLIENT,
    //     ];

    //     // Mock the RegisterUserRequest
    //     $request = $this->mock(RegisterUserRequest::class, function (MockInterface $mock) use ($testData) {
    //         $mock->shouldReceive('validated')
    //             ->once()
    //             ->andReturn($testData);
    //         $mock->name = $testData['name'];
    //         $mock->email = $testData['email'];
    //         $mock->password = $testData['password'];
    //         $mock->role_id = $testData['role_id'];
    //     });

    //     // Mock JWTService
    //     $this->jwtService
    //         ->shouldReceive('generateToken')
    //         ->once()
    //         ->andReturn('mock-token');

    //     // Create an instance of the AuthController
    //     $authController = $this->app->make(AuthController::class);

    //     // Call the signup method
    //     $response = $authController->signup($request);

    //     // Assert the response
    //     $this->assertEquals(201, $response->getStatusCode());
    //     $this->assertEquals(['token' => 'mock-token'], $response->getData(true));

    //     // Verify user was created in the database
    //     $this->assertDatabaseHas('users', [
    //         'name' => $testData['name'],
    //         'email' => $testData['email'],
    //         'role_id' => $testData['role_id']
    //     ]);
    // }

    // public function test_signup_returns_error_for_invalid_role()
    // {
    //     // Prepare test data with admin role
    //     $testData = [
    //         'name' => 'John Doe',
    //         'email' => 'john1@example.com',
    //         'password' => 'password123',
    //         'role_id' => RoleEnum::ADMIN,
    //     ];

    //     // Mock the RegisterUserRequest
    //     $request = $this->mock(RegisterUserRequest::class, function (MockInterface $mock) use ($testData) {
    //         $mock->shouldReceive('validated')
    //             ->once()
    //             ->andReturn($testData);
    //         $mock->role_id = $testData['role_id'];
    //     });

    //     // Create an instance of the AuthController
    //     $authController = $this->app->make(AuthController::class);

    //     // Call the signup method
    //     $response = $authController->signup($request);

    //     // Assert the response
    //     $this->assertEquals(500, $response->getStatusCode());
    //     $this->assertEquals([
    //         'status' => false,
    //         'message' => 'Invalid role selected.',
    //     ], $response->getData(true));
    // }

    // public function test_login_returns_token_with_valid_credentials()
    // {
    //     // Create a test user
    //     $user = User::factory()->create([
    //         'email' => 'john1@example.com',
    //         'password' => Hash::make('password123'),
    //         'role_id' => RoleEnum::CLIENT,
    //     ]);

    //     // Prepare login data
    //     $loginData = [
    //         'email' => 'john1@example.com',
    //         'password' => 'password123'
    //     ];

    //     // Mock the LoginUserRequest
    //     $request = $this->mock(LoginUserRequest::class, function (MockInterface $mock) use ($loginData) {
    //         $mock->shouldReceive('validated')
    //             ->once()
    //             ->andReturn($loginData);
    //         $mock->email = $loginData['email'];
    //         $mock->password = $loginData['password'];
    //     });

    //     // Mock JWTService
    //     $this->jwtService
    //         ->shouldReceive('generateToken')
    //         ->once()
    //         ->andReturn('mock-token');

    //     // Create an instance of the AuthController
    //     $authController = $this->app->make(AuthController::class);

    //     // Call the login method
    //     $response = $authController->login($request);

    //     // Assert the response
    //     $this->assertEquals(200, $response->getStatusCode());
    //     $this->assertEquals(['token' => 'mock-token'], $response->getData(true));
    // }

    // public function test_login_returns_error_with_invalid_credentials()
    // {
    //     // Create a test user
    //     User::factory()->create([
    //         'email' => 'john1@example.com',
    //         'password' => Hash::make('correct-password'),
    //     ]);

    //     // Prepare login data
    //     $loginData = [
    //         'email' => 'john1@example.com',
    //         'password' => 'wrong-password'
    //     ];

    //     // Mock the LoginUserRequest
    //     $request = $this->mock(LoginUserRequest::class, function (MockInterface $mock) use ($loginData) {
    //         $mock->shouldReceive('validated')
    //             ->once()
    //             ->andReturn($loginData);
    //         $mock->email = $loginData['email'];
    //         $mock->password = $loginData['password'];
    //     });

    //     // Create an instance of the AuthController
    //     $authController = $this->app->make(AuthController::class);

    //     // Call the login method
    //     $response = $authController->login($request);

    //     // Assert the response
    //     $this->assertEquals(401, $response->getStatusCode());
    //     $this->assertEquals(['message' => 'Invalid credentials'], $response->getData(true));
    // }

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
