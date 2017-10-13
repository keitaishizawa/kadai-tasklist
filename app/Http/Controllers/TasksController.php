<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $data['user']  = $user;
            $data['tasks'] = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
        }
        $data['title'] = config('const.title')['index'];
        $data['header_create_link_flg'] = false;
        
        return view('tasks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = config('const.title')['create'];
        $task = new Task;
        $header_create_link_flg = true;
        
        return view('tasks.create',[
            'title' => $title,
            'task' => $task,
            'header_create_link_flg' => $header_create_link_flg,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:255',
            'status'  => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'content' => $request->content,
            'status'  => $request->status
        ]);
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        
        if (\Auth::user()->id !== $task->user_id) {
            return redirect('/');
        }
        
        $data = [];
        $data['task'] = $task;
        $data['title'] = config('const.title_parts')['id'] . $id . config('const.title')['show'];
        $data['header_create_link_flg'] = false;
        
        return view('tasks.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        
        if (\Auth::user()->id !== $task->user_id) {
            return redirect('/');
        }
        
        $data = [];
        $data['task'] = $task;
        $data['title'] = config('const.title_parts')['id'] . $id . config('const.title')['edit'];
        $data['header_create_link_flg'] = false;
        
        return view('tasks.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = \App\Task::find($id);

        if (\Auth::user()->id === $task->user_id) {
            $this->validate($request, [
                'content' => 'required|max:255',
                'status'  => 'required|max:255',
            ]);

            $request->user()->tasks()->create([
                'content' => $request->content,
                'status'  => $request->status
            ]);
        }
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = \App\Task::find($id);
        
        if (\Auth::user()->id === $task->user_id) {
            $task->delete();
        }
        
        return redirect('/');
    }
}
