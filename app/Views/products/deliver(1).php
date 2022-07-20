<?php include('template/header.php');?>
<script type="text/javascript">
    $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>
<style type="text/css">
    #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 7px!important;
        overflow: hidden!important
    }

    

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
          <?php if($masterlist): ?>
          <?php foreach($masterlist as $user):?>
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="http://lobianijs.com/lobiadmin/version/1.0/ajax/img/logo/lobiadmin-logo-text-64.png" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            TT GLOBAL
                            </a>
                        </h2>
                        <div>455 Ngong road, Nairobi, Kenya</div>
                        <div>(254) xxx xx xxx</div>
                        <div>finalnce@ttglobal.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?= $user['customer'];?></h2>
                        <div class="address"></div>
                        <div class="email"></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE: <?= $user['assetid'];?></h1>
                        <div class="date">Date of Invoice: <?= $user['daterecieved'];?></div>
                        <div class="date">Due Date: <?= $user['datedelivered'];?></div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr >
                        <tr class="">
                            <th>#</th>
                            <th class="text-left">ITEM</th>
                            <th class="text-right">PRICE</th>
                            <th class="text-right">QUANTITY</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            
                            <tr >
                            <td>02</th>
                            <td class="text-left"><?=  $user['type']; ?></td>
                            <td class="text-right"><?=  $user['price']; ?> </td>
                            <td class="text-right"><?=  $user['qty']; ?></td>
                            <td class="text-right"><?=  $user['total']; ?></td>
                        </tr>
                            >
                        <tr>
                            <td>03</th>
                            <td class="text-left"><?=  $user['type']; ?></td>
                            <td class="text-right"><?=  $user['price']; ?> </td>
                            <td class="text-right"><?=  $user['qty']; ?></td>
                            <td class="text-right"><?=  $user['total']; ?></td>
                        </tr>
                        <tr>
                            <td>04</th>
                            <td class="text-left"><?=  $user['type']; ?></td>
                            <td class="text-right"><?=  $user['price']; ?> </td>
                            <td class="text-right"><?=  $user['qty']; ?></td>
                            <td class="text-right"><?=  $user['total']; ?></td>
                        </tr>
                       <tr>
                            <td>05</th>
                            <td class="text-left"><?=  $user['type']; ?></td>
                            <td class="text-right"><?=  $user['price']; ?> </td>
                            <td class="text-right"><?=  $user['qty']; ?></td>
                            <td class="text-right"><?=  $user['total']; ?></td>
                        </tr>>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td><?= $user['total'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 25%</td>
                            <td><?= $user['total'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td><?= $user['total'] ?></td>>
                        </tr>
                    </tfoot>
                    <?php endforeach; ?>
                   <?php endif; ?>
                 </td>
               </tr>
             </tr>
           </tbody>
         </table>
       </main>
     </div>
   </div></div>

                 
<?php include('template/footer.php');