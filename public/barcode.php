<div class="card">
    <form method="POST" action="">
    <input type="text" name="customerName" placeholder="Enter customer name" required>
 
    <table>
        <tr>
            <th scope="col">#</th>
            <th>Item Name</th>
            <th>Item price</th>
            <th>Item Quantity</th>            
        </tr>
        <tbody id="tbody"></tbody>
    </table>
 
    <button type="button" onclick="addItem();">Add Item</button>
    <input type="submit" name="addInvoice" value="Add Invoice">
</form>
<script>
    var items = 0;
    function addItem() {
        items++;
 
        var html = "<tr>";
            html += "<td>" + items + "</td>";
            html += "<td><input type='text' name='itemName[]'></td>";
            html += "<td><input type='number' name='piece_price[]'></td>";
            html += "<td><input type='number' name='itemQuantity[]'></td>";            
            html += "<td><button type='button' onclick='deleteRow(this);'>Delete</button></td>"
            
        html += "</tr>";
 
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
    }
 
function deleteRow(button) {
    button.parentElement.parentElement.remove();
   
}
</script>