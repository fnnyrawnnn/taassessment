<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ManageCompetencyGroupTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @group manage-competency-group
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
                ->clickLink('Grup Kompetensi')
                ->clickLink('Tambah Grup Kompetensi')
                ->type('name', 'Komunik')
                ->type('description', 'Grup Kompetensi Komunikasi Untuk Grouping Kompetensi Komunikasi di Perusahaan')
                ->press('Save')
                ->pause(1000)
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Komunik')
                    ->click('form .btn-group a.btn:nth-child(1)');
                })
                ->pause(1000)
                ->clickLink('Back')
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Komunik')
                    ->click('form .btn-group a.btn:nth-child(2)');
                })
                ->type('name', 'Komunikasi')
                ->press('Save')
                ->pause(1000)
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Komunikasi')
                    ->click('form .btn-group .btn:nth-child(3)');
                })
                ->acceptDialog()
                ->pause(2000)
                ;
        });
    }
}
