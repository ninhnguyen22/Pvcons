<?php

namespace App\Admin\Controllers;

use App\Enums\ShowStatusEnum;
use App\Models\CompanyProfile;
use App\Models\HomeSection;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;

class HomeSectionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Quản lí tiêu đề trang chủ';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new HomeSection());
        $grid->model()->orderBy('priority', 'ASC');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('title', __('Tiêu đề'));
        $grid->column('code', __('Code'));
        $grid->column('description', __('Mô tả'));
//        $grid->column('priority', __('Sắp xếp'));
        $grid->column('is_show', __('Hiển thị'))->switch();

        $grid->actions(function ($actions) {
            $actions->disableDelete();
        });
        $grid->disableCreateButton();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(HomeSection::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title', __('Tiêu đề'));
        $show->field('code', __('Code'));
        $show->field('description', __('Mô tả'));
        $show->field('is_show', __('Hiển thị'))->as(function ($isShow) {
            return $isShow ? "Hiển thị" : "Ẩn";
        });
//        $show->field('priority', 'Sắp xếp');

        return $show;
    }

    /**
     * Make a form builder.h
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new HomeSection);

        $form->display('id', __('ID'));
        $form->display('code', __('Code'));
        $form->text('title', __('Tiêu đề'))->rules('required|max:50');
        $form->textarea('description', __('Mô tả'))->rules('required|max:500');
        $form->radio('is_show', __('Hiển thị'))
            ->options(ShowStatusEnum::toFormOptions())
            ->default(1);

        $form->hidden('priority')->default(1);

        return $form;
    }
}
