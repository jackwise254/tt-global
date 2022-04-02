$(document).ready(function(){
	$('#data_table').Tabledit({
		deleteButton: false,
		editButton: true,   		
		columns: {
		  identifier: [0, 'id'],                    
		  editable: [[1, 'conditions'], [2, 'type'], [3, 'gen'], [4, 'screen'], [5, 'part'],[6, 'serialno'], [7, 'modelid'], [8, 'cpu'], [9, 'speed'], [10, 'price']]
		},
		hideIdentifier: true,
		url: 'live_edit.php'		
	});
});