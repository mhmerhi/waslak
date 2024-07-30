<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');

//        $loggedInUserId = Auth::user()->id;
//        $otherRequests = UserRequest::query()
//            ->with('user')
//            ->where('user_id', '!=', $loggedInUserId)
//            ->whereNull('approved_user_id')
//            ->get()
//            ->filter(function ($userRequest) use ($loggedInUserId) {
//                $matchingMedication = Medication::query()
//                    ->where('user_id', $loggedInUserId)
//                    ->where('name', $userRequest->name)
//                    ->where('quantity', '>=', $userRequest->quantity)
//                    ->where('expiration_date', '>=', Carbon::today()->startOfDay())
//                    ->first();
//
//                return !is_null($matchingMedication);
//            });
//
//        $userRequests = UserRequest::query()
//            ->where('user_id', $loggedInUserId)
//            ->whereNull('approved_user_id')
//            ->get();
//
//        $approvedRequests = UserRequest::query()
//            ->where('user_id', $loggedInUserId)
//            ->whereNotNull('approved_user_id')
//            ->get();
//
//        $requestsApprovedByUser = UserRequest::query()
//            ->where('user_id', '!=', $loggedInUserId)
//            ->where('approved_user_id', $loggedInUserId)
//            ->get();
//
//        return view('home', [
//            'otherRequests' => $otherRequests,
//            'requests' => $userRequests,
//            'approvedRequests' => $approvedRequests,
//            'requestsApprovedByUser' => $requestsApprovedByUser,
//        ]);
    }
}
