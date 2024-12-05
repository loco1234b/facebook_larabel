<?php 
 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;
 
 class SolicitudAmistad extends Model
 {
     // Relación con el modelo User (Usuario que envía la solicitud)
     public function usuarioEmisor()
     {
         return $this->belongsTo(User::class, 'idUsuarioEmisor');
     }
 
     // Relación con el modelo User (Usuario que recibe la solicitud)
     public function usuarioReceptor()
     {
         return $this->belongsTo(User::class, 'idUsuarioReceptor');
     }
 }