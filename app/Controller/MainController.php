<?php namespace Phalcon\JsonApi\Controller;

use Phalcon\Http\Request;
use Phalcon\Http\Response;

/**
 * Class MainController
 * @package Phalcon\Jsonapi\Controller
 */
class MainController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        echo "Hello Controller";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        echo "Create with Controller";

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
        echo __FUNCTION__ . " with Controller";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        echo __FUNCTION__ . " $id with Controller ";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        echo __FUNCTION__ . " $id with Controller ";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
        echo __FUNCTION__ . " $id with Controller ";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        echo __FUNCTION__ . " $id with Controller ";
    }
}
