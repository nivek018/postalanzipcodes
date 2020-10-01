<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iluunimate\Http\Input;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class CreateZipcodeController extends Controller
{
    //
    public function create_zip(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'region'        => 'required|max:255',
            'address'       => 'required|max:255',
            'zipcode'       => 'required|alpha_num|max:4',
            'contributor'   => 'max:255',
        ]);

        if ($validator->fails()) {

            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 200);

        }
        else {

            $insert = 
                        DB::table('postal_contribution')
                        ->insert([

                            'region'        => $request->region,
                            'address'       => $request->address,
                            'zipcode'       => $request->zipcode,
                            'contributor'   => $request->contributor

                        ]);

            if ($insert) {

                $data = [
                    'success'   => true,
                    'msg'       => sprintf('You are awesome! <strong>%s</strong> your contribution is much appreciated.', ($request->contributor ?? ''))
                ];

            }
            else {
            
                $data = [
                    'success' => false
                ];
            }
            
            return $data;
            
        }

    }
    
}
