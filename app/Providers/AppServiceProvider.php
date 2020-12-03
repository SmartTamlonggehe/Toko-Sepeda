<?php

namespace App\Providers;

use App\Kategori;
use App\Keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
});

$kategori= Kategori::orderBy('nm_kategori')->get();
view()->share('menuKategori', $kategori);

//compose all the views....
view()->composer('*', function ($view)
{
if (Auth::check()){
$keranjang = Keranjang::orderByDesc('id')->where('status','antri')->where('id_user',Auth::user()->id)->get();
//...with this variable
$view->with('menuKeranjang', $keranjang);
}
});

}
}