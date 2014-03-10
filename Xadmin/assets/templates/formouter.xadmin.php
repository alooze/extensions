    <!-- <div id="dlg1" style="[+style+]"> -->
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
    <!-- </div> -->
    <!-- <div id="dlg-buttons"> -->
        <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveRow()">
            Сохранить
        </a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="$('#dlg').dialog('close')">
            Отмена
        </a> -->
    <!-- </div> -->
<script>
$(function() {
    // alert(rowData.p_category);
    $('#fm').form('load',rowData);
});
</script>