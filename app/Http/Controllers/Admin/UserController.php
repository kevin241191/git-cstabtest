<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Requests\submitdefineAccessRequest;
use App\Models\ResetCodePassword;
use App\Models\User;
use App\Notifications\SendEmailToAdminAfterRegistrationNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $user = new User();
        return view('admin.user.form', [
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        try {

            //logique de création de compte
            $user = new User();

            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->password = Hash::make('default');
            $user->phone = $request->phone;
            $user->role = $request->role;

            $user->save();

            // Envoyer un mail pour que l'utilisateur puisse confirmer son compte

            if ($user) {
                try {
                    ResetCodePassword::where('email', $user->email)->delete();
                    $code = rand(1000, 4000);

                    $data = [
                        'code' => $code,
                        'email' => $user->email
                    ];

                    ResetCodePassword::create($data);

                    Notification::route('mail', $user->email)->notify(new
                        SendEmailToAdminAfterRegistrationNotification($code, $user->email));
                } catch (Exception $e) {
                    dd($e);
                    throw new Exception('Une erreur est survenue lors de l\'envoie de l\'email');
                }
            }

            //Redigerer l'utilisateur vers une URL
            return redirect()->route('adminuser.index')->with('success_message', 'Utilisateur ajouté');
        } catch (Exception $e) {
            dd($e);
            throw new Exception('Une erreur est survenue lors de la création de ce administrateur');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            // $user->sexe = $request->sexe;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role = $request->role;

            $user->update();

           return redirect()->route('adminuser.index')->with('success_message', 'Les informations de l\'administrateur ont été mise à jour');

         } catch (Exception $e) {
             dd($e);
         }
    }


    public function delete(User $user)
    {
        dd($user);
        try {

            $connectedAdmin = Auth::user()->id;

            if ($connectedAdmin <> $user->id) {
                $user->delete();
                return redirect()->back()->with('success_message', 'L\'administrateur a été retité');
            } else {
                return redirect()->back()->with('error_message', 'Vous ne pouvez pas supprimmer votre compte administrateur');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function defineAccess($email)
    {
        // dd($email);
        $chechUserExist = User::where('email', $email)->first();

        if ($chechUserExist) {
            return view('auth.validate-account', compact('email'));
        } else {
            return redirect()->route('login');
        }
    }

    public function submitDefineAccess(submitdefineAccessRequest $request)
    {
        try {

            $user = User::where('email', $request->email)->first();

            if ($user) {
                $user->password = Hash::make($request->password);
                $user->email_verified_at = Carbon::now();
                $user->update();

                //Si la mise à jour s'est fait correctement du password
                if ($user) {
                    $exitingCode = ResetCodePassword::where('email', $user->email)->count();

                    if ($exitingCode >= 1) {
                        ResetCodePassword::where('email', $user->email)->delete();
                    }
                }

                return redirect()->route('login')->with('success_message', 'Vos accès ont été correctement défini');
            } else {
                //404
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
