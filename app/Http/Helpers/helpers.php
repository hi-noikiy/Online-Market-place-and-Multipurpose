<?php

use App\Location;
use App\Qualification;
use Illuminate\Support\Facades\DB;

function getProjectStatusName($status)
{
    $result = null;
    switch ($status) {
        case '1':
            $result = "Active";
            break;

        case '2':
            $result = "Deactivate";
            break;

        case '3':
            $result = "Complete";
            break;

        default:
            $result = "Unknown";
            break;
    }

    return $result;
}

function getAdminCategoryName($status)
{
    $result = null;
    switch ($status) {
        case '1':
            $result = "Freelancer";
            break;

        case '2':
            $result = "Pro";
            break;

        case '3':
            $result = "Job";
            break;

        case '4':
            $result = "Scholarship";
            break;

        case '5':
            $result = "Courses";
            break;

        default:
            $result = "Unknown";
            break;
    }

    return $result;
}

function getFreelancerType($status)
{
    $result = null;
    switch ($status) {
        case '1':
            $result = "Freelancer";
            break;

        case '2':
            $result = "Pro";
            break;

        default:
            $result = "Unknown";
            break;
    }

    return $result;
}

function getJobType($status)
{
    $result = null;
    switch ($status) {
        case '1':
            $result = "Full Time";
            break;

        case '2':
            $result = "Part Time";
            break;

        default:
            $result = "Unknown";
            break;
    }

    return $result;
}

function getScholarShipType($status)
{
    $result = null;
    switch ($status) {
        case '1':
            $result = "Full Time";
            break;

        case '2':
            $result = "Part Time";
            break;

        case '3':
            $result = "Free";
            break;

        default:
            $result;
            break;
    }

    return $result;

}

function getQualificationName($id)
{
    $result = 'N/A';
    $response = Qualification::find($id);
    if (!empty($response)) {
        $result = $response->name;
    }

    return $result;

}

function getLocationName($id)
{
    $result = 'N/A';
    $response = Location::find($id);
    if (!empty($response)) {
        $result = $response->name;
    }

    return $result;
}

function getExpertLevel($status)
{
    $result = null;
    switch ($status) {
        case '1':
            $result = "Begginer";
            break;

        case '2':
            $result = "Intermidiate";
            break;

        case '3':
            $result = "Expert";
            break;

        default:
            $result = "Unknown";
            break;
    }

    return $result;

}

function checkAvailablity($status)
{
    $result = null;
    switch ($status) {
        case '1':
            $result = "Available";
            break;

        case '2':
            $result = "Offline";
            break;

        default:
            $result = "Unknown";
            break;
    }

    return $result;

}

function getLanguagesName($json)
{
    $result = 'N/A';
    $ids = json_decode($json, true);
    if (!empty($ids)) {
        $response = DB::table('languages')
            ->select('name')
            ->where('status', 1)
            ->whereIn('id', $ids)
            ->get()->toArray();

        if (count($response) > 0) {
            $result = implode(",", array_column($response, 'name'));
        }
    }

    return $result;
}

function getSkills($json)
{
    $result = [];
    $ids = json_decode($json, true);
    if (!empty($ids)) {
        $response = DB::table('skills')
            ->select('id', 'name')
            ->where('status', 1)
            ->whereIn('id', $ids)
            ->get()->toArray();

        if (count($response) > 0) {
            $result = $response;
        }
    }

    return $result;
}

function getCountryNameById($id)
{
    $result = null;
    if (!empty($id)) {
        $response = DB::table('countries')
            ->select('name')
            ->where('status', 1)
            ->where('id', $id)
            ->first();

        if (!empty($response)) {
            $result = $response->name;
        }
    }

    return $result;
}

function getEducationbyUser($id)
{
    $result = null;
    if (!empty($id)) {
        $response = DB::table('education as edu')
            ->select('edu.*', 'quaf.name as qualification_name')
            ->join('qualifications as quaf', 'edu.qualification_id', '=', 'quaf.id')
            ->where('edu.user_id', $id)
            ->get();

        if (!empty($response)) {
            $result = $response;
        }
    }

    return $result;
}

function getExperiencebyUser($id)
{
    $result = null;
    if (!empty($id)) {
        $response = DB::table('experiences as exp')
            ->select('exp.*')
            ->where('exp.user_id', $id)
            ->get();

        if (!empty($response)) {
            $result = $response;
        }
    }

    return $result;
}
