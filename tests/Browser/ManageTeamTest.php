<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ManageTeamTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @group manage-team
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
            ->visit('/teams')
            ->clickLink('Buat Team')
            ->type('name', 'Team 1')
            ->select('assessment_session_id', '160')
            ->press('Save')
            ->pause(1000)
            ->whenAvailable('table', function ($table) {
                $table->assertSee('Team 1')
                ->click('form .btn-group a.btn:nth-child(2)');
            })
            ->pause(1000)
            ->click('.fas.fa-chevron-left.fa-lg')
            ->whenAvailable('table', function ($table) {
                $table->assertSee('Team 1')
                ->click('form .btn-group a.btn:nth-child(3)');
            })
            ->type('name', 'Team 1.1')
            ->press('Save')
            ->pause(1000)
            ->whenAvailable('table', function ($table) {
                $table->assertSee('Team 1.1')
                ->click('form .btn-group .btn:nth-child(4)');
            })
            ->acceptDialog()
            ->pause(2000)
            ;
        });
    }
}
