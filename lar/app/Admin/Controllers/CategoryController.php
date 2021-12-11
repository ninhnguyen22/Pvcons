<?php

namespace App\Admin\Controllers;

use App\Enums\ShowStatusEnum;
use App\Enums\SlideTypeEnum;
use App\Models\Category;
use App\Models\Slide;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Quản lí Danh Mục Chính';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());
        $grid->model()
            ->getParent()
            ->orderBy('priority', 'ASC');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Tên'));
        $grid->column('url', __('URL'));
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
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Tên'));
        $show->field('url', __('URL'));
        $show->field('is_show', __('Hiển thị'))->as(function ($isShow) {
            return $isShow ? "Hiển thị" : "Ẩn";
        });
        $show->field('priority', __('Sắp xếp'));
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
        $form = new Form(new Category);

        $form->display('id', __('ID'));
        $form->text('name', __('Tên'))->rules('required|max:100');
        $form->display('url', __('URL'));
        $form->html('URL Bắt đầu bằng / VD: /abc');

        $form->radio('is_show', __('Hiển thị'))
            ->options(ShowStatusEnum::toFormOptions())
            ->default(1);
        $form->number('priority', __('Sắp xếp'))->min(1)->default(1);

        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
