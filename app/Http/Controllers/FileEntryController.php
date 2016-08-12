<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\FileEntry;

use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class FileEntryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        //$entries = FileEntry::all();
        //return view('fileentries.index', compact('entries'));
        return view('fileentries.index', ['galery_id' => $id]);
    }

    public function add($id) {

        //$file = Request::file('filefield');
        //$extension = $file->getClientOriginalExtension();//получение расширения загруженного файла
        //Storage::disk('local')->put('/postimages/'.$file->getFilename().'.'.$extension,  File::get($file));
        //$entry = new Fileentry();
        //$entry->mime = $file->getClientMimeType();
        //$entry->post_id = $id;
        //$entry->original_filename = $file->getClientOriginalName();
        //$entry->filename = $file->getFilename().'.'.$extension;
        //$entry->save();

        $file = Input::file('filefield');
        //$extension = $file->getClientOriginalExtension();//получение расширения файла
        //$name = $file->getClientOriginalName(); //получение имени с расширением
        //$tempname = $file->getFileName();// получение имени временного файла
        //$filename  = str_random(6) . '.' . $file->getClientOriginalExtension();
        $filename  = str_random(6) . '.' . $file->getClientOriginalExtension();
        If(!File::exists(public_path().'/images/galeryimages/' . $id))//проверка существования директории
            {
            File::makeDirectory(public_path().'/images/galeryimages/' . $id);
            }

        Image::make($file)->
        //resize(null, 200, function ($constraint)
        //{
        //    $constraint->aspectRatio();
        //    $constraint->upsize();
        //}
        //)->
        save(public_path() . '/images/galeryimages/' . $id . '/' . $filename);
        $entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->galery_id = $id;
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $filename;
        $entry->save();

        return redirect()->route('galery.index');


    }
    public function del($id)
    {
        //return ('/images/postimages/$id');
        Storage::disk('local')->delete('/galeryimages/'.$id);
        return redirect()->route('galery.index');
    }
}