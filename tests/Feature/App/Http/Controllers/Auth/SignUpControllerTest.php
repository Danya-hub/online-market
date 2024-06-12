<?php

namespace App\Http\Controllers\Auth;

use App\Listeners\SendEmailNewUserListener;
use App\Notifications\NewUserNotification;
use Domain\Auth\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Testing\TestResponse;
use Tests\RequestFactories\SignUpFormRequestFactory;
use Tests\TestCase;

class SignUpControllerTest extends TestCase
{
    use RefreshDatabase;

    protected array $request;

    /**
     * @test
     * @return void
     */
    public function it_signup_page_success(): void
    {
        $this->get(action([SignUpController::class, 'page']))
            ->assertOk()
            ->assertSee("Регистрация")
            ->assertViewIs("auth.signup");
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->request = SignUpFormRequestFactory::new()->create([
            'email' => 'test@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ]);
    }

    protected function request(): TestResponse
    {
        return $this->post(
            action([SignUpController::class, 'handle']),
            $this->request,
        );
    }

    protected function findUser(): Model|User|Builder|null
    {
        return User::query()
            ->where("email", $this->request['email'])
            ->first();
    }

    /**
     * @test
     * @return void
     */
    public function it_validation_success(): void
    {
        $this->request()
            ->assertValid();
    }

    /**
     * @test
     * @return void
     */
    public function it_user_created_success(): void {
        $this->assertDatabaseMissing('users', [
            'email' => $this->request['email'],
        ]);

        $this->request();

        $this->assertDatabaseHas('users', [
            'email' => $this->request['email'],
        ]);
    }

    /**
     * @test
     * @return void
     */
    public function it_password_and_confirmation_password_not_same(): void {
        $this->request['password'] = '123';
        $this->request['password_confirmation'] = '1234';

        $this->request()
            ->assertInvalid(['password']);
    }

    /**
     * @test
     * @return void
     */
    public function it_registered_event_and_listeners_dispatched(): void
    {
        Event::fake();

        $this->request();

        Event::assertDispatched(Registered::class);
        Event::assertListening(Registered::class, SendEmailNewUserListener::class);
    }

    /**
     * @test
     * @return void
     */
    public function it_notification_sent() {
        $this->request();

        Notification::assertSentTo(
            $this->findUser(),
            NewUserNotification::class,
        );
    }

    /**
     * @test
     * @return void
     */
    public function it_authenticated_user_and_redirected(): void {
        $this->request()
            ->assertRedirect(route('home.page'));

        $this->assertAuthenticatedAs(
            $this->findUser(),
        );
    }
}
