<li >
    <i></i>
    <label>
        <input name=permission[] value="catemedia_all"  data-id="catemedia_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'catemedia_all') }}/>
        <span class="label label-warning">Danh mục media</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="catemedia_add" class="hummingbird-end-node"
                    data-id="catemedia_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'catemedia_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="catemedia_edit" class="hummingbird-end-node"
                    data-id="catemedia_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'catemedia_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="catemedia_del" class="hummingbird-end-node"
                    data-id="catemedia_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'catemedia_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
