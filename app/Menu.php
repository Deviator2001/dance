<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    protected $table = 'menus';//указываем с какой таблицей базы данных работает данная модель (menu.php)

    public function getLeftMenu()
    {
        return $this ->orderBy('weight')->published()->left()->get();
    }

    public function getRightMenu()
    {
        return $this ->orderBy('weight')->published()->right()->get();
    }

    public function scopePublished($query)
    {
        $query->where(['active'=>'1']);
    }

    public function scopeLeft($query)
    {
        $query->where(['position'=>'left']);
    }
    public function scopeRight($query)
    {
        $query->where(['position'=>'right']);
    }
}
