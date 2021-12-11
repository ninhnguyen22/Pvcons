<?php

namespace App\Admin\Controllers;

use App\Enums\ContactStatusEnum;
use App\Models\Contact;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ContactController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Quản lí liên hệ';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Contact());

        $grid->filter(function ($filter) {
            $filter->equal('status', 'Trạng thái')->select($this->getStatusLabels());
            $filter->like('name', 'Tên');
            $filter->like('phone', 'Điện thoại');
        });

        $grid->model()
            ->orderBy('status', 'ASC')
            ->orderBy('created_at', 'DESC');

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Tên'));
        $grid->column('phone', __('Điện thoại'));
        $grid->column('status', __('Trạng thái'))->editable('select', $this->getStatusLabels());
        $grid->column('mail', __('Email'));
        $grid->column('content', __('Nội dung'));
        $grid->column('created_at', __('Ngày gửi'));

        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableEdit();
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
        $show = new Show(Contact::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Tên'));
        $show->field('phone', __('Điện thoại'));
        $show->field('mail', __('Email'));
        $show->field('content', __('Nội dung'));
        $show->field('created_at', __('Ngày gửi'));

        return $show;
    }

    public function getStatusLabels()
    {
        return ContactStatusEnum::getLabels();
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Contact());

        $form->hidden('status');

        return $form;
    }
}
