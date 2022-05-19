<li >
    <i></i>
    <label>
        <input name=permission[] value="procattwo_all"  data-id="procattwo_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'procattwo_all') }}/>
        <span class="label label-warning">Danh mục sản phẩm cấp 2</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="procattwo_add" class="hummingbird-end-node"
                    data-id="procattwo_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'procattwo_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="procattwo_edit" class="hummingbird-end-node"
                    data-id="procattwo_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'procattwo_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="procattwo_del" class="hummingbird-end-node"
                    data-id="procattwo_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'procattwo_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
