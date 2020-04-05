<?php

namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Blog\Entities\Tag;
use Modules\Blog\Http\Requests\CreateTagRequest;
use Modules\Blog\Http\Requests\UpdateTagRequest;
use Modules\Blog\Repositories\TagRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class TagController extends AdminBaseController
{
    /**
     * @var TagRepository
     */
    private $tag;

    public function __construct(TagRepository $tag)
    {
        parent::__construct();

        $this->tag = $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$tags = $this->tag->all();

        return view('blog::admin.tags.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('blog::admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTagRequest $request
     * @return Response
     */
    public function store(CreateTagRequest $request)
    {
        $this->tag->create($request->all());

        return redirect()->route('admin.blog.tag.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('blog::tags.title.tags')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tag $tag
     * @return Response
     */
    public function edit(Tag $tag)
    {
        return view('blog::admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Tag $tag
     * @param  UpdateTagRequest $request
     * @return Response
     */
    public function update(Tag $tag, UpdateTagRequest $request)
    {
        $this->tag->update($tag, $request->all());

        return redirect()->route('admin.blog.tag.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('blog::tags.title.tags')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag $tag
     * @return Response
     */
    public function destroy(Tag $tag)
    {
        $this->tag->destroy($tag);

        return redirect()->route('admin.blog.tag.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('blog::tags.title.tags')]));
    }
}
