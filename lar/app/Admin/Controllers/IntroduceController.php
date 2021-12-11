<?php

namespace App\Admin\Controllers;

use App\Enums\ShowStatusEnum;
use App\Models\CompanyProfile;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;

class IntroduceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Quản lí Thông tin chung';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CompanyProfile());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('code', __('Code'));
        $grid->column('name', __('Tên'));
        $grid->column('value', __('Giá Trị'))
            ->display(function ($value) {
                return nl2br(e(Str::limit($value, 50)));
            });
        $grid->column('is_show', __('Hiển thị'))->switch();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(CompanyProfile::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('code', __('Code'));
        $show->field('name', __('Tên'));
        $show->field('value', __('Giá Trị'));
        $show->field('is_show', __('Hiển thị'))->as(function ($isShow) {
            return $isShow ? "Hiển thị" : "Ẩn";
        });
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
        $form = new Form(new CompanyProfile);

        $form->display('id', __('ID'));
        $form->display('code', __('Code'));
        $form->text('name', __('Tên'))->rules('required|max:50');
        $form->textarea('value', __('Giá trị'))->rules('required|max:3000');
        $form->radio('is_show', __('Hiển thị'))
            ->options(ShowStatusEnum::toFormOptions())
            ->default(1);

        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
