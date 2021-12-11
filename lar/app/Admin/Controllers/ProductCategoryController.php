<?php

namespace App\Admin\Controllers;

use App\Enums\ShowStatusEnum;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Quản lí Danh Mục Dự Án';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());
        $grid->model()
            ->getChildByParent(2)
            ->orderBy('priority', 'ASC');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Tên'));
        $grid->column('url', __('URL'));
        $grid->column('is_show', __('Hiển thị'))->switch();
        $grid->column('products', __('Số lượng dự án'))->display(function ($products) {
            $count = count($products);
            return "<span class='label label-primary'>{$count}</span>";
        });
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
        $form->text('url', __('URL'))->rules('required|max:100|regex:/\/[a-zA-Z0-9_\-]/')->default('/');
        $form->html('URL Bắt đầu bằng / VD: /abc');

        $form->radio('is_show', __('Hiển thị'))
            ->options(ShowStatusEnum::toFormOptions())
            ->default(1);
        $form->number('priority', __('Sắp xếp'))->min(1)->default(1);
        $form->hidden('parent_id', __('Parent'))->default(2);

        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
