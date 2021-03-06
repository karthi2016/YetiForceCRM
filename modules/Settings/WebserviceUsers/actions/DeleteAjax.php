<?php

/**
 * Class to delete
 * @package YetiForce.Settings.Action
 * @license licenses/License.html
 * @author Radosław Skrzypczak <r.skrzypczak@yetiforce.com>
 */
class Settings_WebserviceUsers_DeleteAjax_Action extends Settings_Vtiger_Delete_Action
{

	/**
	 * Function  proccess
	 * @param \App\Request $request
	 */
	public function process(\App\Request $request)
	{
		$recordId = $request->get('record');
		$typeApi = $request->get('typeApi');
		$recordModel = Settings_WebserviceUsers_Record_Model::getInstanceById($recordId, $typeApi);
		$result = $recordModel->delete();

		$responceToEmit = new Vtiger_Response();
		$responceToEmit->setResult($result);
		$responceToEmit->emit();
	}

	/**
	 * Validating incoming request.
	 * @param \App\Request $request
	 */
	public function validateRequest(\App\Request $request)
	{
		$request->validateReadAccess();
	}
}
