<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MainController extends Controller
{
    /**
     * Функция выводит представление главной страницы
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('index');
    }
}
