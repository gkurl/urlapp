<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Psy\Util\Str;


class URLControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Index controller handles the main and initial connection check and view
    public function index()
    {

       //DB Check
        $dbcheck = (DB::connection()->getDatabaseName());

        if (DB::connection()->getDatabaseName()){

            return view('short', compact('dbcheck'));

        }

        elseif (!$dbcheck){

            return response(404);

        }


    }

    //will handle form submissions from HTML form in short.blade.php


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */

    public function create(Request $request, $hash)
    {

        $actual_url = htmlspecialchars("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");


        if(strpos($actual_url, $hash)){

            $original_url = DB::table('links')->select('url')->where('hash', '=', $hash)->first();

            return redirect('/')->withInput()->with('original_url', $original_url->url);

        }



    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {

       //Test initial response from post to see if it works using 'Root' namespace Response - i.e. \Response

       /*return \Response::json([
           'success' => true
       ]);*/

       $request->validate(['url' => 'required|url']);


        //Check if link already exists in the DB
       $request->get('url');


        $url = \App\Link::where('url', $request->get('url'))->first();


        //if URL saved, then provide it back (basic for now, will extend by providing new button on front end to regenerate new URL but is restricted to one regeneration per user)

        if ($url){


           return \redirect('/')->withInput()->with('url', $url->hash);


//Else create new hash
        } else {
//First create the unique hash
            do {

                $newhash = str_random(6);

            } while(\App\Link::where('hash', $newhash)->count() > 0);
        }

        //Then create DB record

        \App\Link::create(['url' =>$request->get('url'), 'hash' => $newhash]);

        //Return shortened URL info into the action

        return $result = Redirect::to('/')->withInput()->with('url', $newhash);


    }


    //Function for URL redirection

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
