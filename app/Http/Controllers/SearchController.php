<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use App\BlackList;

class SearchController extends Controller
{
    //

    /**********
     * | Search
     * | асинхронный поиск по средством get запросов и обработчика searchArticle() в app.js
     ***************/
    public function search(Request $request)
    {

        if ($request->ajax()) {
            $output = "";


            $blacklist = BlackList::where('name', 'LIKE', '%' . $request->search . "%")
                ->orderBy('id', 'desc')
                ->where('status', 'on')->get();


            if ($blacklist) {

                foreach ($blacklist as $list) {
                    if ($list->category == 'doctors') {
                        $output .= '<div class="col-12 col-sd-12 col-md-12 blacklist rounded-lg pr-2 pr-md-5 pl-2 pl-md-4 pt-2 pt-md-3 pb-2 pb-md-3">';
                        $output .= '<div class="d-flex align-items-start">';
                        if ($list->photo != NULL) {
                            $output .= '<img src="' . $list->photo . '" alt="avatar" class="rounded-circle userphoto">';
                        } else {
                            $output .= '<img src="' . asset('img/list/user.jpg') . '" alt="avatar"  class="rounded-circle userphoto">';
                        }

                        $output .= '<div class="ml-4 ml-md-5">';
                        $output .= '<input type="checkbox" id="comment' . $list->id . '" class="position-absolute comment-checkbox">';
                        $output .= '<label for="comment' . $list->id . '">';
                        $output .= '<h4 class="text-light">' . $list->name . '</h4>';
                        $output .= '<p class="m-0 text-light">';
                        $output .= '<span class="color-main">Компания:</span>';
                        $output .= $list->company;
                        $output .= '</p>';
                        $output .= '<p class="m-0 text-light">';
                        $output .= '<span class="color-main">Адрес работы:</span>';
                        $output .= $list->address;
                        $output .= '</p>';
                        $output .= '<p class="m-0 text-light">';
                        $output .= '<span class="color-main">Должность:</span>';
                        $output .= $list->position;
                        $output .= '</p>';
                        $output .= '</label>';
                        $output .= '<p class="m-0 text-light">';
                        $output .= '<span class="color-main">Комментарий:</span>';
                        $output .= $list->comment;
                        $output .= '</p>';
                        $output .= '</div>';
                        $output .= '</div>';
                        $output .= '</div>';
                    } else {
                        $output .= '<div class="col-12 col-sd-12 col-md-12 blacklist rounded-lg pr-2 pr-md-5 pl-2 pl-md-4 pt-2 pt-md-3 pb-2 pb-md-3">';
                        $output .= '<div class="d-flex align-items-start">';
                        if ($list->photo != NULL) {
                            $output .= '<img src="' . $list->photo . '" alt="avatar" class="rounded-circle userphoto">';
                        } else {
                            $output .= '<img src="' . asset('img/list/user.jpg') . '" alt="avatar" class="rounded-circle userphoto">';
                        }
                        $output .= '<div class="ml-4 ml-md-5">';
                        $output .= '<input type="checkbox" id="comment' . $list->id . '" class="position-absolute comment-checkbox">';
                        $output .= '<label for="comment' . $list->id . '">';
                        $output .= '<h4 class="text-light">' . $list->name . '</h4>';
                        $output .= '<p class="m-0 text-light">';
                        $output .= '<span class="color-main">Адрес компании:</span>';
                        $output .= $list->address;
                        $output .= '</p>';
                        $output .= '<p class="m-0 text-light">';
                        $output .= '<span class="color-main">Сфера деятельности:</span>';
                        $output .= $list->position;
                        $output .= '</p>';
                        $output .= '</label>';
                        $output .= '<p class="m-0 text-light">';
                        $output .= '<span class="color-main">Комментарий:</span>';
                        $output .= $list->comment;
                        $output .= '</p>';
                        $output .= '</div>';
                        $output .= '</div>';
                        $output .= '</div>';
                    }
                }
            }


            return $output;
        }
    }
}
