<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function indexBK(Content $content)
    {
        return $content->header('chart')
            ->description('.....')
            ->body(view('charts'));
    }

    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(view('admin.dashboard.header'));
            /*->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append($this->devInfo());
                });
            });*/
    }

    protected function devInfo()
    {
        return Admin::component('admin.dashboard.environment');
    }
}
