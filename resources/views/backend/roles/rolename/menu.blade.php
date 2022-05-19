<li >
    <i></i>
    <label>
        <input name=permission[] value="menu_all"  data-id="menu_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'menu_all') }}/>
        <span class="label label-warning">Bật tắt menu</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="menu_add" class="hummingbird-end-node"
                    data-id="menu_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'menu_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="menu_edit" class="hummingbird-end-node"
                    data-id="menu_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'menu_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="menu_del" class="hummingbird-end-node"
                    data-id="menu_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'menu_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
