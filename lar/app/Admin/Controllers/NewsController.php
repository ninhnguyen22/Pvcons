<?php

namespace App\Admin\Controllers;

use App\Enums\ShowStatusEnum;
use App\Models\News;
use App\Models\NewsCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NewsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Quản lí tin tức';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News());

        $grid->filter(function ($filter) {
            $filter->equal('new_category_id', 'Danh mục')->select($this->getNewsCategoriesOption());
            $filter->like('name', 'Tên');
        });

        $grid->model()
            ->orderBy('priority', 'ASC')
            ->orderBy('updated_at', 'DESC');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Tiêu đề'));
        $grid->column('newsCategory.name', __('Danh mục'));
        $grid->column('image', __('Hình ảnh'))->image();
        $grid->column('preview', __('Preview'));
        $grid->column('is_show', __('Hiển thị'))->switch();
        $grid->column('author.name', __('Tác giả'));
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
        $show = new Show(News::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Tiêu đề'));
        $show->field('newsCategory.name', __('Danh Mục'));
        $show->field('image', __('Hình Ảnh'))->image();
        $show->field('is_show', __('Hiển thị'))->as(function ($isShow) {
            return $isShow ? "Hiển thị" : "Ẩn";
        });
        $show->field('preview', __('Preview'));
        $show->field('author.name', __('Tác giả'));
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
        $form = new Form(new News());

        $form->display('id', __('ID'));
        $form->text('name', __('Tiêu đề'))->rules('required|max:200');
        $form->select('news_category_id', __('Danh mục'))
            ->rules('required')
            ->options($this->getNewsCategoriesOption());
        $form->image('image', __('Hình ảnh đại diện'))->rules('required');
        $form->html('<i class="fa fa-info-circle"></i> Hình ảnh khuyến nghị 1024x1024.');
        $form->textarea('preview', __('Preview'))->rules('nullable|max:300');
        $form->ckeditor('description', __('Mô tả'));

        $form->radio('is_show', __('Hiển thị'))
            ->options(ShowStatusEnum::toFormOptions())
            ->default(1);
        $form->hidden('admin_user_id');
        $form->number('priority', __('Sắp xếp'))->min(1)->default(1);

        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }

    public function getNewsCategoriesOption()
    {
        $options = [];
        $categories = NewsCategory::all();
        foreach ($categories as $category) {
            $options[$category->id] = $category->name;
        }
        return $options;
    }

    public function store()
    {
        request()->merge(['admin_user_id' => auth('admin')->id()]);
        return parent::store();
    }
}
