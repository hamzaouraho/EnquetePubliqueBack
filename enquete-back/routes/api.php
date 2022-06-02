<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudesController;
use Illuminate\Support\Facades\DB;
use App\Models\Requete;
use App\Models\Document;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/etudes','EtudeController@getEtudes');  
Route::get('/etudes',function(){
    return DB::select('select * FROM public."documents"');
}); 
Route::get('/etudes/{id}',function($id){
    return DB::select('select * FROM public."documents" where id='.$id);
}); 
Route::get('/visualiser/{id}',function($id){
    return DB::select('select titre,id,perimetre FROM public."documents" where id='.$id);
}); 
Route::get('/situations/{id}',function($id){
    return DB::select('select situation,nom,tf,page,commentaire,image FROM public.requetes where "etudeId"='.$id);
}); 
Route::get('/situations',function(){
    return DB::select('select situation,nom,tf,page,commentaire,image FROM public.requetes');
}); 

Route::post('/createRequete',function(Request $req){
    $enquetes = new Requete();
    $enquetes->nom = $req->input('nom');
    $enquetes->tf = $req->input('tf');
    $enquetes->page = $req->input('page');
    $enquetes->commentaire = $req->input('commentaire');
    $enquetes->situation = $req->input('situation');
    $enquetes->image = $req->input('image');
    $enquetes->etudeId = $req->input('etudeId');
    

    $enquetes->save();
    // if($enquetes){
    //     abort(500,'error');
    // }
    return $enquetes;


    // $hamza = DB::select('insert into public."Requetes" (nom, tf, page, commentaire, situation) values (
    //     '. $req->input('nom').','.$req->input('tf').','.$req->input('page').','.$req->input('commentaire').','
    //     .$req->input('situation').')'
    // );
    // return response()->json($hamza);


}); 

Route::post('/createEtude',function(Request $req){
    $etude = new Document();
    $etude->titre = $req->input('titre');
    $etude->typeDoc = $req->input('typeDoc');
    $etude->intitule = $req->input('intitule');
    $etude->dateDebut = $req->input('dateDebut');
    $etude->commune = $req->input('commune');
    $etude->agenceUrba = $req->input('agenceUrba');
    $etude->pictureUrl = $req->input('pictureUrl');
    $etude->perimetre = $req->input('perimetre');
    // $etude->titre = "hamza";
    // $etude->typeDoc = "hamza";
    // $etude->intitule = "hamza";
    // $etude->dateDebut = "hamza";
    // $etude->commune = "hamza";
    // $etude->agenceUrba = "hamza";
    // $etude->perimetre = "hamza";
    // $etude->pictureUrl = "hamza";
    

    if($etude->titre && $etude->typeDoc && $etude->intitule && $etude->dateDebut && $etude->commune && $etude->agenceUrba && $etude->pictureUrl && $etude->perimetre){
        if($etude->save()){
            return "done";
        }else{
            return "error";
        }
    }else{
        return "error";
    }
    
    


    // $hamza = DB::select('insert into public."Etudes" (titre ,"typeDoc" ,intitule ,"dateDebut" ,commune ,"agenceUrba",perimetre ,"pictureUrl") 
    // values ("Plan de développement du centre de Ouled Sidi Abdelhakem",
    // "Hamza",
    // "Centre de Ouled Sidi Abdelhakem",
    // "20/04/2022",
    // "Beni-Mellalr",
    // "Agence urbaine de Beni-Mellal",
    // "{"type": "FeatureCollection","features": [{"type": "Feature","properties": {"titre": "Test 2", "commentaire" : "Test 2"},"geometry": {"type": "Polygon","coordinates": [[[-7.748364170296872, 33.676717359550544],[-7.701981331469458, 33.54608236897253],[-7.8625038087048855, 33.54709974391143],[-7.805846163981873, 33.67265388504684]]]}},{"type": "Feature","properties": {"titre": "Test 2", "commentaire" : "Test 2"},"geometry": {"type": "Polygon","coordinates": [[[-7.921707893969163, 33.51199325387591],[-7.755081945346564, 33.50385058783105],[-7.931473523625762, 33.41321172864439]]]}}]}",
    // "https://taamir.gov.ma/karazal/DownloadFile?gedId=79288173-5a32-4b7d-beaf-2db913fda7e6/dDYWXdhFNjdbQWzmREKJQTZ6WrdR4MCwS03PRnnm")');
    // return response()->json($hamza);


}); 


