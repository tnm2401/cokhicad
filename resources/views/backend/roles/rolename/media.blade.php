<li >
    <i></i>
    <label>
        <input name=permission[] value="media_all"  data-id="media_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'media_all') }}/>
        <span class="label label-warning">Media</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="media_add" class="hummingbird-end-node"
                    data-id="media_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'media_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="media_edit" class="hummingbird-end-node"
                    data-id="media_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'media_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="media_del" class="hummingbird-end-node"
                    data-id="media_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'media_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
