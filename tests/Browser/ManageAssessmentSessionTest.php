<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ManageAssessmentSessionTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @group manage-assessment-session
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Login')
                ->click('#email')
                ->type('email', 'nusa.admin1@gmail.com')
                ->type('password', 'admin123')
                ->pause(500)
                ->press('Login')
                ->assertSee('Web Assessment')
                ->clickLink('Sesi Assessment')
                ->clickLink('Add Session')
                ->type('name', 'Assessment Project Lintas')
                ->select('#category', 'development')
                ->select('#status', 'open')
                ->select('#expired', 'three_month')
                ->type('start_date', '2024-07-12')
                ->type('end_date', '2024-10-12')
                ->click('#submitButton')
                ->pause(2000)
                ;
        });
    }
}
