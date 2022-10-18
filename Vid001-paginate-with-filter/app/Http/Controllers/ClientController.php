<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Prepare Search Field
        if(isset($request->filter_client['search'])){
            //Remenbering
            $request->session()->put('filter_client[search]', $request->filter_client['search']);
        }else if(isset($request->filter_client['enable']) && is_null($request->filter_client['search'])){
            //clear search field
            $request->session()->forget('filter_client[search]');
        }

        //Prepare Search Status Field        
        if(isset($request->filter_client['status']) && $request->filter_client['status'] <> 'Select...'){
            //Remenbering
            $request->session()->put('filter_client[status]', $request->filter_client['status']);
        }else if(isset($request->filter_client['enable']) && $request->filter_client['status'] == 'Select...'){
            //clear status field
            $request->session()->forget('filter_client[status]');
        }
        
        
        // Execute Query
        if($request->session()->exists('filter_client[search]')){
            $filterSearch = $request->session()->get('filter_client[search]');

            $records = Client::where(function ($records) use ($filterSearch){
                return $records->where('name', 'like', '%'.$filterSearch.'%')
                        ->orWhere('email', 'like', '%'.$filterSearch.'%')
                        ->orWhere('address', 'like', '%'.$filterSearch.'%');
            });
        }

        if($request->session()->exists('filter_client[status]')){
            if(!isset($records)){
                $records = Client::where('status', '=', $request->session()->get('filter_client[status]'));
            }else{
                $records = $records->where('status', '=', $request->session()->get('filter_client[status]'));
            }
        }
        
        //Pagination
        if(!isset($records)){
            $records = Client::paginate(15);
        }else{
            $records = $records->paginate(15);
        }

        
        return view('client.index', compact('records'));
    }

    public function clearFilter(Request $request){
        $request->session()->forget([
            'filter_client[search]',
            'filter_client[status]',
        ]);

        return redirect(route('client.index'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
