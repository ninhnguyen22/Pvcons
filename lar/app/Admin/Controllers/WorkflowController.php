<?php

namespace App\Admin\Controllers;

use App\Enums\ShowStatusEnum;
use App\Models\WorkFlow;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WorkflowController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Quản lí qui trình làm việc';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WorkFlow());
        $grid->model()
            ->orderBy('priority', 'ASC');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('title', __('Tên'));
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
        $show = new Show(WorkFlow::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title', __('Tên'));
        $show->field('is_show', __('Hiển thị'))->as(function ($isShow) {
            return $isShow ? "Hiển thị" : "Ẩn";
        });
        $show->field('description', __('Mô tả'));
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
        $form = new Form(new WorkFlow());

        $form->display('id', __('ID'));
        $form->text('title', __('Tên'))->rules('required|max:300');
        $form->radio('is_show', __('Hiển thị'))
            ->options(ShowStatusEnum::toFormOptions())
            ->default(1);

        $form->textarea('description', __('Mô tả'));
        $form->number('priority', __('Sắp xếp'))->min(1)->default(1);

        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
