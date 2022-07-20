<?php include('template/header.php'); ?>
<br/><br/><br/><br/>
<div class="row">
    <div class="col-10">
<form>
        <input class="float-end" type="button" value="Print"
               onclick="window.print()" />
 </form>
<?php
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("masterlist");
        $builder->select('masterlist.*');
        $data['items'] = $builder->get()->getResultArray();
        
        foreach($data as $l['item']):
           
        endforeach;
        foreach($l as $all):
        endforeach;
        foreach($all as $al):
         $examples = '<h5>DEL</h5>';
         $example = '<h5>'.$al['type'].'</h5>';
        $barcode = new \Com\Tecnick\Barcode\Barcode(); ?>
    
    <div class="row">
    <div class="col">
    <?php $bobj = $barcode->getBarcodeObj('UPCE', $al['assetid'], -3, -30, 'black', array(0, 0, 0, 0));
     $examples .= '<h4><span>'.'</h4><div class="col-4">'.$bobj->getSvgCode().$al['del'].'</div>'; ?>
    </div>
    <div class="col">
    <?php $bobj1 = $barcode->getBarcodeObj('UPCE', $al['assetid'], -3, -30, 'black', array(0, 0, 0, 0));
        $example .= '<div class="col-6>"'.$bobj1->getSvgCode().'</div>'.'<br/>'.'<h5>ASSET ID:'.$al['assetid'].'</h5>'.'<h5> CONDITION:'.$al['conditions'].'</h5>'.'<h5>HDD:</h5>'.$al['hdd'].'<h5>SCREEN:</h5>'.$al['screen'].'<h5>ODD:</h5>'.$al['odd'].'</div>';
    ?>
    </div>
  </div>


  <form>
  <div class="row p-5">
    <div class="col-6">
    <?php echo $example; ?>
    
    </div>
    <div class="col-4">
    <?php echo $examples; ?>
    </div>
  </div>
</form>
 <?php endforeach;

?>
  </div>      
  </div>
 

 
  
