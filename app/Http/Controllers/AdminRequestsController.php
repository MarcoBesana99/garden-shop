<?php

namespace App\Http\Controllers;

use App\Models\ClientRequest;
use Illuminate\Http\Request;

class AdminRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientRequests = ClientRequest::orderBy('created_at', 'desc')->get();
        return view('admin.requests', compact('clientRequests'));
    }

    public function newRequests()
    {
        $newRequests = ClientRequest::where('status','new')->get();
        return view('admin.new-requests', compact('newRequests'));

    }

    /**
     * show
     *
     * @param  mixed $clientRequest
     * @return void
     */
    public function show(ClientRequest $clientRequest)
    {
        return view('admin.request', ['clientRequest' => $clientRequest]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientRequest $clientRequest)
    {
        $clientRequest->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'The status of the request has been changed successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientRequest $clientRequest)
    {
        $clientRequest->delete();
        return redirect()->back()->with('success', 'Request deleted successfully');
    }
}
