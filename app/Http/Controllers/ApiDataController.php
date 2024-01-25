<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Stack;
use App\Models\Work;
use App\Notifications\TelegramNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class ApiDataController extends Controller
{
    public function AllWorks()
    {
        if(app()->getLocale() == 'ru') {
            $works = \App\Models\Work::select([
                'id',
                'title',
                'desc_card',
                'desc_full',
                'text_detailed_1',
                'text_detailed_2',
                'link',
                'stacks',
                'order',
                'created_at',
                'updated_at',
            ])->get();
        } else {
            $works = \App\Models\Work::select([
                'id',
                'title_en as title',
                'desc_card_en as desc_card',
                'desc_full_en as desc_full',
                'text_detailed_1_en as text_detailed_1',
                'text_detailed_2_en as text_detailed_2',
                'link',
                'stacks',
                'order',
                'created_at',
                'updated_at',
            ])->get();
        }

        // Добавим ссылки на медиа в каждый элемент работы
        $works->each(function ($work) {
            $work->work_examples = $work->getMedia('work_examples')->map(function ($media) {
                return $media->getUrl();
            });

            $work->cover_full = $work->getFirstMediaUrl('work_cover_full');
            $work->cover_card = $work->getFirstMediaUrl('work_cover_card');

            $work->cover_desc_detailed_1_small = $work->getFirstMediaUrl('cover_desc_detailed_1_small');
            $work->cover_desc_detailed_1_full = $work->getFirstMediaUrl('cover_desc_detailed_1_full');
            $work->cover_desc_detailed_2_small = $work->getFirstMediaUrl('cover_desc_detailed_2_small');
            $work->cover_desc_detailed_2_full = $work->getFirstMediaUrl('cover_desc_detailed_2_full');

            $stacks = [];
            if ($work['stacks']) {
                foreach ($work['stacks'] as $stack) {
                    $fstack = Stack::where('name', $stack)->first();
                    $stacks[] = [
                        'name' => $fstack['name'],
                        'color' => $fstack['color']
                    ];
                }
            }

            $work->stacks = $stacks;

        });

        return response()->json($works);
    }

//    public function Work($id)
//    {
//
//        $id = intval($id);
//        $work = \App\Models\Work::where('id', $id)->first();
//        // Добавим ссылки на медиа в каждый элемент работы
//        $work->work_examples = $work->getMedia('work_examples')->map(function ($media) {
//            return $media->getUrl();
//        });
//        $work->cover_full = $work->getFirstMediaUrl('work_cover_full');
//        $work->cover_card = $work->getFirstMediaUrl('work_cover_card');
//        $work->cover_desc_detailed_1_small = $work->getFirstMediaUrl('cover_desc_detailed_1_small');
//        $work->cover_desc_detailed_1_full = $work->getFirstMediaUrl('cover_desc_detailed_1_full');
//        $work->cover_desc_detailed_2_small = $work->getFirstMediaUrl('cover_desc_detailed_2_small');
//        $work->cover_desc_detailed_2_full = $work->getFirstMediaUrl('cover_desc_detailed_2_full');
//
//        $stacks = [];
//        if ($work['stacks']) {
//            foreach ($work['stacks'] as $stack) {
//                $fstack = Stack::where('name', $stack)->first();
//                $stacks[] = [
//                    'name' => $fstack['name'],
//                    'color' => $fstack['color']
//                ];
//            }
//        }
//
//
////        dd($stacks);
//        $work->stacks = $stacks;
//
////        $work->stacks = json_decode($work->stacks);
////
////        dd($work);
//////
//        return response()->json($work->toArray());
//    }

    public function via($notifiable)
    {
        return ["telegram"];
    }

    public function MakeContact(Request $request)
    {
//        Contact::create([
//            'name' => $request->name,
//            'contacts' => $request->contacts,
//            'desc' => $request->desc
//        ]);

        // Оповещение нам в телеграм
        $title = '💥 *Новая заявка на сайт* 💥';
        $text = "*Имя:* {$request->name} \n*Контакты:* {$request->contacts} \n*Описание:* {$request->desc}";

        // Посылаем Telegram уведомление нам
        Notification::route('telegram', '-4027489048')
            ->notify(new TelegramNotification($title, $text));

        return response()->json(['message' => "OK"]);
    }
}
