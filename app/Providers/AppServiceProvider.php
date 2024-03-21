<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
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
        //
        Schema::defaultStringLength(191);
        
        View::composer(['web.layouts.web-layouts', 'view2'], function ($view) {
            
            $send['provider_menusWithSubMenus'] = DB::table('menus')
            ->select('menus.*')
            ->leftJoin('sub_menus', 'menus.id', '=', 'sub_menus.menu_id')
            ->leftJoin('child_menus', 'sub_menus.id', '=', 'child_menus.submenu_id')
            ->where('menus.menu_status', 1)
            ->where('sub_menus.submenu_status', 1)
            ->where('child_menus.child_menu_status', 1)
            ->get();
    
            $send['important_links'] = DB::table('important_links')->select('link_name', 'link')->get();
    
            // $send['sliders'] = DB::table('sliders')->where('slider_status', 1)->get();
    
            $send['webs'] = DB::table('general_settings')->first();
    
            // $send['webmessages'] = DB::table('messages')->where('message_status', 1)->get();
    
            $send['provider_ntcs'] = DB::table('events')
                ->join('event_types', 'events.event_type_id', '=', 'event_types.id')
                ->select('events.event_title','events.event_type_id', 'events.url', 'events.start_date', 'event_types.type_name', 'events.created_at', 'events.upload')
                ->where(['events.event_status' => 1])
                // ->where('events.end_date', '>=', now())
                ->orderByDesc('events.end_date')
                ->get();


            $view->with($send);
        });
    }
}
