<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ManageCompetencyModelTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @group manage-model-competency
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
                ->clickLink('Model Kompetensi')
                ->clickLink('Tambah Model Kompetensi')
                ->type('name', 'Model Software Dev')
                ->type('description', 'Model Software Development adalah representasi kompetensi untuk mengembangkan sebuah aplikasi yang dijalankan secara sistematis sehingga menghasilkan sebuah produk yang baik dan berkualitas')
                ->press('Save')
                ->pause(1000)
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Model Software Dev')
                    ->click('form .btn-group a.btn:nth-child(2)');
                })
                ->pause(1000)
                ->clickLink('Back')
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Model Software Dev')
                    ->click('form .btn-group a.btn:nth-child(3)');
                })
                ->type('name', 'Model Software Development')
                ->press('Save')
                ->pause(1000)
                ->whenAvailable('table', function ($table) {
                    $table->assertSee('Model Software Development')
                    ->click('form .btn-group .btn:nth-child(4)');
                })
                ->acceptDialog()
                ->pause(2000)
                ;
        });
    }
}
