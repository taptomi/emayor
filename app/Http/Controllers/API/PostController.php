<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'domain' => 'required'
        ]);

        $organization = Organization::where('domain', '=', $validated['domain'])->get(['id'])->first();

        if ($organization != null) {
            return Post::select('slug', 'title', 'content')->where('organization_id', '=', $organization->id)->get();
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Request $request)
    {

        $validated=$request->validate([
            'domain'=>'required'
        ]);

        $organization=Organization::where('domain','=',$validated['domain'])->get(['id'])->first();

        if($organization!=null){
            return Post::select('slug','title','content')->where('organization_id','=',$organization->id)->where('slug','=',$slug)->get()->first();
        }
        else{
            abort(404);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
