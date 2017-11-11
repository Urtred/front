<script src="https://use.fontawesome.com/00fcd64677.js"></script>
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><a href="admin<?php echo (strlen($link['title'])>0)?'?'.$link['title']:''; ?>">Title<i class="fa fa-sort"></i></a></th>
            <th><a href="admin<?php echo (strlen($link['author'])>0)?'?'.$link['author']:''; ?>">Author<i class="fa fa-sort"></i></a></th>
            <th><a href="admin<?php echo (strlen($link['edition_year'])>0)?'?'.$link['edition_year']:''; ?>">Edition<i class="fa fa-sort"></i></a></th>
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
