    <div id="dlg" class="easyui-dialog" style="[+style+]"
            closed="true" buttons="#dlg-buttons">
        <div class="ftitle">[+title+]</div>
        <form id="fm" method="post">
            [+finner+]
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveRow()">
            Сохранить
        </a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="$('#dlg').dialog('close')">
            Отмена
        </a>
    </div>