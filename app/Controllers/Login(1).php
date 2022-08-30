public function sverify()
     {
         
         $db      = \Config\Database::connect();
         $session = \Config\Services::session();
         $sess = $session->get('user_name');
         // $seri alno = $this->request->getPost('serialno');
         if($this->request->getVar('serialno')){
             $data = [
                 'serialno' => $this->request->getVar('serialno'),
                 'random' => $this->request->getVar('random'),
                 'tbl' => $this->request->getVar('table'),
                 'session' => $sess,
             ];
             $builder = $db->table('barcodes');
             $builder->select('serialno');
             $builder->where('serialno' , $data['serialno']);
             $da = $builder->get()->getResultArray();
             if(!$da){
                 $db->table('barcodes')->insert($data);
             }
             return redirect()->to(base_url('ProductsCrud/verify'));
         }
 
         $datam = [
             'random' => $this->request->getPost('random'),
             'time' => date("h:i:sa"),
             'tbl' => 'Stockin',
             'terms' => $sess,

         ];
 
         $dataso = [
             'random' => $this->request->getPost('random'),
             'time' => date("h:i:sa"),
             'terms' => $sess,

             'tbl' => 'Stockout'
         ];
 
         $dataf = [
             'random' => $this->request->getPost('random'),
             'terms' => $sess,
             'time' => date("h:i:sa"),
             'tbl' => 'faulty'
         ];
 
         $datafo = [
             'random' => $this->request->getPost('random'),
             'time' => date("h:i:sa"),
             'terms' => $sess,
             'tbl' => 'faultyout'
         ];
 
         $dataw = [
             'random' => $this->request->getPost('random'),
             'time' => date("h:i:sa"),
             'terms' => $sess,
             'tbl' => 'warrantyin'
         ];
 
         $datawo = [
             'random' => $this->request->getPost('random'),
             'time' => date("h:i:sa"),
             'terms' => $sess,
             'tbl' => 'warranty out'
         ];
 
         $datac = [
             'random' => $this->request->getPost('random'),
             'time' => date("h:i:sa"),
             'terms' => $sess,
             'tbl' => 'credit'
         ];
 
         $datad = [
             'random' => $this->request->getPost('random'),
             'time' => date("h:i:sa"),
             'terms' => $sess,
             'tbl' => 'debit'
         ];
 
         if($this->request->getVar('ans') == 'true'){
            // echo 'true';
            // exit;
             $bulders = $db->table('barcodes');
             $bulders->select('*');
             $databs = $bulders->get()->getResultArray();
             foreach($databs as $dbs):
             endforeach;
             $table = $dbs['tbl'];
             $serialno = $dbs['serialno'];
             $date = date("h:i:sa");
 
             $builder5 = $db->table("verify");
             $builder5->select('verify.*')->orderBy('time', 'DESC');
             $builder5->where('verify.assetid', $serialno);
             $data5 = $builder5->get()->getResultArray();
 
             if($table == 'Stockin'){
             $bulders = $db->table('barcodes');
             $bulders->select('*');
             $databs = $bulders->get()->getResultArray();
                 foreach($databs as $dsb){
                     $serialno = $dsb['serialno'];
                     $builder1 = $db->table("masterlist");
                     $builder1->select('masterlist.*');
                     $builder1->where('masterlist.assetid', $serialno);
                     $data1 = $builder1->get()->getResultArray();
                     foreach($data1 as $r) {
                         if(!$data5){
                             $builder5->insert($r);
                         }
                             $builder51 = $db->table('verify');
                             $builder51->select('*');
                             $builder51->where('verify.assetid', $serialno);
                             $builder51->update($datam);
                         }
                 }
                 $db->table('barcodes')->emptyTable();
                 return redirect()->to('ProductsCrud/verify');
             } 
             
             if($table == 'stockout'){
                 $bulders = $db->table('barcodes');
                 $bulders->select('*');
                 $databs = $bulders->get()->getResultArray();
                     foreach($databs as $dsb){
                         $serialno = $dsb['serialno'];
                         $builder1 = $db->table("stockout");
                         $builder1->select('stockout.*');
                         $builder1->where('stockout.assetid', $serialno);
                         $data1 = $builder1->get()->getResultArray();
                         foreach($data1 as $r) {
                             if(!$data5){
                                 $builder5->insert($r);
                             }
                                 $builder51 = $db->table('verify');
                                 $builder51->select('*');
                                 $builder51->where('verify.assetid', $serialno);
                                 $builder51->update($dataso);
                             }
                     }
                     $db->table('barcodes')->emptyTable();
                     return redirect()->to('ProductsCrud/verify');
                 }
 
                 if($table == 'warrantyin'){
                     $bulders = $db->table('barcodes');
                     $bulders->select('*');
                     $databs = $bulders->get()->getResultArray();
                         foreach($databs as $dsb){
                             $serialno = $dsb['serialno'];
                             $builder1 = $db->table("warrantyin");
                             $builder1->select('warrantyin.*');
                             $builder1->where('warrantyin.assetid', $serialno);
                             $data1 = $builder1->get()->getResultArray();
                             foreach($data1 as $r) {
                                 if(!$data5){
                                     $builder5->insert($r);
                                 }
                                     $builder51 = $db->table('verify');
                                     $builder51->select('*');
                                     $builder51->where('verify.assetid', $serialno);
                                     $builder51->update($dataw);
                                 }
                         }
                         $db->table('barcodes')->emptyTable();
                         return redirect()->to('ProductsCrud/verify');
                 }
 
                 if($table == 'faulty'){
                     $bulders = $db->table('barcodes');
                     $bulders->select('*');
                     $databs = $bulders->get()->getResultArray();
                         foreach($databs as $dsb){
                             $serialno = $dsb['serialno'];
                             $builder1 = $db->table("faulty");
                             $builder1->select('faulty.*');
                             $builder1->where('faulty.assetid', $serialno);
                             $data1 = $builder1->get()->getResultArray();
                             foreach($data1 as $r) {
                                 if(!$data5){
                                     $builder5->insert($r);
                                 }
                                     $builder51 = $db->table('verify');
                                     $builder51->select('*');
                                     $builder51->where('verify.assetid', $serialno);
                                     $builder51->update($dataf);
                                 }
                         }
                         $db->table('barcodes')->emptyTable();
                         return redirect()->to('ProductsCrud/verify');
                 }
 
                 if($table == 'faultyout'){
                     $bulders = $db->table('barcodes');
                     $bulders->select('*');
                     $databs = $bulders->get()->getResultArray();
                         foreach($databs as $dsb){
                             $serialno = $dsb['serialno'];
                             $builder1 = $db->table("faultyout");
                             $builder1->select('faultyout.*');
                             $builder1->where('faultyout.assetid', $serialno);
                             $data1 = $builder1->get()->getResultArray();
                             foreach($data1 as $r) {
                                 if(!$data5){
                                     $builder5->insert($r);
                                 }
                                     $builder51 = $db->table('verify');
                                     $builder51->select('*');
                                     $builder51->where('verify.assetid', $serialno);
                                     $builder51->update($datafo);
                                 }
                         }
                         $db->table('barcodes')->emptyTable();
                         return redirect()->to('ProductsCrud/verify');
                 }
                 if($table == 'warrantyout'){
                     $bulders = $db->table('barcodes');
                     $bulders->select('*');
                     $databs = $bulders->get()->getResultArray();
                         foreach($databs as $dsb){
                             $serialno = $dsb['serialno'];
                             $builder1 = $db->table("warrantyout");
                             $builder1->select('warrantyout.*');
                             $builder1->where('warrantyout.assetid', $serialno);
                             $data1 = $builder1->get()->getResultArray();
                             foreach($data1 as $r) {
                                 if(!$data5){
                                     $builder5->insert($r);
                                 }
                                     $builder51 = $db->table('verify');
                                     $builder51->select('*');
                                     $builder51->where('verify.assetid', $serialno);
                                     $builder51->update($datawo);
                                 }
                         }
                         $db->table('barcodes')->emptyTable();
                         return redirect()->to('ProductsCrud/verify');
                 }
                 if($table == 'credit'){
                     $bulders = $db->table('barcodes');
                     $bulders->select('*');
                     $databs = $bulders->get()->getResultArray();
                         foreach($databs as $dsb){
                             $serialno = $dsb['serialno'];
                             $builder1 = $db->table("credit");
                             $builder1->select('credit.*');
                             $builder1->where('credit.assetid', $serialno);
                             $data1 = $builder1->get()->getResultArray();
                             foreach($data1 as $r) {
                                 if(!$data5){
                                     $builder5->insert($r);
                                 }
                                     $builder51 = $db->table('verify');
                                     $builder51->select('*');
                                     $builder51->where('verify.assetid', $serialno);
                                     $builder51->update($datac);
                                 }
                         }
                         $db->table('barcodes')->emptyTable();
                         return redirect()->to('ProductsCrud/verify');
                 }
 
                 if($table == 'debit'){
                     $bulders = $db->table('barcodes');
                     $bulders->select('*');
                     $databs = $bulders->get()->getResultArray();
                         foreach($databs as $dsb){
                             $serialno = $dsb['serialno'];
                             $builder1 = $db->table("debit");
                             $builder1->select('debit.*');
                             $builder1->where('debit.assetid', $serialno);
                             $data1 = $builder1->get()->getResultArray();
                             foreach($data1 as $r) {
                                 if(!$data5){
                                     $builder5->insert($r);
                                 }
                                     $builder51 = $db->table('verify');
                                     $builder51->select('*');
                                     $builder51->where('verify.assetid', $serialno);
                                     $builder51->update($datad);
                                 }
                         }
                         $db->table('barcodes')->emptyTable();
                         return redirect()->to('ProductsCrud/verify');
                 }
 
          if($table == 'All'){
                $bulders = $db->table('barcodes');
                 $bulders->select('*');
                 $databs = $bulders->get()->getResultArray();
                 foreach($databs as $dsb):
                  $serialno = $dsb['serialno'];
             
                 $builder1 = $db->table("masterlist");
                 $builder1->select('masterlist.*');
                 $builder1->where('masterlist.assetid', $serialno);
                 $data1 = $builder1->get()->getResultArray();
 
                 $builder2 = $db->table("stockout");
                 $builder2->select('stockout.*');
                 $builder2->where('stockout.assetid', $serialno);
                 $data2 = $builder2->get()->getResultArray();
 
                 $builder3 = $db->table("warrantyin");
                 $builder3->select('warrantyin.*');
                 $builder3->where('warrantyin.assetid', $serialno);
                 $data3 = $builder3->get()->getResultArray();
 
                 $builder4 = $db->table("faulty");
                 $builder4->select('faulty.*');
                 $builder4->where('faulty.assetid', $serialno);
                 $data4 = $builder4->get()->getResultArray();
 
                 $builder6 = $db->table("faultyout");
                 $builder6->select('faultyout.*');
                 $builder6->where('faultyout.assetid', $serialno);
                 $data6 = $builder6->get()->getResultArray();
 
                 $builder7 = $db->table("warrantyout");
                 $builder7->select('warrantyout.*');
                 $builder7->where('warrantyout.assetid', $serialno);
                 $data7 = $builder7->get()->getResultArray();
 
                 $builder8 = $db->table("debit");
                 $builder8->select('debit.*');
                 $builder8->where('debit.assetid', $serialno);
                 $data8 = $builder8->get()->getResultArray();
 
                 $builder9 = $db->table("credit");
                 $builder9->select('credit.*');
                 $builder9->where('credit.assetid', $serialno);
                 $data9 = $builder9->get()->getResultArray();

                 
 
            //    checking masterlist
                if($data1){
                    foreach($data1 as $r) {
                        if(!$data5){
                            $builder5->insert($r);
                        }
                
                        $builder51 = $db->table('verify');
                        $builder51->select('*');
                        $builder51->where('verify.assetid', $serialno);
                        $builder51->update($datam);
                        // $builder5->update(['time'=> $date]);                            
                    }
                 $db->table('barcodes')->emptyTable();
                //  return redirect()->to('ProductsCrud/verify');
               } 
 
            // checking stockout
            elseif($data2){
                foreach($data2 as $r) {
                    if(!$data5){
                        $builder5->insert($r);
                    }
                    $builder51 = $db->table('verify');
                    $builder51->select('*');
                    $builder51->where('verify.assetid', $serialno);
                    $builder51->update($dataso);
        
                }
                $db->table('barcodes')->emptyTable();
                // return redirect()->to('ProductsCrud/verify');
            }
        
            // checking warrantyin
            elseif($data3){
                foreach($data3 as $r) {
            
                    if(!$data5){
                        $builder5->insert($r);
                    }
                    $builder51 = $db->table('verify');
                    $builder51->select('*');
                    $builder51->where('verify.assetid', $serialno);
                    $builder51->update($dataw);
                    // $builder5->update(['time'=> $date]);                            
                }
                $db->table('barcodes')->emptyTable();
                // return redirect()->to('ProductsCrud/verify');
            }
 
            // checking faulty in
            elseif($data4){
                foreach($data4 as $r) {
            
                    if(!$data5){
                        $builder5->insert($r);
                    }
                    $builder51 = $db->table('verify');
                    $builder51->select('*');
                    $builder51->where('verify.assetid', $serialno);
                    $builder51->update($dataf);
                    // $builder5->update(['time'=> $date]);                            
                }
                 $db->table('barcodes')->emptyTable();
                //  return redirect()->to('ProductsCrud/verify');
            }        
         
            // checkin table  faultyout
            elseif($data6){
                foreach($data6 as $r) {
                    if(!$data5){
                        $builder5->insert($r);
                    }
                    $builder51 = $db->table('verify');
                    $builder51->select('*');
                    $builder51->where('verify.assetid', $serialno);
                    $builder51->update($datafo);
                    // $builder5->update(['time'=> $date]);                            
                }
                $db->table('barcodes')->emptyTable();
                // return redirect()->to('ProductsCrud/verify');
            }
          
            // checking table warrantyout
            elseif($data7){
                foreach($data7 as $r) {
                    if(!$data5){
                        $builder5->insert($r);
                    }
                    $builder51 = $db->table('verify');
                    $builder51->select('*');
                    $builder51->where('verify.assetid', $serialno);
                    $builder51->update($datawo);
                    // $builder5->update(['time'=> $date]);                            
                }
                 $db->table('barcodes')->emptyTable();
                //  return redirect()->to('ProductsCrud/verify');
            }
 
            // checkin in debit 
            elseif($data8){
                foreach($data8 as $r) {
                    if(!$data5){
                        $builder5->insert($r);
                    }
                    $builder51 = $db->table('verify');
                    $builder51->select('*');
                    $builder51->where('verify.assetid', $serialno);
                    $builder51->update($datad);
                    // $builder5->update(['time'=> $date]);                            
                }
                $db->table('barcodes')->emptyTable();
                // return redirect()->to('ProductsCrud/verify');
            }
         
            elseif($data9){
                foreach($data9 as $r) {
            
                    if(!$data5){
                        $db->table('verify')->insert($r);
                    }
                    $builder51 = $db->table('verify');
                    $builder51->select('*');
                    $builder51->where('verify.assetid', $serialno);
                    $builder51->update($datac);
                    // $builder5->update(['time'=> $date]);                            
                }
                $db->table('barcodes')->emptyTable();
                // return redirect()->to('ProductsCrud/verify');
            }

         else{
            $db->table('barcodes')->emptyTable();
         return redirect()->to('ProductsCrud/verify'); 
         

         }
         endforeach;
         return redirect()->to('ProductsCrud/verify'); 
         $db->table('barcodes')->emptyTable();
        
         // }
       }
         $db->table('barcodes')->emptyTable();
         }
         $db->table('barcodes')->emptyTable();
         return redirect()->to('ProductsCrud/verify'); 
     }