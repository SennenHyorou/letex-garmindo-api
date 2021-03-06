<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../config/connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$company_id = $data->company_id;
	$company_code = $data->company_code;
	$company_name = $data->company_name;
	$company_contact = $data->company_contact;
	$company_address = $data->company_address;
	$company_status = $data->company_status;
	$company_logo = $data->company_logo;
	$so_number = $data->so_number;

	$response = array();

	if ($company_logo) {
		$query = mysqli_query($link, "UPDATE tb_company SET company_code = '$company_code', company_name = '$company_name', company_contact = '$company_contact', company_address = '$company_address', company_status = '$company_status', company_logo = '$company_logo', so_number = '$so_number' WHERE company_id = '$company_id'");
	}
	else {
		$query = mysqli_query($link, "UPDATE tb_company SET company_code = '$company_code', company_name = '$company_name', company_contact = '$company_contact', company_address = '$company_address', company_status = '$company_status', so_number = '$so_number' WHERE company_id = '$company_id'");
	}

	if ($query) {
		$response['error'] = false;
		$response['message'] = 'Data updated!';
	}
	else {
		$response['error'] = true;
		$response['message'] = "Failed to update data!";
	}

	echo json_encode($response);
?>