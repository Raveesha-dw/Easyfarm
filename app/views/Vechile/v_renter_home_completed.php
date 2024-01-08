<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT . '/views/inc/components/sidebars/vehicleRenter_sidebar.php'?>
<!-- <?php print_r($data)?> -->
<?php require APPROOT .'/views/inc/components/navbars/renter_nav.php'?>


<!-- <?php $products=$data; ?> -->
<!-- <?php foreach ($products as $product) : ?> -->

 <!-- <div class ="msg-box">
       <div class ="m-header">
              <div class ="msg-ID">
                     <div class="m-img">
                            <img src="<?php echo URLROOT?>/public/images/seller/user.png" alt="">
                     </div>
                
              </div>
              <div class="msg-date"> <p><?php echo $product->Name ?></p>
                      <p><?php echo $product->placed_Date ?><p>
              </div>
                
                
       </div>  -->

       <!-- <div class="msg-f"> 
              
                     <div class="msg-f-detail">
                            <h3><?php echo $product->Name ?> wants <?php echo $product->Item_name ?> in <?php echo $product->quantity ?> <?php echo $product->Unit_type?></h3>
                            <br>
                     </div>
                            <div class="msg-pdroduct">
                            <h3>Iteam&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->Item_name ?></h3>
                            <h3>Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->quantity ?><?php echo $product->Unit_type?></h3>
                            <h3>TO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->Address?></h3>
                            <h3>Method&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->DeliveryMethod?></h3>


                            </div> -->
                            <!-- <div class="button-msg">
                            
                           not needed  <button class="dd"> <a href="http://localhost/Easyfarm/Seller_home/update_status?id=<?php echo $product->Order_ID; ?>" onclick="changeText(this)" ><?php echo $product->Status; ?> </a> </button>

                                    
                            </div> -->
                            
       <!-- </div> -->
        
 <!-- </div>  -->

 <!-- <?php  endforeach;?> -->
                            <!-- <script>
                                   
                                   console.log(data);
                                   function changeText(button) {
                                   // var button = document.querySelector('.button-msg .dd');
                                    button.textContent = "APPROVED";
                                   //  button.style.backgroundColor = "green";
                                    }
                                   
                            </script> -->
                           
 

 <!-- <br></br> -->
 <!-- <br></br> -->
 





<!-- // new one -->

<?php $products=$data; ?>
<!-- <?php foreach ($products as $product) :?> -->
       <!-- <?php  endforeach;?> -->
       <!--  -->


<div class ="shero6">

    <main class="table" id="customers_table">
    
        <section class="table__header">
        
            <h1>Customer's Orders</h1>

            <!-- filter by date -->
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date">
            
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date">
            <a href="your_link_here" id="filter_button">Filter</a>
           

            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="<?php echo URLROOT?>/public/images/seller/search.png" alt="">
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="<?php echo URLROOT?>/public/images/seller/pdf.png" alt=""></label>
                    <label for="export-file" id="toJSON">JSON <img src="<?php echo URLROOT?>/public/images/seller/json.png" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="<?php echo URLROOT?>/public/images/seller/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="<?php echo URLROOT?>/public/images/seller/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                    
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Customer <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Location <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Order Date <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Price <span class="icon-arrow">&UpArrow;</span></th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product) :?>
                    <tr>
                    
                        <td> <?php echo $product->Order_ID ?> </td>
                        <td> <img src="images/Zinzu Chan Lee.jpg" alt=""><?php echo $product->Name ?></td>
                        <td> <?php echo $product->Address ?> </td>
                        <td> <?php echo $product->placed_Date ?> </td>
                        <td>
                            <p class="status delivered"><?php echo $product->Status; ?></p>
                        </td>
                        <td> <strong> <?php echo $product->Unit_price?> </strong></td>

                   
                    </tr>
                    <?php  endforeach;?>
                    
                    
                    
                </tbody>
            </table>
        </section>
    </main>
    <!-- <script src="script.js"></script> -->

 </div>


<script>


const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');


// new part


    startDateInput = document.getElementById('start_date'),
    endDateInput = document.getElementById('end_date'),
    filterButton = document.getElementById('filter_button');

// Set the max attribute of date inputs to the current date
const today = new Date().toISOString().split('T')[0];
startDateInput.setAttribute('max', today);
endDateInput.setAttribute('max', today);




// 1. Searching for specific data of HTML table
search.addEventListener('input', searchTable);


// new part 

filterButton.addEventListener('click', filterData);



function filterData(event) {
    event.preventDefault(); 
    const startDate = new Date(startDateInput.value);
    const endDate = new Date(endDateInput.value);

    if (isNaN(startDate.getTime()) || isNaN(endDate.getTime())) {
        // Handle case where dates are not valid
        console.log('Invalid dates');
        return;
    }

    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = search.value.toLowerCase();

        // Additional condition to filter data between two dates
        const orderDate = new Date(row.querySelector('td:nth-child(4)').textContent);
        const isDateInRange = orderDate >= startDate && orderDate <= endDate;

        row.classList.toggle('hide', !isDateInRange || !table_data.includes(search_data));
        row.style.setProperty('--delay', i / 25 + 's');
    });

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}


// 


