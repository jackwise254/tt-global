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