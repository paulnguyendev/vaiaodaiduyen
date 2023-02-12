<?php
namespace App\Helpers\Package;
use App\Models\AffiliateLevelModel;
use App\Models\AffiliateSettingModel;
use App\Models\TaxonomyModel;
use App\Models\UserModel;
class AffiliatePackage
{
    private static $taxnomyModel;
    public static function listSettings($level_id, $commission_type = "", $options = []) {
        $model = new AffiliateLevelModel();
        $level = $model::find($level_id);
        $settings = $level->settings();
        $settings = $commission_type ? $settings->where('commission_type',$commission_type) : $settings;
        if(isset($options['type'])) {
            $settings = $settings->where('type',$options['type']);
        }
        $settings = $settings->get()->toArray();
        return $settings;
    }
    public static function getCommissionDirect($user_id) {
        $result = 0;
        $user = UserModel::find($user_id);
        if($user) {
            $level_id = isset($user['level_id']) ? $user['level_id'] : [];
            $item = ($level_id) ?  self::listSettings($level_id,'direct') : [];
            $item = array_shift($item);
            $result = $item['commission'] ?? 0;
        }
        return $result;
    }
    public static function getCommissionIndirect($user_id) {
        $model = new UserModel();
        $user = $model::find($user_id);
        $user_level_id = $user['level_id'];
        $user_level_indirect = self::listSettings($user_level_id,'indirect',['type' => 'personal']);
        $childs =  $model::defaultOrder()->where('level_id','!=','')->descendantsOf($user_id);
        $child_settings = [];
        $child_level_info = [];
        $child_level_indirects = [];
        $result = [];
        foreach ($childs as $childKey => $child) {
            $child_id = $child['id'];
            $child_level_id = $child['level_id'];
            $child_level_indirect = array_filter($user_level_indirect,function($item) use( $child_level_id ) {
                if($child_level_id == $item['indirect_level_id']) {
                    return $item;
                }
            });
            $child_level_indirect  = array_shift($child_level_indirect);
            $commission = $child_level_indirect['commission'] ?? 0;
            if($commission > 0 ) {
                $result[$childKey]['user_id'] = $child_id;
                $result[$childKey]['commission'] = $commission;
                $result[$childKey]['orders'] = UserModel::find($child_id)->order()->get()->toArray();
            }
          
        }
        return $result;
    }
}
