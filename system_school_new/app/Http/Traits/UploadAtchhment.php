<?php 
namespace App\Http\Traits;
use Illuminate\Support\Facades\Storage;
trait UploadAtchhment{
   public function uploaddeFile($request,$name,$folder){
$file=$request->file($name)->getClientOriginalName();
$request->file($name)->storeAs('upload_attachments/'.$folder.'/',$file,'upload_attachments');
   }
   public function DeleteFile($name,$File_Name){
    $file=Storage::disk('upload_attachments')->exists('upload_attachments/'.$File_Name.'/'.$name);
    if($file){
        Storage::disk('upload_attachments')->delete('upload_attachments/'.$File_Name.'/'.$name);
    }
   }
}