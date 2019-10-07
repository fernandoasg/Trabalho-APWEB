<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiasController extends Controller
{
    
    public function index(){
        return view('noticias');
    }

    public function mostra($idNoticia){
        //Pega a noticia pelo seu id no model e envia ela para a view
        
        //$noticia = Noticia::find($idNoticia);

        return view('noticia', [
            'nomeNoticia'=>'Seleção de bolsistas para o LEDES',
            'nomeEditor'=>'Chiquito',
            'data'=>'01 de setembro de 2019',
            'imgPath'=>'https://siai.ufms.br/img/logoLedes.png',
            'conteudoNoticia'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec dui nunc mattis enim ut tellus. Facilisis volutpat est velit egestas dui. Interdum velit laoreet id donec ultrices tincidunt arcu non. Diam maecenas ultricies mi eget mauris pharetra et ultrices. Lectus quam id leo in vitae turpis massa sed. Dolor sit amet consectetur adipiscing. Ultrices in iaculis nunc sed augue lacus. Consectetur purus ut faucibus pulvinar elementum integer enim neque volutpat. Viverra nam libero justo laoreet sit amet cursus. Proin nibh nisl condimentum id venenatis a condimentum vitae. Tortor id aliquet lectus proin. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus.

            Nunc sed blandit libero volutpat sed cras ornare arcu. Quis blandit turpis cursus in hac habitasse. Vehicula ipsum a arcu cursus vitae congue mauris rhoncus aenean. Et molestie ac feugiat sed lectus vestibulum. Nisl tincidunt eget nullam non nisi est sit amet. Orci nulla pellentesque dignissim enim. Sed lectus vestibulum mattis ullamcorper velit. Arcu non odio euismod lacinia at. Phasellus faucibus scelerisque eleifend donec pretium. Justo nec ultrices dui sapien eget mi proin sed libero. Aliquam ultrices sagittis orci a. Pellentesque elit eget gravida cum sociis natoque penatibus et. Molestie a iaculis at erat. Mauris pellentesque pulvinar pellentesque habitant. Tristique nulla aliquet enim tortor at. Quis enim lobortis scelerisque fermentum dui faucibus in ornare. Et ligula ullamcorper malesuada proin. Arcu odio ut sem nulla. Eget arcu dictum varius duis. Aliquet porttitor lacus luctus accumsan tortor.'
        ]);
    }
}
