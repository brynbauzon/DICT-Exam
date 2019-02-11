<html>
<head>
	<title>iGovPhil</title>
	<meta charset="utf-8">
</head>
<body>
	<table class="table table-striped table-bordered table-hover dataTables" width="100%">
		<thead>
			<tr>
				<th>UACS</th>
				<th>Department</th>
				<th>Agency</th>
			</tr>
		</thead>
		<tbody id="tblGovPhil">
		</tbody>
	</table>
</body>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(function(){
    table = setDataTable();
    table.clear().draw();

    loadDataTable();

    function loadDataTable(){
        $.ajax({
            type: "GET",
            url: "igovphil.php",
            dataType: "json",
            asyc: true,
            beforeSend: function () {
                table.destroy();
                $("#tblGovPhil").empty();
                $("#tblGovPhil").append("<tr><td colspan='3'><center><img src='spinner.gif'/></center></td></tr>");
            },
            success: function (data) {
                $("#tblGovPhil").empty();
                if(data.length > 0){
                    $.each(data, function (key, value) {
                        $("#tblGovPhil").append("<tr><td>" + value.uacs + "</td><td>" + value.department + "</td><td>" + value.agency + "</td></tr>");
                    });
                }else{
                    $("#tblGovPhil").empty();
                }
            }
        }).done(function(){
            table = setDataTable();
        });
    }

    function setDataTable(){
        return $('.dataTables').DataTable({
            "paging": false,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true
        });
    }
});
</script>
</html>
