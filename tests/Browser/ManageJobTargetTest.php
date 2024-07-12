<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ManageJobTargetTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @group manage-job-target
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
                ->clickLink('Job Target')
                ->clickLink('Buat Job Target')
                ->type('job_name', 'Business Analyst')
                ->type('job_code', 'BANL')
                ->type('number_position', '1')
                ->press('Save')
                ->pause(1000)
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Business Analyst')
                    ->click('form .btn-group a.btn-xs:nth-child(3)');
                })
                ->pause(1000)
                ->click('.fas.fa-chevron-left.fa-lg')
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Business Analyst')
                    ->click('form .btn-group a.btn-xs:nth-child(4)');
                })
                ->type('job_name', 'System Analyst')
                ->type('job_code', 'SANL')
                ->press('Save')
                ->pause(1000)
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('System Analyst')
                    ->click('form .btn-group .btn-xs:nth-child(5)');
                })
                ->acceptDialog()
                ->pause(2000)
                ;
        });
    }
}
