<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;
use function GuzzleHttp\Promise\all;
use function GuzzleHttp\uri_template;


class UsersTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create($this->data());
    }

    /** @test */
    public function welcome_page_accessible_to_all()
    {
        $guest = $this->get('/');
        $player = $this->actingAs($this->user)->get('/');

        $guest->assertStatus(200);
        $player->assertStatus(200);
    }

    /** @test */
    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $response = $this->actingAs($this->user)->get('/login');
        $response->assertRedirect('/lobby');
    }


    /** @test */
    public function lobby_page_denied_to_guest()
    {
        $response = $this->get('/lobby');
        $response->assertStatus(302);
    }

    /** @test */
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /** @test
        User cannot see themselves in the list.
     */
    public function authenticated_user_can_list_other_players()
    {
        factory(User::class, 9)->create();

        $exclude_current_user_list = User::all()->except($this->user->id);
        $exclude_current_user_count = $exclude_current_user_list->count();

        $this->assertDatabaseHas('users', $this->datacheck());
        $this->assertCount(10, User::all());
        $this->assertCount(9, $exclude_current_user_list);
    }


    /** @test */
    public function unauthenticated_user_redirected_to_login()
    {
        $response = $this->get('/lobby');
        $response->assertRedirect('/login');

        $this->actingAs($this->user);
        $response = $this->get('/lobby');
        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_be_retrieved()
    {
        $response = $this->get('/api/users/' . $this->user->id . '?api_token=' .
                    $this->user->api_token);

        $response->assertJsonFragment([
            'player' =>[
                'id'           => $this->user->id,
                'name'         => $this->user->name,
                'display_name' => $this->user->display_name,
                'email'        => $this->user->email,
                'role'         => $this->user->role,
                'wins'         => $this->user->wins,
                'updated_at'   => $this->user->updated_at->diffForHumans()
            ]
        ]);
    }


    // a method that only returns an array
    private function data()
    {
        return [
            'name'         => 'Test Name',
            'display_name' => 'Player One',
            'email'        => 'test@email.me',
            'role'         => 1,
            'wins'         => 0,
            'api_token'    => Str::random(32),
        ];
    }
    private function datacheck()
    {
        return [
            'name'         => 'Test Name',
            'display_name' => 'Player One',
            'email'        => 'test@email.me',
            'role'         => 1,
            'wins'         => 0,
        ];
    }

    private function payload() {
        return [
            'name'         => 'NEW NAME',
            'display_name' => 'Player Two',
            'email'        => 'test@email.NEW',
            'role'         => 2,
            'wins'         => 0,
            'api_token'    => Str::random(32),
            'password'     => Hash::make('pw')
        ];
    }

    private function payload_check() {
        return [
            'name'         => 'NEW NAME',
            'display_name' => 'Player Two',
            'email'        => 'test@email.NEW',
            'role'         => 2,
            'wins'         => 0,
        ];
    }


}
