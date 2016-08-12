<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Angrydeer\Attachfiles\AttachableTrait;
use Angrydeer\Attachfiles\AttachableInterface;
use Sentinel;

class Post extends Model implements AttachableInterface

{
    use AttachableTrait;

    protected $table = 'posts';
    protected $fillable = ['title', 'author', 'user_id', 'content', 'photos', 'published', 'published_at', 'created_at', 'updated_at'];
    //protected $guarded = ['_token'];

    public function getPhotosAttribute($value)
    {
        return array_pluck($this->attaches()->get()->toArray(), 'filename');
    }

    public function setPhotosAttribute($images)
    {
        $imgtitles = Request::get('imgtitle');
        $imgalts = Request::get('imgalt');
        $imgdescs = Request::get('imgdesc');
        $this->save();
        $i=0;
        foreach($images as $image)
        {
            $this->updateOrNewAttach($image, $imgtitles[$i], $imgalts[$i], $imgdescs[$i]);
            $i++;
        }

        /*
        * Очистка мусора за собой.  Функция updateOrNewAttach за собой приберает, но  могут оставаться картинки, которые не были поданы в сохранение
        *(редактировали категорию, перебрали кучу картинок, в конце концов отменили
        * сохранениe)
        * Для этого и нужен id админа, чтобы чистил за собой а не общую папку аплоадс
        * может в этот момент еще кто-то что-то правит.
        */

        $path = config('admin.imagesUploadDirectory').'/'.Sentinel::check()->id;
        $files = glob(public_path($path)."/*");
        if (count($files) > 0) {
            foreach ($files as $file) {
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        }


        $this->keepOnly($images);
    }

}
