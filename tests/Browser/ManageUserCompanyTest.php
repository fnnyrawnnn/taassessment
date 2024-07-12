<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ManageUserCompanyTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @group manage-user-company
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
                ->clickLink('Data Pegawai')
                ->clickLink('Tambahkan Data Pegawai')
                ->click('#company_id')
                ->assertScript('document.getElementById("company_id").options[document.getElementById("company_id").selectedIndex].text', 'PT Nusantara Trade Solution')
                ->type('employee_id', '100001')
                ->type('email', 'nusa.pegawai1@gmail.com')
                ->type('name', 'Pegawai 1')
                ->type('username', 'pgw1')
                ->select('#gender', 'Wanita')
                ->type('password', 'pgw.nusa1')
                ->press('Tambahkan')
                ->pause(1000)
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Pegawai 1')
                    ->click('tr:nth-child(2) .btn-primary');
                })
                ->pause(1000)
                ->click('.fas.fa-chevron-left.fa-lg')
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Pegawai 1')
                    ->click('tr:nth-child(2) .btn-warning');
                })
                ->type('name', 'Pegawai 1 New')
                ->press('Update')
                ->pause(1000)
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Pegawai 1 New')
                    ->click('tr:nth-child(2) .btn-danger');
                })
                ->acceptDialog()
                ->pause(2000)
                ;
        });
    }
}
