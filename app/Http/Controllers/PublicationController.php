<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

use App\Models\User;



class PublicationController extends Controller
{

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search   = request('seach');
        if($search){
            $publications = Publication::where([
              [ 'item', 'like', '%'.$search.'%'] 
            ])->get();

        }else {
            $publications = Publication::all(); 
        }
        
        return view('publications.publications', ['publications'=> $publications, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publications.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     
        $publication = new Publication;

        $publication->item = $request->item;
        
        $publication->province = $request->province;
        
        $publication->city = $request->city;

        $publication->description = $request->description;
        
        $publication->date = $request->date;

        $publication->type = $request->type;

        $publication->reference = md5($publication->item .$publication->province .date(DATE_RFC822));

        //IMAGE UPLOAD
        if($request->hasFile('picture') &&  $request->file('picture')->isValid()){

            $requestImage = $request->picture;

            $extention = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() .strtotime('now')) . "." . $extention;

            $requestImage->move(public_path('img/publications'), $imageName);

            $publication->picture = $imageName;
        }

        $user = auth()->user();
        $publication->user_id = $user->id;

        $publication->save();

        $user->publicationsAsParticipant()->attach($publication->id);


        return redirect('/publication')->with('msg', 'Publicação criada com sucesso!');


    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        


        $publication = Publication::findOrFail($id);

        // dd($publication);
        
        return view('publications.single_publication', ['publication' => $publication, 'price' =>Publication::PRICE]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publication = Publication::findOrFail($id);

        return view('publications.form_edit', ['publication' => $publication]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {

        $data = $request->all();

        if($request->hasFile('picture') &&  $request->file('picture')->isValid()){

            $requestImage = $request->picture;

            $extention = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() .strtotime('now')) . "." . $extention;

            $requestImage->move(public_path('img/publications'), $imageName);

            $data['picture'] = $imageName;
        }

        Publication::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Publicação editado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        $file = $publication->picture;
        
        $user = auth()->user();
    
        $user->publicationsAsParticipant()->detach([$id]);

        $publication->delete();

        // chdir()-> changes the dir
        chdir("img/publications");
        //getcwd() -> gets the current dir
         if (!unlink($file)){
         // echo ("Error deleting $file");
          return redirect('/dashboard')->with('msg', 'Algo deu errrado ao deletar o publicacao!');
        }
        else {

            return redirect('/dashboard')->with('msg', 'Publicação foi eliminada com sucesso!');
        }
    }


    /**
     * Funcao responsavel por retornar as publicacoes feitas pelo usuario;
     * @return [View Dashbord]
     * @return [ArrayPublication]
     */
    public function dashboard(Request $request){

        $user = auth()->user();

        $publications = $user->publications;

        return view('publications.dashboard', ['publications' => $publications]);

    }
}