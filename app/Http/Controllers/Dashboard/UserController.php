<?php

namespace app\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Auth;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Users = User::where('type', 'users')->sortable()->paginate(15);

        return view('dashboard/user/users', ['Users' => $Users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $User = Sentry::findUserById($id);
        $groups = Sentry::findAllGroups();
        $thisgroup = $User->getGroups();

        return view('dashboard/user/usersEdit', ['user' => $User, 'groups' => $groups, 'thisgroup' => $thisgroup]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(UserUpdateRequest $request)
    {
        $user = Auth::user();
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();

        return redirect()->route('dashboard.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(UserRequest $request)
    {
        try {
            // Find the user using the user id
            $user = Sentry::findUserById($request->id);

            // Delete the user
            $user->delete();

            Session::flash('good', 'Вы удалили пользователя.');

            return redirect()->route('dashboard.user.index');
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            echo 'User was not found.';
        }
    }
}
