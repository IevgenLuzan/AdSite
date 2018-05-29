<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Ad;
use App\User;
use Illuminate\Support\Facades\Validator;
use DB;

class AdController extends Controller
{

    protected $title;
    protected $description;
    protected $ads;

    public function __construct()
    {

    }

    /*
     * Creates specific ad
     */

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|filled',
        ]);

        $request->user()->ads()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/');
    }

    /*
     * Returns specific ad
     */

    public function show($id)
    {
        $ad = DB::table('ads')
                ->where('ads.id', $id)
                ->join('users', 'users.id', '=', 'ads.user_id')
                ->select('ads.*', 'users.name')
                ->first();
        return view('ad')
                        ->with(['ad' => $ad]);
    }

    /*
     * Delets specific ad
     */

    public function delete($id)
    {
        $ad = Ad::find($id);
        $ad->delete();
        return redirect('/');
    }

    /*
     * Changes specific ad.
     */

    public function change(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
                    'title' => 'required|max:255',
                    'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                            ->withInput()
                            ->withErrors($validator);
        }
        $ad = Ad::find($id);
        $ad->title = $request->title;
        $ad->description = $request->description;
        $ad->save();
        return redirect('/');
    }

    /*
     * Return specific user's ads
     */

    public function userAds($id)
    {;
        $ads = DB::table('ads')
                ->where('user_id', '=', $id)
                ->join('users', 'users.id', '=', 'ads.user_id')
                ->select('ads.*', 'users.name')
                ->orderBy('ads.created_at', 'desc')
                ->paginate(5);
        return view('welcome', ['ads' => $ads]);
    }
    /*
     * Return all ads
     */

    public function main()
    {
        $ads = DB::table('ads')
                ->join('users', 'users.id', '=', 'ads.user_id')
                ->select('ads.*', 'users.name')
                ->orderBy('ads.created_at', 'desc')
                ->paginate(5);
        return view('welcome', ['ads' => $ads]);
    }

}
