<?php

namespace App\Admin\Controllers;

use App\Models\Stock;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Tag;

class StockController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Stock';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Stock());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('name', 'Name');
        $grid->column('imgpath', __('Imgpath'))->image();
        $grid->column('detail', __('Detail'));
        $grid->column('fee', __('Fee'))->sortable();
        $grid->column('stock_count', __('Stock count'))->sortable();
        $grid->tags()->pluck('name')->label();
        // $grid->tags()->display(function ($tag) {
        //     $tag = array_map(function ($tag) {
        //         return "<span class='label label-success'>{$tag['name']}</span>";
        //     }, $tag);

        //     return join('&nbsp;', $tag);
        // });

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
        $show = new Show(Stock::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', 'Name');
        $show->field('detail', __('Detail'));
        $show->field('fee', __('Fee'));
        $show->field('stock_count', __('Stock count'));
        $show->field('imgpath', __('Imgpath'));
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
        $tags = Tag::pluck('name', 'id');

        $form = new Form(new Stock());

        $form->text('name', 'Name');
        $form->text('detail', __('Detail'));
        $form->number('fee', __('Fee'))->min(1);
        $form->number('stock_count', __('Stock count'))->min(0);
        $form->image('imgpath', __('Imgpath'));
        $form->multipleSelect('tags')->options($tags);

        return $form;
    }
}
