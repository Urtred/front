<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.2.1/dt-1.10.16/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.2.1/dt-1.10.16/datatables.min.js"></script>
<span>Para selecionar mais de uma coluna precione SHIFT e click na coluna desejada</span>
<hr>
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Edition</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($model->data as $key => $value): ?>
            <tr>
                <td><?php echo $value->title ?></td>
                <td><?php echo $value->author ?></td>
                <td><?php echo $value->edition_year ?></td>
            </tr>  
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>