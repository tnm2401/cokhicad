<li >
    <i></i>
    <label>
        <input name=permission[] value="language_all"  data-id="language_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'language_all') }}/>
        <span class="label label-warning">Ngôn ngữ</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="language_add" class="hummingbird-end-node"
                    data-id="language_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'language_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="language_edit" class="hummingbird-end-node"
                    data-id="language_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'language_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="language_del" class="hummingbird-end-node"
                    data-id="language_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'language_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
