<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Добавление сообщения
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {
        $data = $request->all();
		$validator = $this->validator($data);
        if (!$validator->fails() && Auth::check()) {
            $this->create($data);
        } else {
            return redirect()->route('index')->withErrors($validator);
        }
        return redirect()->route('index');
    }

    /**
     * Удаление сообщения
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Request $request)
    {
        $data = $request->all();
        $message = Message::find($data['id']);
        if ($message->user_id == Auth::user()->id || Auth::user()->is_admin) {
            $message->delete();
        }
        return redirect()->route('index');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'content' => 'required|string',
        ]);
    }

    /**
     * Сохранение сообщения в базе
     *
     * @param array $data
     * @return bool
     */
    protected function create(array $data)
    {
        $message = new Message();
        $message->user_id = Auth::user()->id;
        $message->content = $data['content'];
        return $message->save();
    }
}
