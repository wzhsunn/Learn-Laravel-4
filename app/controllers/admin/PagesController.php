<?php

namespace App\Controllers\Admin;
 
use Page;
use Input, Notification, Redirect, Sentry, Str, Event, UpdateScoreEventHandler;

use App\Services\Validators\PageValidator;

class PagesController extends \BaseController {
 
    public function index()
    {
        $updatedMatch = 'score.update100';
        Event::fire(UpdateScoreEventHandler::EVENT, array($updatedMatch));

        return \View::make('admin.pages.index')->with('pages', Page::all());
    }

    public function show($id)
    {
        $updatedMatch = '这是一条来自show页面的实时数据';
        Event::fire(UpdateScoreEventHandler::EVENT, array($updatedMatch));
        
        return \View::make('admin.pages.show')->with('page', Page::find($id))->withAuthor(Sentry::findUserById(Page::find($id)->user_id)->name);
    }

    public function create()
    {
        $updatedMatch = 1;

        Event::fire("score.update", array($updatedMatch));

        return \View::make('admin.pages.create');
    }

    public function store()
    {
        $validation = new PageValidator;
 
        if ($validation->passes())
        {
						$page          = new Page;
						$page->title   = Input::get('title');
						$page->body    = Input::get('body');
						$page->user_id = Sentry::getUser()->id;
            $page->save();
            
            Notification::success('新增页面成功！');
 
            return Redirect::route('admin.pages.edit', $page->id);
        }
 
        return Redirect::back()->withInput()->withErrors($validation->errors);
    }

    public function edit($id)
    {
        return \View::make('admin.pages.edit')->with('page', Page::find($id));
    }

    public function update($id)
    {
        $validation = new PageValidator;

        if ($validation->passes())
        {
						$page          = Page::find($id);
						$page->title   = Input::get('title');
						$page->body    = Input::get('body');
						$page->user_id = Sentry::getUser()->id;
            $page->save();

            Notification::success('更新页面成功！');

            return Redirect::route('admin.pages.edit', $page->id);
        }

        return Redirect::back()->withInput()->withErrors($validation->errors);
    }

    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        Notification::success('删除成功！');
        return Redirect::route('admin.pages.index');
    }

}