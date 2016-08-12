<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Sentinel;
use Activation;
use Reminder;
use Validator;
use Mail;
use Storage;
use CurlHttp;

class AuthController extends Controller
{

    /**
     * Show login page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Show Register page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('auth.register');
    }


    /**
     * Show wait page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function wait()
    {
        return view('auth.wait');
    }


    /**
     * Process login users
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function loginProcess(Request $request)
    {
        try
        {
            $this->validate($request, ['email' => 'required|email', 'password' => 'required',]);//проверка на наличие переменных в массиве $request переданном из формы входа
            $remember = (bool) $request->remember;// устанавливается булевое значение переменной $request->remember из массиве $request переданного из формы входа
            if (Sentinel::authenticate($request->all(), $remember)) //функция аутентификации передаются аргументы $reques->all (login и password) и значение переменной запомнить ($remember)
            {
                return Redirect::intended('/'); //если функция authenticate вернула true то переход в корень /
            }
            $errors = 'Неправильный логин или пароль.';
            Redirect::back()//возврат к форме входа
                ->withInput()//возврат к форме + с введенными данными
                ->withErrors($errors); //возврат к форме + с сообщением об ошибке $errors;
        }

        catch (NotActivatedException $e)
        {
            $sentuser = $e->getUser();
            $activation = Activation::create($sentuser);
            $code = $activation->code;
            $sent = Mail::send('mail.account_activate', compact('sentuser', 'code'), function($m) use ($sentuser)
            {
                $m->from('mailer@phpwork.dp.ua', 'LaravelSite');
                $m->to($sentuser->email)->subject('Активация аккаунта');
            });

            if ($sent === 0)
            {
                return Redirect::to('login')
                    ->withErrors('Ошибка отправки письма активации.');
            }
            $errors = 'Ваш аккаунт не ативирован! Поищите в своем почтовом ящике письмо со ссылкой для активации (Вам отправлено повторное письмо). ';
            return view('auth.login')->withErrors($errors);
        }
        catch (ThrottlingException $e)
        {
            $delay = $e->getDelay();
            $errors = "Ваш аккаунт блокирован на {$delay} секунд.";
        }

        return Redirect::back()
           ->withInput()
           ->withErrors($errors);
    }


    /**
     * Process register user from site
     *
     * @param Request $request
     * @return $this
     */
    public function registerProcess(Request $request)
    {
        $this->validate($request, [//проверка всех необходимых переменных в массиве $request переданном из формы регистрации
            'email' => 'required|email',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);
        $input = $request->all();// массив данных передаем в переменную $input
        $credentials = [ 'email' => $request->email ]; //присваиваем значения поля email
        if($user = Sentinel::findByCredentials($credentials)) //проверяем наличие записи пользователя с таким email
        {
            return Redirect::to('register')
                ->withErrors('Такой Email уже зарегистрирован.'); //возврат к регистрации если такой email уже есть
        }

        if ($sentuser = Sentinel::register($input))//создание пользователя $sentuser
        {
            $activation = Activation::create($sentuser);//создание записи активации для пользователя
            $code = $activation->code; //получение сгенерированного кода активации
            $sent = Mail::send('mail.account_activate', compact('sentuser', 'code'), function($m) use ($sentuser)// отправка содержимого вида mail.account_activate (id и кода активации)
            {
                $m->from('mailer@phpwork.dp.ua', 'LaravelSite');
                $m->to($sentuser->email)->subject('Активация аккаунта');
            });
            if ($sent === 0)
            {
                return Redirect::to('register')
                    ->withErrors('Ошибка отправки письма активации.');
            }

            $role = Sentinel::findRoleBySlug('user');// поиск роли user и ее присвоение в $role
            $role->users()->attach($sentuser);//присвоение роли $role пользователю $sentuser

            return Redirect::to('login')
                ->withSuccess('Ваш аккаунт создан. Проверьте Email для активации.')
                ->with('userId', $sentuser->getUserId());
        }
        return Redirect::to('register')
            ->withInput()
            ->withErrors('Failed to register.');
    }


    /**
     *  Activate user account by user id and activation code
     *
     * @param $id
     * @param $code
     * @return $this
     */
    public function activate($id, $code)
    {
        $sentuser = Sentinel::findById($id);//поиск пользователя по id

        if ( ! Activation::complete($sentuser, $code))
        {
            return Redirect::to("login")
                ->withErrors('Неверный или просроченный код активации.');
        }

        return Redirect::to('login')
            ->withSuccess('Аккаунт активирован.');
    }


    /**
СБРОС ПАРОЛЯ
     */
    public function resetOrder()//форма сброса пароля
    {
        return view('auth.reset_order');
    }


    public function resetOrderProcess(Request $request)//процесс после получения данных из формы сброса
    {
        $this->validate($request, ['email' => 'required|email',]);//проверка что указан почтовый ящик
        $email = $request->email; //присвоение переменной email из массива request
        $sentuser = Sentinel::findByCredentials(compact('email'));//поиск пользователя по email
        if ( ! $sentuser)
        {
            return Redirect::back()
                ->withInput()
                ->withErrors('Пользователь с таким E-Mail в системе не найден.');
        }
        $reminder = Reminder::exists($sentuser) ?: Reminder::create($sentuser);//проверяем создана ли запись сброса, если нет, создаем
        $code = $reminder->code;//получаем код для сброса

        $sent = Mail::send('mail.account_reminder', compact('sentuser', 'code'), function($m) use ($sentuser)
        {
            $m->from('mailer@phpwork.dp.ua', 'SiteLaravel');
            $m->to($sentuser->email)->subject('Сброс пароля');
        });
        if ($sent === 0)
        {
            return Redirect::to('reset')
                ->withErrors('Ошибка отправки email.');
        }
        return Redirect::to('wait');
    }


    public function resetComplete($id, $code)//пользователь получил письмо и нажал на ссылку сброса пароля, переход к форме
    {
        $user = Sentinel::findById($id);
        return view('auth.reset_complete');
    }


    public function resetCompleteProcess(Request $request, $id, $code)//получение из массива request новых введенных данных
    {
        $this->validate($request, [
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);
        $user = Sentinel::findById($id);
        if ( ! $user)
        {
            return Redirect::back()
                ->withInput()
                ->withErrors('Такого пользователя не существует.');
        }
        if ( ! Reminder::complete($user, $code, $request->password))
        {
            return Redirect::to('login')
                ->withErrors('Неверный или просроченный код сброса пароля.');
        }
        return Redirect::to('login')
            ->withSuccess("Пароль сброшен.");
    }

    /**
     * @return mixed
     */
    public function logoutuser()
    {
        Sentinel::logout();
        return Redirect::intended('/');
    }

}