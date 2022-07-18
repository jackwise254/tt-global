<?php
namespace LaminasUser;


class Student extends BaseController
{
    public $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
      
        // $this->db = db_connect();
    }

    public function uploadStudent()
    {
        if ($this->request->getMethod() == "post") {

            $file = $this->request->getFile("file");

            $file_name = $file->getTempName();

            $student = array();

            $csv_data = array_map('str_getcsv', file($file_name));

            if (count($csv_data) > 0) {

                $index = 0;

                foreach ($csv_data as $data) {

                    if ($index > 0) {

                        $student[] = array(
                            "name" => $data[1],
                            "email" => $data[2],
                            "mobile" => $data[3],
                            "designation" => $data[4],
                        );
                    }
                    $index++;
                }

                $builder = $this->db->table('tbl_students');

                $builder->insertBatch($student);

                $session = session();

                $session->setFlashdata("success", "Data saved successfully");

                return redirect()->to(base_url('upload-student'));
            }
        }

        return view("upload-file");
    }
}