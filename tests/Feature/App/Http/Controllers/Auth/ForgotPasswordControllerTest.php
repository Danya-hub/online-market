<?php

namespace App\Http\Controllers\Auth;

use Database\Factories\UserFactory;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ForgotPasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    private function testingCredentials(): array
    {
        return [
            "email" => "test@gmail.com",
        ];
    }

    /**
     * @test
     * @return void
     */
    public function it_forgot_password_page_success(): void
    {
        $this->get(action([ForgotPasswordController::class, 'page']))
            ->assertOk()
            ->assertSee("Сброс пароля")
            ->assertViewIs("auth.forgot-password");
    }

    /**
     * @test
     * @return void
     */
    public function it_handle_success(): void
    {
        $user = UserFactory::new()->create($this->testingCredentials());

        $this->post(action([ForgotPasswordController::class, 'handle']), $this->testingCredentials())
            ->assertRedirect();

        Notification::assertSentTo($user, ResetPasswordNotification::class);
    }

    /**
     * @test
     * @return void
     */
    public function it_handle_fail(): void
    {
        $this->assertDatabaseMissing('users', $this->testingCredentials());

        $this->post(action([ForgotPasswordController::class, 'handle']), $this->testingCredentials())
            ->assertInvalid();

        Notification::assertNothingSent();
    }
}
