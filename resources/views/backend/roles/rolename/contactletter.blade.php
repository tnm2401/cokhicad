<li >
    <i></i>
    <label>
        <input name=permission[] value="contactletter_all"  data-id="contactletter_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'contactletter_all') }}/>
        <span class="label label-warning">Thư liên hệ</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="contactletter_add" class="hummingbird-end-node"
                    data-id="contactletter_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'contactletter_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="contactletter_edit" class="hummingbird-end-node"
                    data-id="contactletter_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'contactletter_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="contactletter_del" class="hummingbird-end-node"
                    data-id="contactletter_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'contactletter_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
