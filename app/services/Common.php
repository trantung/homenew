<?php
use Carbon\Carbon;

class Common {
	public static function uploadImage($path, $imageUrl, $image = NULL)
	{
		$time = time();
		$destinationPath = public_path().'/'.$path.'/';
		if(Input::hasFile($imageUrl)){
			$file = Input::file($imageUrl);
			$filename = $time .'_'. $file->getClientOriginalName();
			if (!$filename) {
				dd(123);
			}
			$uploadSuccess = $file->move($destinationPath, $filename);
			if (!$uploadSuccess) {
				dd(56);
			}
			return $filename;
		}
		if ($image) {
			return $image;
		}
	}
	public static function attachRelation($model, $id, $method, $input, $field, $weightNumber = NULL)
	{
		if (!$weightNumber) {
			$weightNumber = WEIGHT_NUMBER;
		}
		if (isset($input[$field])) {
			$ob = $model::find($id);
			if ($weightNumber) {
				$data = [];
				for($i = 0; $i < count($input[$field]); $i++) 
				{
				    $data[$input[$field]] = [$weightNumber => $input[$weightNumber]];
				}
				$ob->$method()->attach($data);
				return true;
			}
			$ob->$method()->attach($input[$field]);

			return true;
		}
		self::detachRelation($model, $id, $method);
		return true;

	}
	public static function detachRelation($model, $id, $method)
	{
		$ob = $model::find($id);
		$ob->$method()->detach();
	}

	public static function syncRelation($model, $id, $method, $input, $field, $weightNumber = NULL)
	{
		if (isset($input[$field])) {
			$ob = $model::find($id);
			if ($weightNumber) {
				$data = [];
				for($i = 0; $i < count($input[$field]); $i++) 
				{
				    $data[$input[$field][$i]] = [$weightNumber => DEFAULT_WEIGHT_NUMBER];
				}
				$ob->$method()->sync($data);
				return true;
			}
			$ob->$method()->sync($input[$field]);
			return true;
		}
		self::detachRelation($model, $id, $method);
		return true;
	}	

	public static function checkValueChecked($modelName, $arrayInput, $field =NULL)
	{
		$check = $modelName::where($arrayInput)->first();
		if ($check) {
			if ($field) {
				return $check->$field;
			}
			return true;
		}
		return null;
	}
	public static function insertCommonNew($modelName, $modelId, $modelRelate, $input, $field)
	{
		$commonNewId = [];
		if (isset($input[$field])) {
			foreach ($input[$field] as $value) {
				$commonNewId[] = CommonNew::create([
					'model_name' => $modelName,
					'model_id' => $modelId,
					'model_relation_name' => $modelRelate,
					'model_relation_id' => $value,
				]);
			}
			return true;
		}
		return true;
	}
	public static function updateCommonNew($modelName, $modelId, $modelRelate, $input, $field)
	{
		$commonNewId = [];
		if (isset($input[$field])) {
			self::deleteCommonNew($modelName, $modelId, $modelRelate);
			foreach ($input[$field] as $value) {
				$commonNewId[] = CommonNew::create([
					'model_name' => $modelName,
					'model_id' => $modelId,
					'model_relation_name' => $modelRelate,
					'model_relation_id' => $value,
				]);
			}
			return true;
		}
		self::deleteCommonNew($modelName, $modelId, $modelRelate);
		return true;
	}

	public static function deleteCommonNew($modelName, $modelId, $modelRelate)
	{
		CommonNew::where('model_name', $modelName)
			->where('model_id', $modelId)
			->where('model_relation_name', $modelRelate)
			->delete();
	}

	public static function checkDisabled($tableMap, $arrInput)
	{
		$check = self::checkValueChecked($tableMap, $arrInput);
		if (!$check) {
			return 'disabled';
		}
		return null;
	}


	public static function syncData($fn, $model, $input, $fnRelation, $key, $field, $param)
	{
		// if (count($input) > 0) {
			foreach ($input as $value) {
				Common::$fn($model, $key, $fnRelation, $value, $field, $param);
			}
		// }
		
	}

	public static function replaceKeyArray($data, $oldKey, $newKey)
	{
		$data[$newKey] = $data[$oldKey];
		unset($data[$oldKey]);
		return $data;
	}

	public static function syncRelationParams($model, $array, $input, $field)
	{
		$model::where($array)->delete();
		$updateData = [];
		foreach ($input as $key => $value) {
			if (isset($value[$field])) {
				$inputUpdate = $value + $array;
				$updateData[] = $inputUpdate;
			}
		}
		$model::insert($updateData);
		return true;
	}	

	public static function deleteRecordRelation($model, $field, $id)
	{
		$model::where($field, $id)->delete();
	}

    public static function getCheckCanEdit($model, $field, $id)
    {
        $yesterday = Carbon::yesterday();
        $data = $model::where($field, $id)->first();
        if (!$data || $yesterday <= $data->created_at) {
        	return true;
        }
        return false;
    }
}