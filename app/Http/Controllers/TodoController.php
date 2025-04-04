<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TodoController extends Controller
{
    protected string $folderPath = 'pages.todo.';
    protected string $routePrefix = 'todos.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = Todo::orderBy('created_at', 'DESC')
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
        $tags = Tag::orderBy('created_at', 'DESC')->get();

        return view(
            $this->folderPath . 'create', [
                'tags' => $tags,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {


        try {
            $todo = Todo::create($request->only([
                'title',
                'text',
            ]));

            $tags = $request->input('tags');
            if($tags) {
                $todo->tags()->attach($tags);
            }


            $message = 'Добавление задачи выполнено успешно!';
        } catch (QueryException $e) {
            $message = $e->getMessage();
        }
        $request->session()->flash('message', $message);

        return Redirect::to(route($this->routePrefix . 'create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return view(
            $this->folderPath . 'show', [
                'single' => $todo,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        $tags = Tag::orderBy('created_at', 'DESC')->get();

        return view(
            $this->folderPath . 'edit', [
                'single' => $todo,
                'tags' => $tags,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        /* For update checkbox field */
        $isCompleted = $request->has('is_completed');
        try {
            $todo->update($request->only(['title', 'text']) + [
                    'is_completed' => $isCompleted,
                ]);

            $tags = $request->input('tags');
            if($tags) {
                $todo->tags()->sync($tags);
            } else {
                $todo->tags()->delete();
            }

            $message = 'Обновление выполнено успешно!';
        } catch (QueryException $e) {
            $message = $e->getMessage();
        }

        $request->session()->flash('message', $message);

        return Redirect::to(route($this->routePrefix . 'edit',  $todo));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        try {
            $todo->delete();
            $message = 'Удаление выполнено успешно!';
        } catch (QueryException $e) {
            $message = $e->getMessage();
        }

        Session::flash('message', $message);

        return Redirect::to(route($this->routePrefix . 'index'));
    }
}
