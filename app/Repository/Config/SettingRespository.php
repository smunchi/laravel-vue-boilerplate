<?php


namespace Repository\Config;

use App\Models\Configs\Setting;
use Repository\Repository;

class SettingRespository extends Repository
{
    public function model()
    {
        return Setting::class;
    }
}
