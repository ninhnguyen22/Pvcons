<?php

namespace App\Admin\Controllers;

use App\Enums\ShowStatusEnum;
use App\Models\Category;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Quản lí Dự Án';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->filter(function ($filter) {
            $filter->equal('category_id', 'Danh mục')->select($this->getCategoriesOption());
            $filter->like('title', 'Title');
        });

        $grid->model()
            ->orderBy('priority', 'ASC')
            ->orderBy('updated_at', 'DESC');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Tên'));
        $grid->column('category.name', __('Danh mục'));
        $grid->column('image', __('Hình ảnh'))->image();
        $grid->column('preview', __('Giới thiệu'));
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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Tên'));
        $show->field('category.name', __('Danh mục'));
        $show->field('image', __('Hình Ảnh'))->image();
        $show->field('is_show', __('Hiển thị'))->as(function ($isShow) {
            return $isShow ? "Hiển thị" : "Ẩn";
        });
        $show->field('preview', __('Giới thiệu'));
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
        $form = new Form(new Product());

        $form->display('id', __('ID'));
        $form->text('name', __('Tên'))->rules('required|max:100');
        $form->select('category_id', __('Danh mục'))
            ->rules('required')
            ->options($this->getCategoriesOption());
        $form->image('image', __('Hình ảnh đại diện'))->rules('required');
        $form->textarea('preview', __('Giới thiệu'))->rules('nullable|max:300');
        $form->ckeditor('description', __('Mô tả'));

        $form->radio('is_show', __('Hiển thị'))
            ->options(ShowStatusEnum::toFormOptions())
            ->default(1);

        $form->number('priority', __('Sắp xếp'))->min(1)->default(1);

        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }

    public function getCategoriesOption()
    {
        $options = [];
        $productCategories = (new Category)->getForProduct();
        foreach ($productCategories as $category) {
            $options[$category->id] = $category->name;
        }
        return $options;
    }
}
