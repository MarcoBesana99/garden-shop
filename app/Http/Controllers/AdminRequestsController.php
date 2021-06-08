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
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $clientRequests = ClientRequest::orderBy('created_at', 'desc')->where('email', 'like', '%' . $request->search . '%')
                ->orWhere('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%')
                ->orWhere('company', 'like', '%' . $request->search . '%')->get();
        } else {
            $clientRequests = ClientRequest::orderBy('created_at', 'desc')->get();
        }
        return view('admin.requests', compact('clientRequests'));
    }

    public function newRequests(Request $request)
    {
        if ($request->has('search')) {
            $newRequests = ClientRequest::orderBy('created_at', 'desc')->where('status', 'new')->where(function ($query) use ($request) {
                $query->where('email', 'like', '%' . $request->search . '%');
                $query->orWhere('first_name', 'like', '%' . $request->search . '%');
                $query->orWhere('last_name', 'like', '%' . $request->search . '%');
                $query->orWhere('company', 'like', '%' . $request->search . '%');
            })->get();
        } else {
            $newRequests = ClientRequest::orderBy('created_at', 'desc')->where('status', 'new')->get();
        }
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
