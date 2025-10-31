<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Message;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $metrics = [
            'services' => Service::count(),
            'portfolios' => Portfolio::count(),
            'team_members' => TeamMember::count(),
            'blog_posts' => BlogPost::count(),
            'unread_messages' => Message::unread()->count(),
        ];

        $recentMessages = Message::latest()->take(5)->get();
        $recentPortfolios = Portfolio::latest()->take(5)->get();

        return view('admin.dashboard', compact('metrics', 'recentMessages', 'recentPortfolios'));
    }
}
