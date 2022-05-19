<li >
    <i></i>
    <label>
        <input name=permission[] value="tag_all"  data-id="tag_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'tag_all') }}/>
        <span class="label label-warning">Gắn thẻ (Tag)</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="tag_add" class="hummingbird-end-node"
                    data-id="tag_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'tag_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="tag_edit" class="hummingbird-end-node"
                    data-id="tag_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'tag_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="tag_del" class="hummingbird-end-node"
                    data-id="tag_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'tag_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
