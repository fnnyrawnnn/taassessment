<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ManageCompanyTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @group manage-company
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Login')
                ->click('#email')
                ->type('email', 'superadmin@mail.com')
                ->type('password', 'test123456')
                ->pause(500)
                ->press('Login')
                ->assertSee('Web Assessment')
                ->clickLink('Data Perusahaan')
                ->clickLink('Tambahkan Data Perusahaan')
                ->type('name', 'PT Jaya Mandiri')
                ->type('address', 'Jl Telekomunikasi No 1 Bojongsoang')
                ->type('telp', '081234567812')
                ->type('fax', '987123')
                ->type('email', 'jaya.mandiri@gmail.com')
                ->type('description', 'Jaya Mandiri Adalah Perusahaan yang Bergerak dibidang solusi IT')
                ->type('contact_person', '081234567812')
                ->press('Simpan')
                ->pause(1000)
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('PT Jaya Mandiri')
                    ->click('tr:nth-child(2) .btn-primary');
                })
                ->pause(1000)
                ->click('.fas.fa-chevron-left.fa-lg')
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('PT Jaya Mandiri')
                    ->click('tr:nth-child(2) .btn-warning');
                })
                ->type('name', 'PT Jaya Mandiri New')
                ->press('Update')
                ->pause(1000)
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('PT Jaya Mandiri')
                    ->click('tr:nth-child(2) .btn-danger');
                })
                ->acceptDialog()
                ->pause(2000)
                ;
        });
    }
}
