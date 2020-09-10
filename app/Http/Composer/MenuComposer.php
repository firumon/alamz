<?php


    namespace App\Http\Composer;


    use Illuminate\Support\Facades\Auth;
    use Illuminate\View\View;

    class MenuComposer
    {

        public $menus = [];

        public static $template = [
            'admin' => [
                ['text' => 'DASHBOARD', 'href' => 'admin.dashboard', 'icon' => 'columns'],
                ['text' => 'RECORDS', 'href' => '#', 'icon' => 'database', 'submenu' => [
                    ['text' => 'ALL', 'href' => 'admin.view', 'icon' => 'align-justify'],
                    ['text' => 'NEW', 'href' => 'admin.new', 'icon' => 'code-branch'],
                    ['text' => 'PENDING', 'href' => 'admin.pending', 'icon' => 'edit'],
                    ['text' => 'REJECTED', 'href' => 'admin.rejected', 'icon' => 'poo-storm'],
                    ['text' => 'APPROVED', 'href' => 'admin.approved', 'icon' => 'check-double'],
                ]],
                ['text' => 'BROKER RECORDS', 'href' => 'admin.broker', 'icon' => 'user-edit'],
                ['text' => 'IMPORT', 'href' => 'import', 'icon' => 'file-import'],
                ['text' => 'EXPORT', 'href' => 'admin.export', 'icon' => 'file-export'],
                ['text' => 'REPORT', 'href' => 'admin.report', 'icon' => 'book'],
                ['text' => 'USERS', 'href' => '#', 'icon' => 'user', 'submenu' => [
                    ['text' => 'ADMINS', 'href' => 'admins', 'icon' => 'users-cog'],
                    ['text' => 'BROKERS', 'href' => 'brokers', 'icon' => 'user-edit'],
                    ['text' => 'COMPLIANCE', 'href' => 'compliance', 'icon' => 'user-secret'],
                ]],
                ['text' => 'PROFILE', 'href' => 'profile', 'icon' => 'id-badge'],
            ],
            'broker' => [
                ['text' => 'DASHBOARD', 'href' => 'broker.dashboard', 'icon' => 'columns'],
                ['text' => 'ALL RECORDS', 'href' => 'broker.view', 'icon' => 'database'],
                ['text' => 'NEW RECORDS', 'href' => 'broker.new', 'icon' => 'code-branch'],
                ['text' => 'PENDING RECORDS', 'href' => 'broker.pending', 'icon' => 'edit'],
                ['text' => 'SUBMITTED RECORDS', 'href' => 'broker.submitted', 'icon' => 'check'],
                ['text' => 'UN REVIEWED RECORDS', 'href' => 'broker.unreviewed', 'icon' => 'star-half'],
                ['text' => 'INCOMPLETE RECORDS', 'href' => 'broker.incomplete', 'icon' => 'star-half-alt'],
                ['text' => 'REJECTED RECORDS', 'href' => 'broker.rejected', 'icon' => 'poo-storm'],
                ['text' => 'APPROVED RECORDS', 'href' => 'broker.approved', 'icon' => 'check-double'],
                ['text' => 'PROFILE', 'href' => 'profile', 'icon' => 'id-badge'],
            ],
            'compliance' => [
                ['text' => 'DASHBOARD', 'href' => 'compliance.dashboard', 'icon' => 'columns'],
                ['text' => 'ALL RECORDS', 'href' => 'compliance.view', 'icon' => 'align-justify'],
                ['text' => 'RECORDS TO REVIEW', 'href' => 'compliance.pending', 'icon' => 'star-half'],
                ['text' => 'APPROVED RECORDS', 'href' => 'compliance.approved', 'icon' => 'check-double'],
                ['text' => 'REJECTED RECORDS', 'href' => 'compliance.rejected', 'icon' => 'poo-storm'],
                ['text' => 'INCOMPLETE RECORDS', 'href' => 'compliance.incomplete', 'icon' => 'star-half-alt'],
                ['text' => 'BROKER RECORDS', 'href' => 'compliance.broker', 'icon' => 'user-edit'],
                ['text' => 'EXPORT', 'href' => 'compliance.export', 'icon' => 'file-export'],
                ['text' => 'REPORT', 'href' => 'compliance.report', 'icon' => 'book'],
                ['text' => 'PROFILE', 'href' => 'profile', 'icon' => 'id-badge'],
            ],
        ];

        public function __construct()
        {
            if(!Auth::user()) return;
            $role = Auth::user()->role;
            $this->menus = self::$template[$role];
        }

        public function compose(View $view){
            $view->with('menus',$this->menus);
        }

    }
