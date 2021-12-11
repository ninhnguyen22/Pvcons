<?php

namespace App\Admin\Controllers;

use App\Enums\ShowStatusEnum;
use App\Enums\SlideTypeEnum;
use App\Models\Slide;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SliderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Quản lí Slider';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Slide());
        $grid->model()
            ->orderBy('type', 'ASC')
            ->orderBy('priority', 'ASC');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('url', __('Image'))->image();
        $grid->column('type', __('Vị trí'))
            ->display(function ($type) {
                return SlideTypeEnum::getLabel($type);
            });
        $grid->column('is_show', __('Hiển thị'))->switch();
        $grid->column('caption', __('Caption'));
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
        $show = new Show(Slide::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('url', __('URL'))->image();
        $show->field('type', __('Vị trí'))
            ->as(function ($type) {
                return SlideTypeEnum::getLabel($type);
            });
        $show->field('is_show', __('Hiển thị'))->as(function ($isShow) {
            return $isShow ? "Hiển thị" : "Ẩn";
        });
        $show->field('caption', __('Caption'));
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
        $form = new Form(new Slide);

        $form->display('id', __('ID'));
        $form->select('type', __('Vị Trí'))
            ->options(SlideTypeEnum::toFormOptions())
            ->default(1);

        $form->image('url', __('Hình Ảnh'));
        $form->html('Hình Ảnh Khuyến Nghị: Đầu trang 1200x800, Giới thiệu: 470X300');
        $form->radio('is_show', __('Hiển thị'))
            ->options(ShowStatusEnum::toFormOptions())
            ->default(1);

        $form->textarea('caption', __('Caption'));
        $form->number('priority', __('Sắp xếp'))->min(1)->default(1);

        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
