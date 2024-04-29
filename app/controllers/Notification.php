<?php class Notification extends Controller{
        private $notificationModel;

        public function __construct(){
                $this->notificationModel=$this->model('M_notification');
        }

        public function get_notification(){
                // print_r("dd");
                $data = $this->notificationModel->get_notification();
        }
}

// inventory
// <div class="headebr">
//         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

//     <div>
//         <?php require APPROOT . '/views/inc/header.php'; ?>
//         <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
//     </div>

//     <div class="container">
//         <?php require APPROOT . '/views/seller/a.php' ?>

//         <section class="home">
//             <div class="itable-section">
//                 <table id="myTable">
//                     <thead>
//                         <tr>
//                             <th data-sort="number">S No.</th>
//                             <th data-sort="string">Product</th>
//                             <th data-sort="string">Name</th>
//                             <th data-sort="string">Available Size</th>
//                             <th data-sort="date">Expiry date</th>
//                         </tr>
//                     </thead>
//                     <tbody>
//                         <?php
//                         $products = $data;
//                         $count = 1;
//                         foreach ($products as $product) :
//                         ?>
//                             <tr>
//                                 <td><?php echo $count; ?></td>
//                                 <td> <img src="<?php echo URLROOT ?>/public/images/seller/<?php echo $product->Image; ?>"/> </td>
//                                 <td><?php echo $product->Item_name ?></td>
//                                 <td><?php echo $product->remainingStock ?></td>
//                                 <td><?php echo $product->Expiry_date ?></td>
//                             </tr>
//                         <?php $count++;
//                         endforeach; ?>
//                     </tbody>
//                 </table>
//             </div>
//             <?php require APPROOT . '/views/inc/footer.php'; ?>
//         </section>
//     </div>
// </div>

// <script>
//     $(document).ready(function(){
//         $("#myTable th").click(function(){
//             var table = $(this).parents('table').eq(0);
//             var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()));
//             this.asc = !this.asc;
//             if (!this.asc){rows = rows.reverse()}
//             for (var i = 0; i < rows.length; i++){table.append(rows[i])}
//         });
//         function comparer(index) {
//             return function(a, b) {
//                 var valA = getCellValue(a, index), valB = getCellValue(b, index)
//                 return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
//             }
//         }
//         function getCellValue(row, index){ return $(row).children('td').eq(index).text() }
//     });
// </script>