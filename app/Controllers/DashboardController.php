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
        
        $data['users'] = $users;
        return view('NavbarView').view('DashboardView', ['data' => $data]);
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('/dashboard');
    }

    public function update($id)
    {
        $userModel = new UserModel();
        $data = $userModel->find($id);

        return view('UpdateView', ['data' => $data]);
    }

    public function updatePost()
    {
        $userModel = new UserModel();
        $id = $this->request->getPost('id');

        if ($this->request->getPost('password') == '') {
            $data = [
                'username' => $this->request->getPost('username'),
            ];
            $userModel->update($id, $data);

            return redirect()->to('/dashboard');
        }else{
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
            $userModel->update($id, $data);

            return redirect()->to('/dashboard');
        }
    }

    public function create()
    {
        return view('CreateView');
    }

    public function createPost()
    {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
        $userModel->save($data);

        return redirect()->to('/dashboard');
    }

    public function search()
    {
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
