<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Order;
use App\Restorant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
    public function my_restaurants()
    {
        //zemi id na korisnik koj e najaven
        $user_id = auth()->user()->id;
//        dd($user_id);
        // najdi gi site naracki za toj korisnik i grupiraj gi po restoran za da gi zemes restoranite
//        $someVariable = Input::get("some_variable");

        $results = DB::select( DB::raw("select r.id from restorants r
inner join orders o
on o.restorant_id=r.id WHERE o.client_id= :user_id group by o.restorant_id" ), array(
            'user_id' => $user_id,
        ));
        $restaurants = Restorant::all();
//dd($restaurants);
        //prikazi gi site restorani za toj korisnik, za da moze da se klika po restorani da si gi gleda narackite.
//        dd($results);

        return view('profile.my_restaurants',['restorani' => $results, 'restorani_obicni' => $restaurants ]);

    }
    public function my_restaurant($id)
    {
        $user_id = auth()->user()->id;

//        $results = DB::select( DB::raw("select * from orders o
// WHERE o.restorant_id= :restorant_id and o.client_id= :user_id" ), array(
//            '	restorant_id' => $id, 'user_id' => $user_id
//        ));
$orders_from_restorant_by_client = DB::select( DB::raw("SELECT * FROM orders o
 WHERE o.restorant_id='$id' and o.client_id= '$user_id' GROUP BY o.id "));

$restaurants = Restorant::all();

//dd($orders_from_restorant_by_client);

        $results = DB::select( DB::raw("SELECT o.id as order_id, r.name as rest_name, i.name as item_name, o.payment_method as nacin_na_plakanje, o.payment_status as plakanje_status,
        o.delivery_price as cena_dostava, o.order_price as cena_naracka
 FROM orders o
inner join order_has_items ohi
on ohi.order_id=o.id
inner join items i
on i.id=ohi.item_id
inner join restorants r
on r.id=o.restorant_id
 WHERE o.restorant_id='$id' and o.client_id= '$user_id' "));
//        dd($results);

        return view('profile.my_retaurant',['naracki_od_restoran' => $results, 'naracki_od_restorani_po_klient' => $orders_from_restorant_by_client, 'restorani' => $restaurants ]);
    }
}
