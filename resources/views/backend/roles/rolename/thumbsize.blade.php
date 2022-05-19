<li >
    <i></i>
    <label>
        <input name=permission[] value="thumbsize_all"  data-id="thumbsize_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'thumbsize_all') }}/>
        <span class="label label-warning">Thumbsize</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="thumbsize_add" class="hummingbird-end-node"
                    data-id="thumbsize_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'thumbsize_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="thumbsize_edit" class="hummingbird-end-node"
                    data-id="thumbsize_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'thumbsize_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="thumbsize_del" class="hummingbird-end-node"
                    data-id="thumbsize_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'thumbsize_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
