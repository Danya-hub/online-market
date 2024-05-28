<?php

namespace App\Http\Controllers\Auth;

use Database\Factories\UserFactory;
use Domain\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class ResetPasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    private string $token;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = UserFactory::new()->create();
        $this->token = Password::createToken($this->user);
    }

    /**
     * @test
     * @return void
     */
    public function it_page_success(): void
    {
        $this->get(action(
            [ResetPasswordController::class, 'page'],
            ['token' => $this->token]
        ))
            ->assertOk()
            ->assertSee("Изменить пароль")
            ->assertViewIs("auth.reset-password");
    }

    /**
     * @test
     * @return void
     */
    public function it_handle_success(): void
    {
        $request = [
            'email' => $this->user->email,
            'password' => '123455678',
            'password_confirmation' => '123455678',
            'token' => $this->token,
        ];

        Password::shouldReceive('reset')
            ->once()
            ->withSomeOfArgs($request)
            ->andReturn(Password::PASSWORD_RESET);

        $response = $this->post(
            action([ResetPasswordController::class, 'handle']),
            $request,
        );

        $response->assertRedirect(action([SignInController::class, 'page']));
    }
}
