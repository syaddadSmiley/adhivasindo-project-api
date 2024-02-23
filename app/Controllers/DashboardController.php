<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\IncomingRequest;

class DashboardController extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        return view('NavbarView').view('DashboardView', ['data' => $users]);
    }

    public function search()
    {
        // get data from url https://ogienurdiana.com/career/ecc694ce4e7f6e45a5a7912cde9fe131
        $curl = \Config\Services::curlrequest();
        $curl2 = curl_init();
        $keyword = $this->request->getPost('search');
        curl_setopt($curl2, CURLOPT_URL, "https://ogienurdiana.com/career/ecc694ce4e7f6e45a5a7912cde9fe131");
        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl2);
        $result = json_decode($result, true);
        curl_close($curl2);

        $rows = explode("\n", $result['DATA']);
        $parsedData = [];
        unset($rows[0]);
        // echo implode("<br>", $rows);

        $keyword = str_replace(" ", "", $keyword);
        foreach ($rows as $row) {
            $position = strpos($row, $keyword);
            if (is_numeric($position)) {
                $parsedData[] = $row;
            }
        }


        $userModel = new UserModel();
        $users = $userModel->findAll();
        $data['result'] = $parsedData;
        $data['users'] = $users;

        return view('NavbarView').view('DashboardView', ['data' => $data]);
    }
}
