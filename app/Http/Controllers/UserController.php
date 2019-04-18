<?php
/**
 * Created by PhpStorm.
 * User: Laura
 * Date: 30.03.2019
 * Time: 21:40
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $admins = User::paginate(10);
        return view('admin', compact('admins'));
    }

    public function store()
    {
        $admins = User::all();
        return view('profile-admin', compact('admins'));
    }

    public function getById($id)
    {
        $admin = User::find($id);
        return view('modals.modal-admin', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        User::find($id)->update($request->all());
        return ['success' => true];
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return ['success' => true];
    }

    /**
     * Update user status
     *
     * @param Request $request
     * @param $id
     *
     * @return array
     */
    public function status(Request $request, $id)
    {
        User::find($id)->update($request->all());

        return ['success' => true];
    }

}