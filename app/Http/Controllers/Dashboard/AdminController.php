<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\News;
use App\Models\Order;
use App\Models\Page;
use App\Models\Review;
use App\Models\Task;
use App\Models\User;
use Cache;
use DB;

class AdminController extends Controller
{


    public function index()
    {

        $Users = Cache::remember('Users', 10, function () {
            return User::where('type', 'users')->count();
        });

        $Editors = Cache::remember('Editors', 10, function () {
            return User::where('type', 'editor')->count();
        });

        $LastOrder = Cache::remember('LastOrder', 10, function () {
            return Order::orderBy('id', 'desc')->limit(5)->get();
        });


        $Pages = Cache::remember('Pages', 10, function () {
            return Page::count();
        });


        $News = Cache::remember('News', 10, function () {
            return News::count();
        });


        $Review = Cache::remember('Review', 10, function () {
            return Review::count();
        });


        $LastTask = Cache::remember('LastTask', 10, function () {
            return Task::orderBy('id', 'desc')->limit(5)->get();
        });


        $statOrderMath = Cache::remember('statOrderMath', 10, function () {
            return DB::table('order')
                ->select(DB::raw("DATE_FORMAT(`created_at`, '%d') as dat , COUNT('id') as count"))
                ->whereRaw("created_at >= DATE_SUB(CURRENT_DATE, INTERVAL 30 DAY) ")
                ->groupBy('dat')
                ->orderBy('dat', 'DESC')
                ->get();
        });


        $allOrder = Cache::remember('allOrder', 10, function () {
            return Order::count();
        });


        $completeOrder = Cache::remember('completeOrder', 10, function () {
            return Order::where('status', 'Готова')->count();
        });


        $dangerOrder = Cache::remember('dangerOrder', 10, function () {
            return Order::where('status', 'Отменён')->count();
        });

        $toWork = $allOrder - $completeOrder - $dangerOrder;


        $noRead = Cache::remember('$noRead', 10, function () {
            return Feedback::where('read', false)->count();
        });


        return view("dashboard/home", [
            'lastOrder' => $LastOrder,
            'users' => $Users,
            'editors' => $Editors,
            'pages' => $Pages,
            'news' => $News,
            'review' => $Review,
            "statOrderMath" => $statOrderMath,
            "allOrder" => $allOrder,
            "completeOrder" => $completeOrder,
            "dangerOrder" => $dangerOrder,
            "toWork" => $toWork,
            'noRead' => $noRead,
            'LastTask' => $LastTask,
        ]);
    }


}
