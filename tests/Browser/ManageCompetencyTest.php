<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ManageCompetencyTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @group manage-competency
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
                ->visit('/competencies')
                ->clickLink('Tambah Kompetensi')
                ->type('code', 'SC004')
                ->type('name', 'Willingness to lear')
                ->type('code', 'SC001')
                ->type('description', 'Willingness to learn adalah kemauan dan kemampuan untuk selalu ingin belajar yang diawali dengan adanya kesadaran untuk mengembangkan diri')
                ->type('question', 'Hal yang Saudara lakukan dalam rangka terus belajar dan meningkatkan daya saing?')
                ->press('Save')
                ->pause(1000)
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Willingness to lear')
                    ->click('form .btn-group a.btn:nth-child(2)');
                })
                ->pause(1000)
                ->clickLink('Back')
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Willingness to lear')
                    ->click('form .btn-group a.btn:nth-child(3)');
                })
                ->type('name', 'Willingness to learn')
                ->press('Save')
                ->pause(1000)
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Willingness to learn')
                    ->click('form .btn-group .btn:nth-child(4)');
                })
                ->acceptDialog()
                ->pause(2000)
                ;
        });
    }
}
