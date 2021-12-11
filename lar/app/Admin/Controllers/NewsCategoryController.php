<?php

namespace App\Admin\Controllers;

use App\Enums\ShowStatusEnum;
use App\Models\NewsCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NewsCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Quản lí danh mục tin tức';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new NewsCategory());
        $grid->model()
            ->orderBy('priority', 'ASC');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Tên'));
        $grid->column('url', __('URL'));
        $grid->column('is_show', __('Hiển thị'))->switch();
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
        $show = new Show(NewsCategory::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Tên'));
        $show->field('url', __('URL'));
        $show->field('is_show', __('Hiển thị'))->as(function ($isShow) {
            return $isShow ? "Hiển thị" : "Ẩn";
        });
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
        $form = new Form(new NewsCategory());

        $form->display('id', __('ID'));
        $form->text('name', __('Tên'))->rules('required|max:150');
        $form->text('url', __('URL'))
            ->rules('required|max:100|regex:/\/[a-zA-Z0-9_\-]/')->default('/');
        $form->html('<i class="fa fa-info-circle"></i> URL chỉ cho phép các kí tự a-z, 0-9, -_');
        $form->radio('is_show', __('Hiển thị'))
            ->options(ShowStatusEnum::toFormOptions())
            ->default(1);
        $form->html('<i class="fa fa-info-circle"></i> Ẩn danh mục tin tức sẽ ẩn tất cả tin tức của danh mục đó.');

        $form->number('priority', __('Sắp xếp'))->min(1)->default(1);

        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
