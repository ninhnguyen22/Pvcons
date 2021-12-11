<?php

namespace App\Admin\Controllers;

use App\Enums\ShowStatusEnum;
use App\Models\Category;
use App\Models\ClientBenefit;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BenefitController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Quản lí lợi ích khách hàng';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ClientBenefit());
        $grid->model()
            ->orderBy('priority', 'ASC');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('title', __('Tên'));
        $grid->column('image', __('Hình ảnh'))->image();
        $grid->column('description', __('Mô tả'));
        $grid->column('is_show', __('Hiển thị'))->switch();
        $grid->column('priority', __('Sắp xếp'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(ClientBenefit::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title', __('Tên'));
        $show->field('image', __('Hình Ảnh'))->image();
        $show->field('is_show', __('Hiển thị'))->as(function ($isShow) {
            return $isShow ? "Hiển thị" : "Ẩn";
        });
        $show->field('description', __('Mô tả'));
        $show->field('priority', __('Sắp Xếp'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ClientBenefit());

        $form->display('id', __('ID'));
        $form->text('title', __('Tên'))->rules('required|max:100');
        $form->image('image', __('Hình ảnh'));
        $form->html('Hình ảnh khuyến nghị (1024x1024)');
        $form->textarea('description', __('Mô tả'))->rules('nullable|max:500');
        $form->radio('is_show', __('Hiển thị'))
            ->options(ShowStatusEnum::toFormOptions())
            ->default(1);

        $form->number('priority', __('Sắp xếp'))->min(1)->default(1);

        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
