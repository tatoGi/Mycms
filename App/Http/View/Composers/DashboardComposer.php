<?php

namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Models\Submission;
class DashboardComposer
{
    
    public function __construct()
    {
        $this->notifications = Submission::where('seen', 0)->with('post.parent')->orderBy('created_at', 'desc')->get();
    }

    
    public function compose(View $view)
    {
        
        $view->with('notifications', $this->notifications);
    }
}