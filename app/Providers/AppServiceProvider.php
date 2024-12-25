<?php

namespace App\Providers;

use App\Models\FooterContactInfo;
use App\Models\FooterHelpLink;
use App\Models\FooterInfo;
use App\Models\FooterSocialLink;
use App\Models\FooterUsefulLink;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('general_settings')) {
//            $generalSetting = cache()->rememberForever('generalSetting', function () {
//                return GeneralSetting::latest()->first();
//            });
            $generalSetting = GeneralSetting::latest()->first();
        }else{
            $generalSetting = null;
        }
            View::share('generalSetting', $generalSetting);
//        View::share([
//            'generalSetting' => $generalSetting,
//            'footerUseFulLinks' => $footerUseFulLinks,
//            'footerContactInfo' => $footerContactInfo,
//            'footerInfo' => $footerInfo,
//            'footerHelpLinks' => $footerHelpLinks,
//            'socialLinks' => $socialLinks
//        ]);
    }
}
