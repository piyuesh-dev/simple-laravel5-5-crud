<?php

namespace App\Http\Controllers;

use App\Nerd;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class NerdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		// get all the nerds
		$nerds = Nerd::all();

		// load the view and pass the nerds
		return view('nerds.index')
			->with('nerds', $nerds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		// load the create form (app/views/nerds/create.blade.php)
		return view('nerds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'email'      => 'required|email',
			'nerd_level' => 'required|numeric'
		);
		$validatedData = $request->validate($rules);

		// store
		$nerd = new Nerd;
		$nerd->name       = Input::get('name');
		$nerd->email      = Input::get('email');
		$nerd->nerd_level = Input::get('nerd_level');
		$nerd->save();

		// redirect
		Session::flash('message', 'Successfully created nerd!');
		return Redirect::to('nerds');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nerd  $nerd
     * @return \Illuminate\Http\Response
     */
    public function show(Nerd $nerd)
    {
        //
		// get the nerd
// 		$nerd = Nerd::find($id);

		// show the view and pass the nerd to it
		return view('nerds.show')
			->with('nerd', $nerd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nerd  $nerd
     * @return \Illuminate\Http\Response
     */
    public function edit(Nerd $nerd)
    {
        //
		// get the nerd
// 		$nerd = Nerd::find($id);

		// show the edit form and pass the nerd
		return view('nerds.edit')
			->with('nerd', $nerd);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nerd  $nerd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nerd $nerd)
    {
        //
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
		);
		$validatedData = $request->validate($rules);

		// store
// 		$nerd = Nerd::find($id);
		$nerd->name = Input::get('name');
		$nerd->email = Input::get('email');
		$nerd->nerd_level = Input::get('nerd_level');

		$nerd->save();

		// redirect
		Session::flash('message', 'Successfully updated Nerd!');
		return Redirect::to('nerds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nerd  $nerd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nerd $nerd)
    {
		// delete
		$nerd->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the nerd!');
		return Redirect::to('nerds');
    }
}
