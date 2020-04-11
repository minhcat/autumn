<?php

namespace Modules\Blog\Widgets;

use Modules\Blog\Repositories\TagRepository;
use Modules\Dashboard\Foundation\Widgets\BaseWidget;

class TagsWidget extends BaseWidget
{
    /**
     * @var CategoryRepository
     */
    private $tag;

    public function __construct(TagRepository $tag)
    {
        $this->tag = $tag;
    }

    /**
     * Get the widget name
     * @return string
     */
    protected function name()
    {
        return 'TagsWidget';
    }

    /**
     * Get the widget view
     * @return string
     */
    protected function view()
    {
        return 'blog::admin.widgets.tags';
    }

    /**
     * Get the widget data to send to the view
     * @return string
     */
    protected function data()
    {
        return ['tagCount' => $this->tag->all()->count()];
    }

    /**
     * Get the widget type
     * @return string
     */
    protected function options()
    {
        return [
            'width' => '2',
            'height' => '2',
            'x' => '2',
        ];
    }
}
