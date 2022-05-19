<li >
    <i></i>
    <label>
        <input name=permission[] value="newcattwo_all"  data-id="newcattwo_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'newcattwo_all') }}/>
        <span class="label label-warning">Danh mục bài viết cấp 2</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="newcattwo_add" class="hummingbird-end-node"
                    data-id="newcattwo_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'newcattwo_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="newcattwo_edit" class="hummingbird-end-node"
                    data-id="newcattwo_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'newcattwo_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="newcattwo_del" class="hummingbird-end-node"
                    data-id="newcattwo_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'newcattwo_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
