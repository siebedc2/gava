<?php

namespace App\Services;

use App\Models\View as ViewModel;
use Validator;
use Carbon\Carbon;

class View {
    public function validator(array $data) {
        return Validator::make($data, [
            'creator_id' => 'required'
        ]);
    }

    public function create($creatorId) {
        $view               = new ViewModel();
        $view->creator_id   = $creatorId;
        $view->save();
    }

    public function getTotal($creatorId) {
        return ViewModel::where('creator_id', $creatorId)->get()->count();
    }

    public function getMonthViews($month, $creatorId) {
        return ViewModel::where('creator_id', $creatorId)->whereMonth('created_at', Carbon::create()->month($month))->get()->count();
    }
}