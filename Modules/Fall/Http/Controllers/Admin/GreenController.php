<?php

namespace Modules\Fall\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Fall\Entities\Green;
use Modules\Fall\Http\Requests\CreateGreenRequest;
use Modules\Fall\Http\Requests\UpdateGreenRequest;
use Modules\Fall\Repositories\GreenRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class GreenController extends AdminBaseController
{
    /**
     * @var GreenRepository
     */
    private $green;

    public function __construct(GreenRepository $green)
    {
        parent::__construct();

        $this->green = $green;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$greens = $this->green->all();

        return view('fall::admin.greens.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('fall::admin.greens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateGreenRequest $request
     * @return Response
     */
    public function store(CreateGreenRequest $request)
    {
        $this->green->create($request->all());

        return redirect()->route('admin.fall.green.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('fall::greens.title.greens')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Green $green
     * @return Response
     */
    public function edit(Green $green)
    {
        return view('fall::admin.greens.edit', compact('green'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Green $green
     * @param  UpdateGreenRequest $request
     * @return Response
     */
    public function update(Green $green, UpdateGreenRequest $request)
    {
        $this->green->update($green, $request->all());

        return redirect()->route('admin.fall.green.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('fall::greens.title.greens')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Green $green
     * @return Response
     */
    public function destroy(Green $green)
    {
        $this->green->destroy($green);

        return redirect()->route('admin.fall.green.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('fall::greens.title.greens')]));
    }
}
