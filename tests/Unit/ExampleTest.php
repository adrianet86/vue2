<?php

namespace Tests\Unit;

use App\Events\EmailConfirmed;
use App\Models\Application;
use App\Notifications\ConfirmEmail;
use Illuminate\Support\Facades\App;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function email_works()
    {
        $application = new Application();

        $application2 = Application::find('59f8f4baf9bae90010614184');

        $application->borrower['email'] = 'adria.matoses@gmail.com';
        $application->uuid = Uuid::uuid4()->toString();
        $application->save();

        $application->notify(new ConfirmEmail($application));

    }

    /**
     * @test
     */
    public function update_works()
    {
        $application = Application::where('uuid', '=', 'b2da4c13-4821-4603-a77a-dfbf293f35f9')->get();

        $application->email_confirmed = true;

        $application->save();


    }
}
