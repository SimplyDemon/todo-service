<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    protected string $folderPath = 'pages.tag.';
    protected string $routePrefix = 'tags.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = Tag::orderBy('created_at', 'DESC')
            ->paginate(perPage: 10);


        return view(
            $this->folderPath . 'index', [
                'all' => $all,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            $this->folderPath . 'create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        try {
            Tag::create($request->only('name'));
            $message = 'Добавление тега выполнено успешно!';
        } catch (QueryException $e) {
            $message = $e->getMessage();
        }
        $request->session()->flash('message', $message);

        return Redirect::to(route($this->routePrefix . 'create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view(
            $this->folderPath . 'show', [
                'single' => $tag,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view(
            $this->folderPath . 'edit', [
                'single' => $tag,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        try {
            $tag->update($request->only('name'));
            $message = 'Обновление выполнено успешно!';
        } catch (QueryException $e) {
            $message = $e->getMessage();
        }

        $request->session()->flash('message', $message);

        return Redirect::to(route($this->routePrefix . 'edit',  $tag));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
            $message = 'Удаление выполнено успешно!';
        } catch (QueryException $e) {
            $message = $e->getMessage();
        }

        Session::flash('message', $message);

        return Redirect::to(route($this->routePrefix . 'index'));
    }
}
