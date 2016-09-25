<?php

namespace App\Http\Controllers;

use Request;
use DateTime;
use App\Http\Requests;

class PagesController extends Controller
{
    public function home()
    {
        if (\Session::has('sent'))
        {
            $sent = \Session::get('sent');
            return view('welcome')->with('sent', $sent);
        }
        else
        {
            return view('welcome');
        }
    }

    public function account()
    {
        return view('account');
    }

    public function logout()
    {
        $authorized = false;
        \Session::set('authorized', $authorized);
        \Session::set('username', "");
        return \Redirect::to('/login');
    }

    public function about()
    {
        return view('about');
    }

    public function login()
    {
        $response = "null";
        $input = Request::all();
        if(isset($input) && count($input) > 0)
        {
            $password = $input['password'];
            $password = md5($password);

            $users = \DB::table('users')->select('username')->where([
                    ['username', '=', $input['username']],
                    ['password', '=', $password],
                ])->get();

            if(count($users) >= 1)
            {
                $response = "Logged in!";
                $authorized = true;
                \Session::set('authorized', $authorized);
                \Session::set('username', $input['username']);
                return \Redirect::to('/account');
            }
            else
            {
                $response = "Username or password is incorrect.";
            }
        }

        return view('login') -> with('response', $response);
    }

    public function register()
    {
        $response = "null";
        $input = Request::all();
        if(isset($input) && count($input) > 0)
        {
            $password = $input['password'];
            $password = md5($password);

            $existingUsers = \DB::table('users')->select('username')->where('username', '=', $input['username'])->get();
            if(count($existingUsers) <= 0)
            {
                \DB::table('users')->insert(
                    ['name' => $input['name'], 'email' => $input['email'], 'username' => $input['username'], 'password' => $password, 'created_at' => new DateTime, 'updated_at' => new DateTime]
                );

                $sent = app('App\Http\Controllers\PagesController')->sendEmail("accounts", "S-SCRUM Contact",
                ("Hello, " . $input['name'] . " thank you for registering to S-SCRUM. We hope to provide the best service you'll ever witness.")
                , $input['email']);
                $response = "Successfully created account, please login";
            }
            else
            {
                $response = "The username chosen is already in use...";
            }
        }
        
        return view('register') -> with('response', $response);
    }

    public function sendEmail($from, $subject, $body, $target)
    {
        $sent = false;
        $mail = new \PHPMailer;
        $mail->From = $from + "@sscrum.com";
        $mail->FromName = "S Scrum";
        $mail->AddAddress($target);
        $mail->Subject = $subject;
        $mail->IsHTML = true;
        $mail->Body = $body;
        $mail->IsSMTP();
        $mail->Port = 587;
        $mail->Host = "smtp.gmail.com";
        // optional
        // used only when SMTP requires authentication  
        $mail->SMTPAuth = true;
        $mail->Username = 'sscrum.contact';
        $mail->Password = 'contactMe';

        $sent = false;
        if($mail->send())
        {
            $sent = true;
        }
        return $sent;
    }

    public function send()
    {
        $input = Request::all();

        $sent = app('App\Http\Controllers\PagesController')->sendEmail("contact", "S-SCRUM Contact", ($input['name'] . "\r\n" . $input['email'] . "\r\n" . $input['message']), "armi.sam99@gmail.com");

        return \Redirect::to('/')->with('sent', $sent);
    }
}
