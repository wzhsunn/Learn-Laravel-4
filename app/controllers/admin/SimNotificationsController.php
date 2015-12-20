<?php
namespace App\Controllers\Admin;
use SimNotification;
use Input,  CheckBox, Notification, Redirect, Sentry, Str, Event, UpdateScoreEventHandler;

class SimNotificationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin/notifications
	 *
	 * @return Response
	 */
	public function index()
	{
		// var_dump(SimNotification::all());
		return \View::make('admin.simnotifications.index')->with('simnotifications', SimNotification::all());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/notifications/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        // Event::fire(UpdateScoreEventHandler::EVENT, array());
		
        return \View::make('admin.simnotifications.create');

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/notifications
	 *
	 * @return Response
	 */
	public function store()
	{
		//

		$simnotification = new SimNotification;
		$simnotification->subject = Input::get('subject');
		$simnotification->body = Input::get('body');
		$simnotification->from_user = Sentry::getUser()->id;
		$simnotification->to_user = Input::get('to_user');
		// var_dump(Input::get('receipt'));
		$simnotification->need_receipt = Input::get('need_receipt');
		$simnotification->save();
		$count = SimNotification::all()->count();
        Event::fire(UpdateScoreEventHandler::EVENT, array($count));

  		Notification::success('新增页面成功！');

        return Redirect::route('admin.simnotifications.index');

		// $validation = new PageValidator;
 		
  //       if ($validation->passes())
  //       {
		// 	$page          = new Page;
		// 	$page->title   = Input::get('title');
		// 	$page->body    = Input::get('body');
		// 	$page->user_id = Sentry::getUser()->id;
  //           $page->save();
            
  //           Notification::success('新增页面成功！');
 
  //           return Redirect::route('admin.pages.edit', $page->id);
  //       }
 
  //       return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	/**
	 * Display the specified resource.
	 * GET /admin/notifications/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/notifications/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/notifications/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/notifications/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}