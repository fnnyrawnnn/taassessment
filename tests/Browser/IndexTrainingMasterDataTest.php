<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class IndexTrainingMasterDataTest extends DuskTestCase
{
    /**
     * Melihat Daftar Master Data Pelatihan
     * @test
     * @return void
     */
    public function IndexTrainingMasterData()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // mengakses homepage
                ->clickLink('Login') // menekan tombol Login
                ->click('#email') // menekan element dengan id = email
                ->type('email', 'admintnd@mail.com') // mengisikan email
                ->type('password', '123456') // mengisikan password
                ->press('Login') // menekan tombol Login
                ->assertSee('Halo, Admin Training and Development') // mengecek apakah ada tulisan seperti ini
                ->clickLink('Training Recommendation') // menekan sub menu Training Recommendation
                ->assertSee('Training Recommendation') // mengecek apakah terdapat tulisan ini
                ->clickLink('Buat Master Pelatihan') // menekan tombol Buat Msater Pelatihan
                ->assertSee('Master Data Pelatihan') // mengekcek apakah ada tulisan ini
                ->script('console.log("Done Test : Index Master Data")') // console log
            ;
        });
    }
}
