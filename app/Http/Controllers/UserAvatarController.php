<?php

namespace App\Http\Controllers;

use App\Live;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserAvatarController extends Controller
{
    public function index()
    {
        $disk = Storage::disk('gcs');

        // create a file
        $disk->put('avatars/test.txt', 'file Contents');
    }

   /**
     * Update the avatar for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
       

        $disk = Storage::disk('gcs');

        // create a file
        $disk->put('avatars',  $request->file('avatar'));

        $path = $request->file('avatar')->store('avatars');
        
        // get url to file
        $url = $disk->url($path);

 

         return $url;
    }
}
