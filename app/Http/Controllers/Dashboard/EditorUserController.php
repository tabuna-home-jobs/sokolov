<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Dashboard\EditorUserRequest;
use App\Models\Category;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class EditorUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Editors = User::where('type', 'editor')->paginate(15);
        return view("dashboard/editor/index", [
            'Editors' => $Editors,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $skills = Category::all();
        return view("dashboard/editor/create", [
            'Skills' => $skills
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(EditorUserRequest $request)
    {
        $user = new User([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => 'editor,'
        ]);
        $user->type = 'editor';
        $user->password = bcrypt($request->password);
        $user->addRole(['user', 'editor']);
        $user->save();

        $skills = [];
        foreach ($request->skills as $skill) {
            array_push($skills, new Skills(['category_id' => $skill]));
        }

        $user->getSkills()->saveMany($skills);
        Session::flash('good', 'Вы успешно добавили редактора');
        return redirect()->route('dashboard.editor.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $skills = Category::all();
        $user = User::findOrFail($id);
        $SelectSkills = $user->getSkills()->get();

        $MegaArray = [];

        foreach ($skills as $value) {
            foreach ($SelectSkills as $Select) {
                if ($value->id == $Select->category_id) {
                    $MegaArray = array_add($MegaArray, $value->id, [
                        'id' => $value->id,
                        'name' => $value->name,
                        'select' => true
                    ]);

                }
            }
        }

        /*
        foreach ($skills as $value) {
            foreach ($SelectSkills as $Select) {
                if ($value->id != $Select->id) {
                    $MegaArray = array_add($MegaArray, $value->id, [
                        'id' => $value->id,
                        'name' => $value->name,
                        'select' => false
                    ]);
                }
            }
        }
*/

        return view("dashboard/editor/edit", [
            'User' => $user,
            'Skills' => $MegaArray
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(EditorUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        Skills::where('user_id', $user->id)->delete();


        $user->fill([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => 'editor,'
        ]);
        $user->type = 'editor';

        if (!empty($request->password))
            $user->password = bcrypt($request->password);

        $user->save();

        $skills = [];
        foreach ($request->skills as $skill) {
            array_push($skills, new Skills(['category_id' => $skill]));
        }

        $user->getSkills()->saveMany($skills);
        Session::flash('good', 'Вы успешно изменили редактора');
        return redirect()->route('dashboard.editor.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('good', 'Вы успешно удалили редактора');
        return redirect()->route('dashboard.editor.index');
    }
}
