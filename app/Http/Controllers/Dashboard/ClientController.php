<?php

namespace App\Http\Controllers\Dashboard;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
class ClientController extends Controller
{
  public function index(Request $request){

    $clients = Client::when($request->search , function ($q) use ($request){
     return $q->where ('name', 'like','%'.$request->search .'%')
     ->orWhere ('phone', 'like','%'.$request->search .'%')
     ->orWhere ('address', 'like','%'.$request->search .'%');
    })->latest()->paginate(5);
    return view ('dashboard.clients.index',compact('clients'));
  //  return View::make ('dashboard.clients.index');
  }//end index

  public function create(){

    return view ('dashboard.clients.create');
  
}//end create

public function store(Request $request){
  $request->validate([

    'name'=> ' required',
    'phone'=> ' required|array|min:1',
    'phone.0'=> ' required',
    'address'=> 'required ',
  ]);

  $request_data = $request->all();
  $request_data ['phone'] =array_filter($request->phone);
  //dd($request_data);
  Client::create ($request->all());
  session()->flash('success', _('site.added_successfully'));
  return redirect()->route('dashboard.clients.index');

}//end store
public function edit(Client $client){

return view('dashboard.clients.edit', compact('client'));

}//end edit

public function update(Request $request, Client $client ){

    $request->validate([

        'name'=> ' required',
        'phone'=> ' required|array|min:1',
        'phone.0'=> ' required',
        'address'=> 'required ',
      ]);
    
      $request_data = $request->all();
      $request_data ['phone'] = array_filter($request->phone);
     
      $client->update($request_data);
      session()->flash('success', _('site.updated_successfully'));
      return redirect()->route('dashboard.clients.index');
    
}//end update
public function destroy(Client $client){
$client->delete();
session()->flash('sucess',_('site.deleted_successfully'));
return redirect()->route('dashboard.clients.index');

}//end destroy

}//end of controller 
