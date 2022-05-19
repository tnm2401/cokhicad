<li >
    <i></i>
    <label>
        <input name=permission[] value="mailletter_all"  data-id="mailletter_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'mailletter_all') }}/>
        <span class="label label-warning">Thư điện tử</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="mailletter_edit" class="hummingbird-end-node"
                    data-id="mailletter_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'mailletter_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="mailletter_del" class="hummingbird-end-node"
                    data-id="mailletter_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'mailletter_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
