<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ManageReportAssessmentTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @group manage-report-assessment
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
                ->clickLink('Report Assessment')
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Assessment 2024 Q1')
                    ->click('tr:nth-child(1) .btn-warning');
                })
                ->pause(500)
                ->click('tr:nth-child(1) .btn-warning')
                ->pause(2000)
                ;
        });
    }
}
