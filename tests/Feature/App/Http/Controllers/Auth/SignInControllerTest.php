<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\SignInFormRequest;
use Database\Factories\UserFactory;
use Domain\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SignInControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @return void
     */
    public function it_page_success(): void
    {
        $this->get(action([SignInController::class, 'page']))
            ->assertOk()
            ->assertSee("Вход в аккаунт")
            ->assertViewIs("auth.login");
    }

    /**
     * @test
     * @return void
     */
    public function it_handle_success(): void
    {
        $password = '12345678';

        $user = UserFactory::new()->create([
            'email' => 'test@gmail.com',
            'password' => Hash::make($password),
        ]);

        $request = SignInFormRequest::factory()
            ->create([
                'email' => $user->email,
                'password' => $password
            ]);

        $response = $this->post(action([SignInController::class, 'handle']), $request);

        $response->assertValid()
            ->assertRedirect(route('home.page'));

        $this->assertAuthenticatedAs($user);
    }

    /**
     * @test
     * @return void
     */
    public function it_handle_failed(): void
    {
        $request = SignInFormRequest::factory()->create([
            'email' => 'notfound@gmail.com',
            'password' => str()->random(10),
        ]);

        $this->post(action([SignInController::class, 'handle']), $request)
            ->assertInvalid(['email']);

        $this->assertGuest();
    }

    /**
     * @test
     * @return void
     */
    public function it_logged_out(): void
    {
        $user = UserFactory::new()->create([
            'email' => 'test@gmail.com',
        ]);

        $this->actingAs($user)
            ->delete(action([SignInController::class, 'logout']));

        $this->assertGuest();
    }

    /**
     * @test
     * @return void
     */
    public function it_logged_out_middleware_fail(): void
    {
        $this->delete(action([SignInController::class, 'logout']))
            ->assertRedirect(route('home.page'));
    }
}
