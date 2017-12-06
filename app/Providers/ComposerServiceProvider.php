<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Route;
use Config;
use App\Seorecord;
use App\Property;
use Log;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        view()->composer(
            'profile', 'App\Http\ViewComposers\ProfileComposer'
        );

        // Using Closure based composers...
        view()->composer('*', function ($view) {
            $currentRoute = Route::current();
            if ($currentRoute) {
                if (Config::get('noccms.seoMultiLocales')) {
                    $route  = substr($currentRoute->uri(), 2);
                    $locale = substr($currentRoute->uri(), 0, 2);
                } else {
                    $route  = '/'.$currentRoute->uri();
                    $locale = Config::get('noccms.seoDefaultLocale');
                }

                $seoRecord = Seorecord::where('route',$route)->where('locale',$locale)->first();

                $defaultSeoTitle = Property::where('key','seotitle')->where('locale',$locale)->first()->value;
                $defaultSeoDesc = Property::where('key','seodesc')->where('locale',$locale)->first()->value;
                $defaultSeoKey = Property::where('key','seokeywords')->where('locale',$locale)->first()->value;

                if (!empty($seoRecord->title)) {
                    $seoTitle = $seoRecord->title;
                } elseif (!empty($defaultSeoTitle)) {
                    $seoTitle = $defaultSeoTitle;
                } else {
                    $seoTitle = '';
                }

                if (!empty($seoRecord->description)) {
                    $seoDescription = $seoRecord->description;
                } elseif (!empty($defaultSeoDesc)) {
                    $seoDescription = $defaultSeoDesc;
                } else {
                    $seoDescription = '';
                }

                if (!empty($seoRecord->keywords)) {
                    $seoKeywords = $seoRecord->keywords;
                } elseif (!empty($defaultSeoKey)) {
                    $seoKeywords = $defaultSeoKey;
                } else {
                    $seoKeywords = '';
                }                

                $headerEmail = Property::where('key','header.email')->first();
                $headerPhone = Property::where('key','header.phone')->first();

                $view->with('seoTitle',$seoTitle)->with('seoDescription',$seoDescription)->with('seoKeywords',$seoKeywords)->with('headerEmail',$headerEmail)->with('headerPhone',$headerPhone);
            }  else {
                $locale = Config::get('noccms.seoDefaultLocale');
                $defaultSeoTitle = Property::where('key','seotitle')->where('locale',$locale)->first()->value;
                $defaultSeoDesc = Property::where('key','seodesc')->where('locale',$locale)->first()->value;
                $defaultSeoKey = Property::where('key','seokeywords')->where('locale',$locale)->first()->value;

                if (!empty($defaultSeoTitle)) {
                    $seoTitle = $defaultSeoTitle;
                } else {
                    $seoTitle = '';
                }
                if (!empty($defaultSeoDesc)) {
                    $seoDescription = $defaultSeoDesc;
                } else {
                    $seoDescription = '';
                }
                if (!empty($defaultSeoKey)) {
                    $seoKeywords = $defaultSeoKey;
                } else {
                    $seoKeywords = '';
                }             
                $view->with('seoTitle',$seoTitle)->with('seoDescription',$seoDescription)->with('seoKeywords',$seoKeywords);
            }
            
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}