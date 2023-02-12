<?php

namespace App\Http\Controllers;

use App\Models\CommunityLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Channel;
use App\Http\Requests\CommynityLinkForm;


class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel = null)
    {
        $title = null;

        if ($channel == null) {

            $links = CommunityLink::where('approved', true)->latest('updated_at')->paginate(25);
            
        } else {

            $links = $channel->communitylinks()->where('approved', true)->latest('updated_at')->paginate(25);

            $title = '- ' . $channel->title;
        }

        $channels = Channel::orderBy('title', 'asc')->get();

        return view('community/index', compact('links', 'channels', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channels = Channel::orderBy('title', 'asc')->get();
        return view('community/create', compact('channels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $this->validate($request, (new CommynityLinkForm)->rules());
        $link = new CommunityLink();
        $link->user_id = Auth::id();

        if ($link->hasAlreadyBeenSubmitted($request->link)) {
            return back()->with('success', 'Link added successfully');
        }

        $approved = Auth::user()->trusted ? true : false;

        $request->merge(['user_id' => Auth::id(), 'approved' => $approved]);

        CommunityLink::create($request->all());

        return back()->with('success', 'Link added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommunityLink  $communityLink
     * @return \Illuminate\Http\Response
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommunityLink  $communityLink
     * @return \Illuminate\Http\Response
     */
    public function edit(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommunityLink  $communityLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommunityLink  $communityLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}
