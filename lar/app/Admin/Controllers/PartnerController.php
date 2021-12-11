<?php

namespace App\Admin\Controllers;

use App\Enums\ShowStatusEnum;
use App\Models\Partner;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PartnerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Quản lí đối tác';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Partner());

        $grid->model()
            ->orderBy('priority', 'ASC')
            ->orderBy('updated_at', 'DESC');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Tên'));
        $grid->column('image', __('Hình ảnh'))->image();
        $grid->column('preview', __('Preview'));
        $grid->column('is_show', __('Hiển thị'))->switch();
        $grid->column('priority', __('Sắp xếp'));

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
        $show = new Show(Partner::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Tên'));
        $show->field('image', __('Hình Ảnh'))->image();
        $show->field('is_show', __('Hiển thị'))->as(function ($isShow) {
            return $isShow ? "Hiển thị" : "Ẩn";
        });
        $show->field('preview', __('Preview'));
        $show->field('priority', __('Sắp Xếp'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Partner());

        $form->display('id', __('ID'));
        $form->text('name', __('Tên'))->rules('required|max:200');
        $form->image('image', __('Hình ảnh'))->rules('required');
        $form->html('<i class="fa fa-info-circle"></i> Hình ảnh khuyến nghị 1024x1024.');
        $form->textarea('preview', __('Preview'))->rules('nullable|max:300');
        $form->radio('is_show', __('Hiển thị'))
            ->options(ShowStatusEnum::toFormOptions())
            ->default(1);
        $form->number('priority', __('Sắp xếp'))->min(1)->default(1);

        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
