<?php
use Carbon\Carbon;

class CommonAdmin {

	public static function getTypeNewByBlock($blockId)
	{
		$listType = BlockTypeNew::where('block_id', $blockId)->lists('type_new_id');
		$types = TypeNews::whereIn('id', $listType)->where('status', ACTIVE)->lists('name', 'id');
		return $types;
	}
	public static function getFieldNewFirstByNew($newId, $field)
	{
		$typeFirst = RelationNewType::where('new_id', $newId)->first();
		if ($typeFirst) {
			return $typeFirst->$field;
		}
		return null;
	}
	public static function getPositionPageByBlock()
	{
		$typeFirst = RelationNewType::where('new_id', $newId)->first();
		if ($typeFirst) {
			return $typeFirst->type_new_id;
		}
		return null;
	}

	public static function putEditWeightNumber($model, $type, $id, $field)
	{
		$data = $model::where($field, $id)->first();
		if ($data) {
			$listVictim = [];
			if ($type == DOUBLE_DOWN) {
				$maxNumber = $model::orderBy('weight_number', 'DESC')->first()->weight_number;
				$weightNumber = $maxNumber + 1;
			}
			if ($type == DOUBLE_UP) {
				$weightNumber = 0;
				$listVictim = $model::where('weight_number', '>=', $weightNumber)->get();
			}
			if ($type == UP) {
				$weightNumber = $data->weight_number + 1;
				$listVictim = $model::where('weight_number', '=', $weightNumber)->get();
			}
			if ($type == DOWN) {
				$weightNumber = $data->weight_number - 1;
				$listVictim = $model::where('weight_number', '=', $weightNumber)->get();
			}
			if ($weightNumber >= 0) {
				$index = 1;
				if (isset($listVictim) && count($listVictim) > 0) {
					foreach ($listVictim as $key => $value) {
						$model::find($value->id)->update(['weight_number' => $weightNumber + $index]);
						$index++;
					}
				}
				$data = $data->update(['weight_number' => $weightNumber]);
				if ($data) {
					$response['status'] = true;
					$response['message'] = 'Thành công';
				}
			}
		} else {
			$response['status'] = false;
			$response['message'] = 'Thất bại';
		}
	}

	public static function getNews($blockId)
	{
		$listTypeId =  BlockTypeNew::where('block_id', $blockId)->lists('type_new_id');
		$data = TypeNews::join('mdl_homenew_relation_new_type as relation', 'relation.type_new_id', '=', 'mdl_homenew_type_news.id')
            ->join('mdl_homenew_news as news', 'news.id', '=', 'relation.new_id')
            ->whereIn('mdl_homenew_type_news.id', $listTypeId)
            ->select('mdl_homenew_type_news.name as type_new_name', 'news.name as new_name', 
            	'news.link as new_link', 'news.id as new_id',
            	'relation.weight_number as relation_weight_number')
            ->get();
        // dd($data->toArray());
        return $data;
	}
	public static function getNewsHome()
	{
		$data = News::where('is_home', ACTIVE)->get();
		return $data;
	}	

	public static function processDataFilter($input = array())
	{
		if (count($input) > 0) {
			foreach ($input as $key => $value) {
				if ($value == '' || $value == VALUE_SELECT_ALL || $key = 'time_active') {
					unset($input[$key]);
				}
			}
		}
		return $input;
	}
}