<li >
    <i></i>
    <label>
        <input name=permission[] value="static_page_all"  data-id="static_page_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'static_page_all') }}/>
        <span class="label label-warning">Trang tĩnh</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="static_page_add" class="hummingbird-end-node"
                    data-id="static_page_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'static_page_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="static_page_edit" class="hummingbird-end-node"
                    data-id="static_page_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'static_page_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="static_page_del" class="hummingbird-end-node"
                    data-id="static_page_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'static_page_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
