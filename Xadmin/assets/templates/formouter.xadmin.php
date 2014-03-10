    <div class="ftitle">[+title+]</div>
    <form id="fm" method="post">
        [+finner+]
        <button type="button" class="btn btn-success" onclick="saveRow()">
            Сохранить
        </button>

        <button type="button" class="btn btn-warning" onclick="$('#dlg').dialog('close')">
            Отмена
        </button>            
        
    </form>
<script>
$(function() {
    // alert(rowData.p_category);
    $('#fm').form('load',rowData);
});
</script>