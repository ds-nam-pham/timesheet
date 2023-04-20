<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\ChangePasswordRequest;
use App\Models\User;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Mail\SendMail;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    protected $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
        // $this->authorizeResource(User::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $result = $this->userService->filter($request);
        } else {
            $result = $this->userService->getList();
        }
        return view('user.index',['users' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', Auth::user());
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $result = $this->userService->addUser(
           array_merge($request->validated(),[
               'avatar' => $request->avatar,
               'description' => $request->description,
           ]
           )
        );
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\User\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // $this->authorize('update', $user);
        $result = $this->userService->editUser($request->all(), $user);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $result = $this->userService->delete($user);
        return redirect()->route('user.index');
    }

    public function userTimesheets(User $user){
        return view('user.timesheets', [
            'userTimesheets' => $user->timesheets
        ]);
    }

    public function changePassword()
    {
        return view('user.chang_password');
    }

    public function updateChangePassword(ChangePasswordRequest $request,User $user){
        $result = $this->userService->changePassword($request->all(), $user);
        if($result) {
            return redirect()->route('user.index');
        } else {
            return back()->with("error", "Old Password Doesn't match!");
        }
    }

    public function filter(Request $request)
    {
        $user = User::query();
        dd($request->has('name'));
        if ($request->has('name')) {
            $user->where('name', 'LIKE', '%' . $request->name . '%');
        }
        dd($user->get());
    }
}
