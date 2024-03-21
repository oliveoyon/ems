<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use App\Models\Admin\Events;
use App\Models\Admin\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class WebController extends Controller
{
    
    
    public function index()
    {
        $send['histories'] = DB::table('histories')->first();
        $send['messages'] = DB::table('messages')->orderByDesc('created_at')->first();
        $send['uploads'] = DB::table('uploads')->where(['status' => 1])
        ->orderByDesc('created_at')
        ->limit(6) // Replace '5' with your desired limit
        ->get();
        $send['sliders'] = DB::table('sliders')->where(['slider_status' => 1])
        ->limit(3) // Replace '5' with your desired limit
        ->get();

        $events = Event::where('event_status', 1)
        // ->whereDate('start_date', '>=', now())
        ->select('event_title', 'start_date', 'end_date', 'url', 'color')
        ->get()
        ->map(function ($event) {
            return [
                'title' => $event->event_title,
                'start' => Carbon::parse($event->start_date)->toDateTimeString(),
                'end' => Carbon::parse($event->end_date)->toDateTimeString(),
                'url' => 'notice/'.$event->url,
                'color' => $event->color,
            ];
        });

        $send['eventsJson'] = $events->toJson();



        return view('web.webhome' , $send);

    }

    public function notice($slug=null)
    {
        $send['events'] = DB::table('events')
        ->select('events.*',  'event_types.type_name')
        ->join('event_types', 'events.event_type_id', '=', 'event_types.id')
        ->where(['events.event_status' => 1, 'events.url' => $slug])
        ->first();


        return view('web.notice_detail', $send);
    }

    public function menudesc($slug=null)
    {
        $send['menudesc'] = DB::table('sub_menus')
            ->select('submenu_name', 'submenu_slug', 'submenu_desc', 'upload')
            ->where(['submenu_status' => 1, 'submenu_slug' => $slug])
            ->first();
        return view('web.menudesc', $send);
    }

    public function submenudesc($submenu_slug=null)
    {
        $send['childmenudesc'] = DB::table('child_menus')
            ->select('childmenu_name', 'child_menu_slug', 'child_menu_desc', 'upload')
            ->where(['child_menu_status' => 1, 'child_menu_slug' => $submenu_slug])
            ->first();
        return view('web.childmenudesc', $send);
    }

    public function allnotice($slug = Null)
    {
        $eventType = DB::table('event_types')
        ->where('type_name', $slug)
        ->first();

        $send['notices'] = DB::table('events')
        ->join('event_types', 'events.event_type_id', '=', 'event_types.id')
        ->where(['events.event_type_id' => $eventType->id, 'events.event_status' => 1])
        ->orderByDesc('events.start_date')
        // ->limit(6) // Replace '5' with your desired limit
        ->get(['event_types.type_name', 'events.*']);


        return view('web.allnotice' , $send);
    }

    public function history_details()
    {
        $send['histories'] = DB::table('histories')->first();
        return view('web.historydetails', $send);
    }

    public function mujib_corner()
    {
        $send['mujibs'] = DB::table('mujib_corners')->where('status', 1)->get();
        return view('web.mujib-corner', $send);
    }

    public function mujib_detail($slug=null)
    {
        $send['mujibdet'] = DB::table('mujib_corners')->where(['status' => 1, 'url'=>$slug])->first();
        return view('web.mujibdets', $send);
    }

    public function message($slug=null)
    {
        $send['msgs'] = DB::table('messages')->where(['message_status' => 1, 'message_slug'=>$slug])->first();
        return view('web.msgs', $send);
    }

    public function alldownload()
    {
        $send['uploads'] = DB::table('uploads')->where(['status' => 1])
        ->orderByDesc('created_at')
        ->get();
        return view('web.alldownload' , $send);
    }

    public function download($slug=null)
    {
        $send['upload'] = DB::table('uploads')->where(['status' => 1, 'url'=>$slug])->first();
        return view('web.download', $send);
    }

    public function contact()
    {
        return view('web.contact');
    }


}
