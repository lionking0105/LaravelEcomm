<?php

namespace Modules\Front\Http\ViewComposers;

use Illuminate\View\View;
use Modules\Settings\Models\Setting;

class SettingsViewComposer
{
    public function compose(View $view)
    {
        $view->with('settings', Setting::get());
    }
}
