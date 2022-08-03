public function verify()
    {   

        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);

        $builder17 = $db->table('type');
        $builder17->select('*');
        $data['type'] = $builder17->get()->getresult();


        $random = rand(100000, 999999);
        $rands = [
            'random' =>$random,
            'tbl' =>$this->request->getvar('table'),
        ];

        for($i = 0; $i <= $al; $i ++){
            $num = $num + 1;

        }

        session()->set($rands);
        $datam = [
            'random' => $random,
            'time' => date("h:i:sa"),
            'tbl' => 'Stockin',
        ];

        $dataso = [
            'random' => $random,
            'time' => date("h:i:sa"),
            'tbl' => 'Stockout'
        ];

        $dataf = [
            'random' => $random,
            'time' => date("h:i:sa"),
            'tbl' => 'faulty'
        ];


        $datafo = [
            'random' => $random,
            'time' => date("h:i:sa"),
            'tbl' => 'faultyout'
        ];

        $dataw = [
            'random' => $random,
            'time' => date("h:i:sa"),
            'tbl' => 'warrantyin'
        ];

        $datawo = [
            'random' => $random,
            'time' => date("h:i:sa"),
            'tbl' => 'warranty out'
        ];

        $datac = [
            'random' => $random,
            'time' => date("h:i:sa"),
            'tbl' => 'credit'
        ];

        $datad = [
            'random' => $random,
            'time' => date("h:i:sa"),
            'tbl' => 'debit'
        ];
        // find multiple columns
        
        // end of find multiple columns


        // testing 
        if($this->request->getGet('find') && $this->request->getGet('model') ) {
            $m = $this->request->getVar('table');
            $j = $this->request->getVar('find');
            $builde = $db->table('verify');
            $builde->select('*');
            $builde->like('brand', $j); 
            $builde->orLike('conditions', $j); 
            $builde->orLike('modelid', $j); 
            $builde->orLike('model', $j); 
            $builde->orLike('customer', $j); 
            $builde->orLike('cpu', $j); 
            $builde->orLike('hdd', $j); 
            $builde->orLike('screen', $j); 
            $builde->orLike('ram', $j); 
            $builde->orLike('odd', $j); 
            $builde->orLike('type', $j); 
            $builde->orLike('assetid', $j); 
            $builde->orLike('daterecieved', $j); 
            $builde->orLike('datedelivered', $j); 
            $builde->orLike('vendor', $j); 
            $builde->orLike('customer', $j); 
            $builde->orLike('price', $j); 
            $builde->orLike('comment', $j); 
            $builde->orLike('problem', $j); 
            $builde->orLike('list', $j); 
            $builde->orLike('status', $j); 
            $builde->orLike('part', $j); 
            $dataa = $builde->get()->getresultArray();
    
            $m = $this->request->getVar('table');
            $q = $this->request->getVar('find');
            $model = $this->request->getVar('model');
    
            if($m == 'Stockin'){
                $builder122 = $db->table('masterlist');
                $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('masterlist.*');
                $builder122->like('model', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('model', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('model', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('assetid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('daterecieved', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('datedelivered', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('part', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                    }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('model', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('model', $q); 
                $builde1->orLike('model', $model) &&
                $builde1->like('part', $q); 
                $builde1->update($datam);
                return redirect()->to(site_url('/verify'));
                }
            elseif($m == 'stockout'){
                $builder122 = $db->table('stockout');
                $builder122->select('stockout.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('stockout.*');
                $builder122->like('model', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('model', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('model', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                    }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('model', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('model', $q); 
                $builde1->update($dataso);
                return redirect()->to(site_url('/verify'));
            }
            elseif($m == 'warranty'){
                $builder122 = $db->table('warrantyin');
                $builder122->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('warrantyin.*');
                $builder122->like('model', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('model', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('model', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                   }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('model', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('model', $q); 
                $builde1->update($dataw);
                return redirect()->to(site_url('/verify'));
            }
            elseif($m == 'warrantyout'){
                $builder122 = $db->table('warrantyout');
                $builder122->select('warrantyout.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('warrantyout.*');
                $builder122->like('model', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('model', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('model', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                   }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('model', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('model', $q); 
                $builde1->update($datawo);
                return redirect()->to(site_url('/verify'));
            }
            elseif($m == 'debit'){
                $builder122 = $db->table('debit');
                $builder122->select('debit.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('debit.*');
                $builder122->like('model', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('model', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('model', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                   }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('model', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('model', $q); 
                $builde1->update($datad);
                return redirect()->to(site_url('/verify'));
            }
            elseif($m == 'credit'){
                $builder122 = $db->table('credit');
                $builder122->select('credit.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('credit.*');
                $builder122->like('model', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('model', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('model', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                   }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('model', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('model', $q); 
                $builde1->update($datac);
                return redirect()->to(site_url('/verify'));
            }
    
            elseif($m == 'faultyin'){
                $builder122 = $db->table('faultyin');
                $builder122->select('faultyin.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('faultyin.*');
                $builder122->like('model', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('model', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('model', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                   }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('model', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('model', $q); 
                $builde1->update($dataf);
                return redirect()->to(site_url('/verify'));
            }
            elseif($m == 'faultyout'){
                $builder122 = $db->table('faultyout');
                $builder122->select('faultyout.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('faultyout.*');
                $builder122->like('model', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('model', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('model', $model) &&
                $builder122->like('model', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                   }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('model', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('model', $model) &&
                $builde1->like('model', $q); 
                $builde1->update($datafo);
                return redirect()->to(site_url('/verify'));
            }
        }
            // end of search plus find
        // end

    // search plus find
            
        if($this->request->getGet('find') && $this->request->getGet('search') ) {
            $m = $this->request->getVar('table');
            $j = $this->request->getVar('find');
            $builde = $db->table('verify');
            $builde->select('*');
            $builde->like('brand', $j); 
            $builde->orLike('conditions', $j); 
            $builde->orLike('modelid', $j); 
            $builde->orLike('model', $j); 
            $builde->orLike('customer', $j); 
            $builde->orLike('cpu', $j); 
            $builde->orLike('hdd', $j); 
            $builde->orLike('screen', $j); 
            $builde->orLike('ram', $j); 
            $builde->orLike('odd', $j); 
            $builde->orLike('type', $j); 
            $builde->orLike('assetid', $j); 
            $builde->orLike('daterecieved', $j); 
            $builde->orLike('datedelivered', $j); 
            $builde->orLike('vendor', $j); 
            $builde->orLike('customer', $j); 
            $builde->orLike('price', $j); 
            $builde->orLike('comment', $j); 
            $builde->orLike('problem', $j); 
            $builde->orLike('list', $j); 
            $builde->orLike('status', $j); 
            $builde->orLike('part', $j); 
            $dataa = $builde->get()->getresultArray();

            $m = $this->request->getVar('table');
            $q = $this->request->getVar('find');
            $model = $this->request->getVar('search');

            if($m == 'Stockin'){
                $builder122 = $db->table('masterlist');
                $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('masterlist.*');
                $builder122->like('type', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('type', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('type', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('assetid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('daterecieved', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('datedelivered', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('part', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                    }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('type', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('type', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('type', $q); 
                $builde1->orLike('type', $model) &&
                $builde1->like('part', $q); 
                $builde1->update($datam);
                return redirect()->to(site_url('/verify'));
                }
            elseif($m == 'stockout'){
                $builder122 = $db->table('stockout');
                $builder122->select('stockout.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('stockout.*');
                $builder122->like('type', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('type', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('type', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                    }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('type', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('type', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('type', $q); 
                $builde1->update($dataso);
                return redirect()->to(site_url('/verify'));
            }
            elseif($m == 'warranty'){
                $builder122 = $db->table('warrantyin');
                $builder122->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('warrantyin.*');
                $builder122->like('type', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('type', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('type', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('type', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('type', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('type', $q); 
                $builde1->update($dataw);
                return redirect()->to(site_url('/verify'));
            }
            elseif($m == 'warrantyout'){
                $builder122 = $db->table('warrantyout');
                $builder122->select('warrantyout.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('warrantyout.*');
                $builder122->like('type', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('type', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('type', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('type', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('type', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('type', $q); 
                $builde1->update($datawo);
                return redirect()->to(site_url('/verify'));
            }
            elseif($m == 'debit'){
                $builder122 = $db->table('debit');
                $builder122->select('debit.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('debit.*');
                $builder122->like('type', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('type', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('type', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('type', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('type', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('type', $q); 
                $builde1->update($datad);
                return redirect()->to(site_url('/verify'));
            }
            elseif($m == 'credit'){
                $builder122 = $db->table('credit');
                $builder122->select('credit.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('credit.*');
                $builder122->like('type', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('type', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('type', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('type', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('type', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('type', $q); 
                $builde1->update($datac);
                return redirect()->to(site_url('/verify'));
            }

            elseif($m == 'faultyin'){
                $builder122 = $db->table('faultyin');
                $builder122->select('faultyin.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('faultyin.*');
                $builder122->like('type', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('type', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('type', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('type', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('type', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('type', $q); 
                $builde1->update($dataf);
                return redirect()->to(site_url('/verify'));
            }
            elseif($m == 'faultyout'){
                $builder122 = $db->table('faultyout');
                $builder122->select('faultyout.*')->orderBy('daterecieved', 'DESC');
                $builder122->select('faultyout.*');
                $builder122->like('type', $model) &&
                $builder122->like('cpu', $q);
                $builder122->orLike('type', $model) && 
                $builder122->like('assetid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('brand', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('conditions', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('modelid', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('gen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('screen', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('price', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('customer', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('ram', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('odd', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('comment', $q);
                $builder122->orLike('type', $model) &&
                $builder122->like('type', $q);
                $data = $builder122->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('type', $model) &&
                $builde1->like('cpu', $q);
                $builde1->orLike('type', $model) && 
                $builde1->like('assetid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('brand', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('conditions', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('modelid', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('gen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('screen', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('price', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('customer', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('ram', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('odd', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('comment', $q);
                $builde1->orLike('type', $model) &&
                $builde1->like('type', $q); 
                $builde1->update($datafo);
                return redirect()->to(site_url('/verify'));
            }
        }
            // end of search plus find
        
            // model
        if($this->request->getVar('model')){
            $m = $this->request->getVar('table');
            $j = $this->request->getVar('model');
            $builde = $db->table('verify');
            $builde->select('*');
            $builde->like('model', $j); 
            $dataa = $builde->get()->getresultArray();
            if($m == 'Stockin'){
                $build = $db->table('masterlist');
                $build->select('*');
                $build->like('model', $j); 
                $data = $build->get()->getResultArray();
                foreach($data as $d){
                if(!$dataa){
                    $builde->insert($d);
                }
                }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $j); 
                $builde1->update($datam);
                return redirect()->to(site_url('/verify'));
            }
            elseif($m == 'stockout'){
                $build = $db->table('stockout');
                $build->select('*');
                $build->like('model', $j); 
                $data = $build->get()->getResultArray();
                foreach($data as $d){
                    $dataa = $builde->get()->getresultArray();
                    if(!$dataa){
                        $builde->insert($d);
                    }
                }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $j); 
                $builde1->update($datas);
                return redirect()->to(site_url('/verify'));

            }

            elseif($m == 'warranty'){
                $build = $db->table('warrantyin');
                $build->select('*');
                $build->like('model', $j); 
                $data = $build->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $j); 
                $builde1->update($dataw);
                return redirect()->to(site_url('/verify'));
            }

            elseif($m == 'warrantyout'){
                $build = $db->table('warrantyout');
                $build->select('*');
                $build->like('model', $j); 
                $data = $build->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $j); 
                $builde1->update($datawo);
                return redirect()->to(site_url('/verify'));

            }

            elseif($m == 'debit'){
                $build = $db->table('debit');
                $build->select('*');
                $build->like('model', $j); 
                $data = $build->get()->getResultArray();
                foreach($data as $d){
                    $builde = $db->table('verify');
                    $builde->select('*');
                    $builde->like('model', $j); 
                    $dataa = $builde->get()->getresultArray();
                    if(!$dataa){
                        $builde->insert($d);
                    }
                }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $j); 
                $builde1->update($datad);
                return redirect()->to(site_url('/verify'));
            }

            elseif($m == 'credit'){
                $build = $db->table('credit');
                $build->select('*');
                $build->like('model', $j); 
                $data = $build->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $j); 
                $builde1->update($datac);
                return redirect()->to(site_url('/verify'));

            }

            elseif($m == 'faultyin'){
                $build = $db->table('faultyin');
                $build->select('*');
                $build->like('model', $j); 
                $data = $build->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $j); 
                $builde1->update($dataf);
                return redirect()->to(site_url('/verify'));

            }

            elseif($m == 'faultyout'){
                $build = $db->table('faultyout');
                $build->select('*');
                $build->like('model', $j); 
                $data = $build->get()->getResultArray();
                foreach($data as $d){
                    if(!$dataa){
                        $builde->insert($d);
                    }
                }
                $builde1 = $db->table('verify');
                $builde1->select('*');
                $builde1->like('model', $j); 
                $builde1->update($datafo);
                return redirect()->to(site_url('/verify'));
            }

            else{
                return redirect()->back()->with('status', 'Result not found!');
            }

            $q =   $this->request->getVar('find');
            $builder1 = $db->table('verify');
            $builder1->select('verify.*')->orderBy('time', 'DESC');
            $builder1->like('brand', '%'.$q.'%');
            $builder1->orLike('assetid', '%'.$q.'%');
            $builder1->orLike('conditions', '%'.$q.'%');
            $builder1->orLike('random', '%'.$q.'%');
            $builder1->orLike('modelid', '%'.$q.'%');
            $builder1->orLike('gen', '%'.$q.'%');
            $builder1->orLike('cpu', '%'.$q.'%');
            $builder1->orLike('screen', '%'.$q.'%');
            $builder1->orLike('price', '%'.$q.'%');
            $builder1->orLike('customer', '%'.$q.'%');
            $builder1->orLike('ram', '%'.$q.'%');
            $builder1->orLike('odd', '%'.$q.'%');
            $builder1->orLike('comment', '%'.$q.'%');
            $builder1->orLike('type', '%'.$q.'%');
            $data['items'] = $builder1->get()->getResultArray();
            $data['true'] = 1;
            $dara = [
                'daara' => $q,
            ];
            session()->set($dara);
            $data['user_data'] = $session->get('designation');
            return view('products/verify', $data);
        }


    if($this->request->getGet('find')){
        echo 'true';
        exit;
        $m = $this->request->getVar('table');
        $j = $this->request->getVar('find');

        $builde = $db->table('verify');
        $builde->select('*');
        $builde->like('brand', $j); 
        $builde->orLike('conditions', $j); 
        $builde->orLike('modelid', $j); 
        $builde->orLike('model', $j); 
        $builde->orLike('customer', $j); 
        $builde->orLike('cpu', $j); 
        $builde->orLike('hdd', $j); 
        $builde->orLike('screen', $j); 
        $builde->orLike('ram', $j); 
        $builde->orLike('odd', $j); 
        $builde->orLike('type', $j); 
        $dataa = $builde->get()->getresultArray();

        if($m == 'Stockin'){
           $build = $db->table('masterlist');
           $build->select('*');
           $build->like('brand', $j); 
           $build->orLike('conditions', $j); 
           $build->orLike('modelid', $j); 
           $build->orLike('model', $j); 
           $build->orLike('customer', $j); 
           $build->orLike('cpu', $j); 
           $build->orLike('hdd', $j); 
           $build->orLike('screen', $j); 
           $build->orLike('ram', $j); 
           $build->orLike('odd', $j); 
           $build->orLike('type', $j); 
           $data = $build->get()->getResultArray();

           foreach($data as $d){
            if(!$dataa){
                $builde->insert($d);
            }
           }
           $builde1 = $db->table('verify');
           $builde1->select('*');
           $builde1->like('brand', $j); 
           $builde1->orLike('conditions', $j); 
           $builde1->orLike('modelid', $j); 
           $builde1->orLike('model', $j); 
           $builde1->orLike('customer', $j); 
           $builde1->orLike('cpu', $j); 
           $builde1->orLike('hdd', $j); 
           $builde1->orLike('screen', $j); 
           $builde1->orLike('ram', $j); 
           $builde1->orLike('odd', $j); 
           $builde1->orLike('type', $j); 
            $builde1->update($datam);
           return redirect()->to(site_url('/verify'));
        }

        elseif($m == 'stockout'){
            $build = $db->table('stockout');
            $build->select('*');
            $build->like('brand', $j); 
            $build->orLike('conditions', $j); 
            $build->orLike('modelid', $j); 
            $build->orLike('model', $j); 
            $build->orLike('customer', $j); 
            $build->orLike('cpu', $j); 
            $build->orLike('hdd', $j); 
            $build->orLike('screen', $j); 
            $build->orLike('ram', $j); 
            $build->orLike('odd', $j); 
            $build->orLike('type', $j); 
            $data = $build->get()->getResultArray();
            // echo '<pre>';
            // print_r($data);
            // exit;
            foreach($data as $d){
             $dataa = $builde->get()->getresultArray();
             if(!$dataa){
                 $builde->insert($d);
             }
           }
           $builde1 = $db->table('verify');
           $builde1->select('*');
           $builde1->like('brand', $j); 
           $builde1->orLike('conditions', $j); 
           $builde1->orLike('modelid', $j); 
           $builde1->orLike('model', $j); 
           $builde1->orLike('customer', $j); 
           $builde1->orLike('cpu', $j); 
           $builde1->orLike('hdd', $j); 
           $builde1->orLike('screen', $j); 
           $builde1->orLike('ram', $j); 
           $builde1->orLike('odd', $j); 
           $builde1->orLike('type', $j); 
           $builde1->update($dataso);
           return redirect()->to(site_url('/verify'));

        }

        elseif($m == 'warranty'){
            $build = $db->table('warrantyin');
            $build->select('*');
            $build->like('brand', $j); 
            $build->orLike('conditions', $j); 
            $build->orLike('modelid', $j); 
            $build->orLike('model', $j); 
            $build->orLike('customer', $j); 
            $build->orLike('cpu', $j); 
            $build->orLike('hdd', $j); 
            $build->orLike('screen', $j); 
            $build->orLike('ram', $j); 
            $build->orLike('odd', $j); 
            $build->orLike('type', $j); 
            $data = $build->get()->getResultArray();
            foreach($data as $d){
             if(!$dataa){
                 $builde->insert($d);
             }
           }
           $builde1 = $db->table('verify');
           $builde1->select('*');
           $builde1->like('brand', $j); 
           $builde1->orLike('conditions', $j); 
           $builde1->orLike('modelid', $j); 
           $builde1->orLike('model', $j); 
           $builde1->orLike('customer', $j); 
           $builde1->orLike('cpu', $j); 
           $builde1->orLike('hdd', $j); 
           $builde1->orLike('screen', $j); 
           $builde1->orLike('ram', $j); 
           $builde1->orLike('odd', $j); 
           $builde1->orLike('type', $j); 
           $builde1->update($dataw);
           return redirect()->to(site_url('/verify'));

        }

        elseif($m == 'warrantyout'){
            $build = $db->table('warrantyout');
            $build->select('*');
            $build->like('brand', $j); 
            $build->orLike('conditions', $j); 
            $build->orLike('modelid', $j); 
            $build->orLike('model', $j); 
            $build->orLike('customer', $j); 
            $build->orLike('cpu', $j); 
            $build->orLike('hdd', $j); 
            $build->orLike('screen', $j); 
            $build->orLike('ram', $j); 
            $build->orLike('odd', $j); 
            $build->orLike('type', $j); 
            $data = $build->get()->getResultArray();
            foreach($data as $d){
             if(!$dataa){
                 $builde->insert($d);
             }
           }
           $builde1 = $db->table('verify');
           $builde1->select('*');
           $builde1->like('brand', $j); 
           $builde1->orLike('conditions', $j); 
           $builde1->orLike('modelid', $j); 
           $builde1->orLike('model', $j); 
           $builde1->orLike('customer', $j); 
           $builde1->orLike('cpu', $j); 
           $builde1->orLike('hdd', $j); 
           $builde1->orLike('screen', $j); 
           $builde1->orLike('ram', $j); 
           $builde1->orLike('odd', $j); 
           $builde1->orLike('type', $j); 
           $builde1->update($datawo);
           return redirect()->to(site_url('/verify'));

        }

        elseif($m == 'debit'){
            $build = $db->table('debit');
            $build->select('*');
            $build->like('brand', $j); 
            $build->orLike('conditions', $j); 
            $build->orLike('modelid', $j); 
            $build->orLike('model', $j); 
            $build->orLike('customer', $j); 
            $build->orLike('cpu', $j); 
            $build->orLike('hdd', $j); 
            $build->orLike('screen', $j); 
            $build->orLike('ram', $j); 
            $build->orLike('odd', $j); 
            $build->orLike('type', $j); 
            $data = $build->get()->getResultArray();
            foreach($data as $d){
             $builde = $db->table('verify');
             $builde->select('*');
             $builde->like('brand', $j); 
             $builde->orLike('conditions', $j); 
             $builde->orLike('modelid', $j); 
             $builde->orLike('model', $j); 
             $builde->orLike('customer', $j); 
             $builde->orLike('cpu', $j); 
             $builde->orLike('hdd', $j); 
             $builde->orLike('screen', $j); 
             $builde->orLike('ram', $j); 
             $builde->orLike('odd', $j); 
             $builde->orLike('type', $j); 
             $dataa = $builde->get()->getresultArray();
             if(!$dataa){
                 $builde->insert($d);
             }
           }
           $builde1 = $db->table('verify');
           $builde1->select('*');
           $builde1->like('brand', $j); 
           $builde1->orLike('conditions', $j); 
           $builde1->orLike('modelid', $j); 
           $builde1->orLike('model', $j); 
           $builde1->orLike('customer', $j); 
           $builde1->orLike('cpu', $j); 
           $builde1->orLike('hdd', $j); 
           $builde1->orLike('screen', $j); 
           $builde1->orLike('ram', $j); 
           $builde1->orLike('odd', $j); 
           $builde1->orLike('type', $j); 
           $builde1->update($datad);
           return redirect()->to(site_url('/verify'));
        }

        elseif($m == 'credit'){
            $build = $db->table('credit');
            $build->select('*');
            $build->like('brand', $j); 
            $build->orLike('conditions', $j); 
            $build->orLike('modelid', $j); 
            $build->orLike('model', $j); 
            $build->orLike('customer', $j); 
            $build->orLike('cpu', $j); 
            $build->orLike('hdd', $j); 
            $build->orLike('screen', $j); 
            $build->orLike('ram', $j); 
            $build->orLike('odd', $j); 
            $build->orLike('type', $j); 
            $data = $build->get()->getResultArray();
            foreach($data as $d){
             if(!$dataa){
                 $builde->insert($d);
             }
           }
           $builde1 = $db->table('verify');
           $builde1->select('*');
           $builde1->like('brand', $j); 
           $builde1->orLike('conditions', $j); 
           $builde1->orLike('modelid', $j); 
           $builde1->orLike('model', $j); 
           $builde1->orLike('customer', $j); 
           $builde1->orLike('cpu', $j); 
           $builde1->orLike('hdd', $j); 
           $builde1->orLike('screen', $j); 
           $builde1->orLike('ram', $j); 
           $builde1->orLike('odd', $j); 
           $builde1->orLike('type', $j); 
           $builde1->update($datac);
           return redirect()->to(site_url('/verify'));

        }

        elseif($m == 'faultyin'){
            $build = $db->table('faultyin');
            $build->select('*');
            $build->like('brand', $j); 
            $build->orLike('conditions', $j); 
            $build->orLike('modelid', $j); 
            $build->orLike('model', $j); 
            $build->orLike('customer', $j); 
            $build->orLike('cpu', $j); 
            $build->orLike('hdd', $j); 
            $build->orLike('screen', $j); 
            $build->orLike('ram', $j); 
            $build->orLike('odd', $j); 
            $build->orLike('type', $j); 
            $data = $build->get()->getResultArray();
            foreach($data as $d){
             if(!$dataa){
                 $builde->insert($d);
             }
           }
           $builde1 = $db->table('verify');
           $builde1->select('*');
           $builde1->like('brand', $j); 
           $builde1->orLike('conditions', $j); 
           $builde1->orLike('modelid', $j); 
           $builde1->orLike('model', $j); 
           $builde1->orLike('customer', $j); 
           $builde1->orLike('cpu', $j); 
           $builde1->orLike('hdd', $j); 
           $builde1->orLike('screen', $j); 
           $builde1->orLike('ram', $j); 
           $builde1->orLike('odd', $j); 
           $builde1->orLike('type', $j); 
           $builde1->update($dataf);
           return redirect()->to(site_url('/verify'));

        }

        elseif($m == 'faultyout'){
            $build = $db->table('faultyout');
            $build->select('*');
            $build->like('brand', $j); 
            $build->orLike('conditions', $j); 
            $build->orLike('modelid', $j); 
            $build->orLike('model', $j); 
            $build->orLike('customer', $j); 
            $build->orLike('cpu', $j); 
            $build->orLike('hdd', $j); 
            $build->orLike('screen', $j); 
            $build->orLike('ram', $j); 
            $build->orLike('odd', $j); 
            $build->orLike('type', $j); 
            $data = $build->get()->getResultArray();
            foreach($data as $d){
             if(!$dataa){
                 $builde->insert($d);
             }
           }
           $builde1 = $db->table('verify');
           $builde1->select('*');
           $builde1->like('brand', $j); 
           $builde1->orLike('conditions', $j); 
           $builde1->orLike('modelid', $j); 
           $builde1->orLike('model', $j); 
           $builde1->orLike('customer', $j); 
           $builde1->orLike('cpu', $j); 
           $builde1->orLike('hdd', $j); 
           $builde1->orLike('screen', $j); 
           $builde1->orLike('ram', $j); 
           $builde1->orLike('odd', $j); 
           $builde1->orLike('type', $j); 
           $builde1->update($datafo);
           return redirect()->to(site_url('/verify'));

        }
    }
    // end of issues here

    

    if($this->request->getVar('replace')){
        $x = $this->request->getVar('replace');
        $s = session()->get('random');
            
        $builder111 = $db->table('verify');
        $builder111->selectMax('id');
        $datas = $builder111->get()->getResultArray();
        foreach($datas as $ds):
            endforeach;

        $builde11 = $db->table('verify');
        $builde11->select('random');
        $builde11->where('id', $ds['id']);
        $dat11 = $builde11->get()->getResultArray();
        $s = $dat11[0]['random'];
        $column = $this->request->getVar('column');
    if($this->request->getVar('column') == 'Model'){
            $builder = $db->table('verify');
            $builder->select('*');
            $builder->where('random' , $s);
            $builder->update(['model' => $x]);
            return redirect()->back()->with('status', 'replaced successfully');

        }      
        elseif($this->request->getVar('column') == 'Brand'){
            $builder = $db->table('verify');
            $builder->select('*');
            $builder->where('random' , $s);
            $builder->update(['brand' => $x]);
             return redirect()->back()->with('status', 'replaced successfully');

        }      
        elseif($this->request->getVar('column') == 'Hdd'){
            $builder = $db->table('verify');
            $builder->select('*');
            $builder->where('random' , $s);
            $builder->update(['hdd' => $x]);
            return redirect()->back()->with('status', 'replaced successfully');

        }      
        elseif($this->request->getVar('column') == 'Speed'){
            $builder = $db->table('verify');
            $builder->select('*');
            $builder->where('random' , $s);
            $builder->update(['speed' => $x]);
            return redirect()->back()->with('status', 'replaced successfully');

        }      
        elseif($this->request->getVar('column') == 'Price'){
            $builder = $db->table('verify');
            $builder->select('*');
            $builder->where('random' , $s);
            $builder->update(['price' => $x]);
            return redirect()->back()->with('status', 'replaced successfully');

        }      
        elseif($this->request->getVar('column') == 'Ram'){
            $builder = $db->table('verify');
            $builder->select('*');
            $builder->where('random' , $s);
            $builder->update(['ram' => $x]);
            return redirect()->back()->with('status', 'replaced successfully');

        }      
        elseif($this->request->getVar('column') == 'Odd'){
            $builder = $db->table('verify');
            $builder->select('*');
            $builder->where('random' , $s);
            $builder->update(['odd' => $x]);
            return redirect()->back()->with('status', 'replaced successfully');

        }      
        elseif($this->request->getVar('column') == 'Problem'){
            $builder = $db->table('verify');
            $builder->select('*');
            $builder->where('random' , $s);
            $builder->update(['problem' => $x]);
            return redirect()->back()->with('status', 'replaced successfully');

        }      
        elseif($this->request->getVar('column') == 'Conditions'){
            $builder = $db->table('verify');
            $builder->select('*');
            $builder->where('random' , $s);
            $builder->update(['conditions' => $x]);
            return redirect()->back()->with('status', 'replaced successfully');

        }
        elseif($this->request->getVar('column') == 'gen'){
            $builder = $db->table('verify');
            $builder->select('*');
            $builder->where('random' , $s);
            $builder->update(['gen' => $x]);
            return redirect()->back()->with('status', 'replaced successfully');

        }      
        else{
            return redirect()->back()->with('status', 'No result found!');
        }
            return redirect()->back()->with('status', 'replaced successfully');
    }

        helper(['form', 'url']);
        $builder = $db->table('verify');
        $builder->select('verify.*')->orderBy('time', 'DESC');
        $data['items'] = $builder->get()->getResultArray();
        $data['user_data'] = $session->get('designation');
        $data['true'] = 0;
        // echo view('products/template/header.php');
        return view('products/verify', $data);
    }
