<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Publication;


class UserControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('users.login_form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $publication = Publication::findOrFail($id);
        
        //OWER publication
        $user = User::where('id', $publication->user_id)->first()->toArray();

        return view('users.publisher', ['user' => $user]);
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Reveal the identity of the publication owner
     * @
     */
    public function reveal($id){

        $user =  auth()->user();

        foreach($user->payedPosts as $publication){
            if($publication->id == $id){
                return redirect('/user/show/'.$id);
            }
        }
        
        return view('users.reveal_users', ['price'=>Publication::PRICE, 'publication_id' => $id]);
     
    }

    /**
     * Email a message to the company
     */
    public function sendMail(){

        $user =  auth()->user();
        
        return view('contactUs', ['user' =>$user]);
    }


    /**
     * Mailing
     */
    public function mailing(Request $request){
        
        $errorMSG = "";
        // dd($request);

        // NAME
    
        if (empty($request->name)) {
            $errorMSG = "Name is required ";
        } else {
            $name = $request->name;
        }

        // EMAIL
        if (empty($request->email)) {
            $errorMSG .= "Email is required ";
        } else {
            $email = $request->email;
        }



        // MESSAGE
        if (empty($request->message)) {
            $errorMSG .= "Message is required ";
        } else {
            $message = $request->message;
        }

        // EMAIL
        if (empty($request->number)) {
            $errorMSG .= "Number is required ";
        } else {
            
            $number = $request->number;
        }


        $EmailTo = "olaiaaly@gmail.com";
        $Subject = "New Message Received";

        // prepare email body text
        $Body = "";
        $Body .= "Name: ";
        $Body .= $name;
        $Body .= "\n";
        $Body .= "Email: ";
        $Body .= $email;
        $Body .= "\n";
        $Body .= "Numero de celular: ";
        $Body .= $number;
        $Body .= "\n";
        $Body .= "Message: ";
        $Body .= $message;
        $Body .= "\n";

        // send email
        $success = mail($EmailTo, $Subject, $Body, "From:".$email);

        // redirect to success page
        if ($success && $errorMSG == ""){
            return redirect('/user/contact')->with('msg', 'Mensagem submetida com sucesso!');
        }else{

            return redirect('/user/contact')->with('msg', 'Algo deu errado na submissão da messagem! '.$errorMSG);      
        }
    }

}