function searchTable() {
    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = search.value.toLowerCase();

        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i / 25 + 's');
    })

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}

// 2. Sorting | Ordering data of HTML table

table_headings.forEach((head, i) => {
    let sort_asc = true;
    head.onclick = () => {
        table_headings.forEach(head => head.classList.remove('active'));
        head.classList.add('active');

        document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
        table_rows.forEach(row => {
            row.querySelectorAll('td')[i].classList.add('active');
        })

        head.classList.toggle('asc', sort_asc);
        sort_asc = head.classList.contains('asc') ? false : true;

        sortTable(i, sort_asc);
    }
})


function sortTable(column, sort_asc) {
    [...table_rows].sort((a, b) => {
        let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
            second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

        return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
    })
        .map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
}

// 3. Converting HTML table to PDF

const pdf_btn = document.querySelector('#toPDF');
const customers_table = document.querySelector('#customers_table');


const toPDF = function (customers_table) {
    const html_code = `
    <!DOCTYPE html>
    <link rel="stylesheet" type="text/css" href="style.css">
    <main class="table" id="customers_table">${customers_table.innerHTML}</main>`;

    const new_window = window.open();
     new_window.document.write(html_code);

    setTimeout(() => {
        new_window.print();
        new_window.close();
    }, 400);
}

pdf_btn.onclick = () => {
    toPDF(customers_table);
}

// 4. Converting HTML table to JSON

const json_btn = document.querySelector('#toJSON');

const toJSON = function (table) {
    let table_data = [],
        t_head = [],

        t_headings = table.querySelectorAll('th'),
        t_rows = table.querySelectorAll('tbody tr');

    for (let t_heading of t_headings) {
        let actual_head = t_heading.textContent.trim().split(' ');

        t_head.push(actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase());
    }

    t_rows.forEach(row => {
        const row_object = {},
            t_cells = row.querySelectorAll('td');

        t_cells.forEach((t_cell, cell_index) => {
            const img = t_cell.querySelector('img');
            if (img) {
                row_object['customer image'] = decodeURIComponent(img.src);
            }
            row_object[t_head[cell_index]] = t_cell.textContent.trim();
        })
        table_data.push(row_object);
    })

    return JSON.stringify(table_data, null, 4);
}

json_btn.onclick = () => {
    const json = toJSON(customers_table);
    downloadFile(json, 'json')
}

// 5. Converting HTML table to CSV File

const csv_btn = document.querySelector('#toCSV');

const toCSV = function (table) {
    // Code For SIMPLE TABLE
    // const t_rows = table.querySelectorAll('tr');
    // return [...t_rows].map(row => {
    //     const cells = row.querySelectorAll('th, td');
    //     return [...cells].map(cell => cell.textContent.trim()).join(',');
    // }).join('\n');

    const t_heads = table.querySelectorAll('th'),
        tbody_rows = table.querySelectorAll('tbody tr');

    const headings = [...t_heads].map(head => {
        let actual_head = head.textContent.trim().split(' ');
        return actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase();
    }).join(',') + ',' + 'image name';

    const table_data = [...tbody_rows].map(row => {
        const cells = row.querySelectorAll('td'),
            img = decodeURIComponent(row.querySelector('img').src),
            data_without_img = [...cells].map(cell => cell.textContent.replace(/,/g, ".").trim()).join(',');

        return data_without_img + ',' + img;
    }).join('\n');

    return headings + '\n' + table_data;
}

csv_btn.onclick = () => {
    const csv = toCSV(customers_table);
    downloadFile(csv, 'csv', 'customer orders');
}

// 6. Converting HTML table to EXCEL File

const excel_btn = document.querySelector('#toEXCEL');

const toExcel = function (table) {
    // Code For SIMPLE TABLE
    // const t_rows = table.querySelectorAll('tr');
    // return [...t_rows].map(row => {
    //     const cells = row.querySelectorAll('th, td');
    //     return [...cells].map(cell => cell.textContent.trim()).join('\t');
    // }).join('\n');

    const t_heads = table.querySelectorAll('th'),
        tbody_rows = table.querySelectorAll('tbody tr');

    const headings = [...t_heads].map(head => {
        let actual_head = head.textContent.trim().split(' ');
        return actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase();
    }).join('\t') + '\t' + 'image name';

    const table_data = [...tbody_rows].map(row => {
        const cells = row.querySelectorAll('td'),
            img = decodeURIComponent(row.querySelector('img').src),
            data_without_img = [...cells].map(cell => cell.textContent.trim()).join('\t');

        return data_without_img + '\t' + img;
    }).join('\n');

    return headings + '\n' + table_data;
}

excel_btn.onclick = () => {
    const excel = toExcel(customers_table);
    downloadFile(excel, 'excel');
}

const downloadFile = function (data, fileType, fileName = '') {
    const a = document.createElement('a');
    a.download = fileName;
    const mime_types = {
        'json': 'application/json',
        'csv': 'text/csv',
        'excel': 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    }
    a.href = `
        data:${mime_types[fileType]};charset=utf-8,${encodeURIComponent(data)}
    `;
    document.body.appendChild(a);
    a.click();
    a.remove();
}

</script>









<?php require APPROOT . '/views/inc/footer.php';?>  
                            
        
        
        
         