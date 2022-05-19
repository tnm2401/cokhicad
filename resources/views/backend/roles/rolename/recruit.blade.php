<li >
    <i></i>
    <label>
        <input name=permission[] value="recruit_all"  data-id="recruit_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'recruit_all') }}/>
        <span class="label label-warning">Tin tuyển dụng</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="recruit_add" class="hummingbird-end-node"
                    data-id="recruit_add" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'recruit_add') }}/>
                <span class="label label-primary">Thêm</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="recruit_edit" class="hummingbird-end-node"
                    data-id="recruit_edit" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'recruit_edit') }}/>
                <span class="label label-primary">Sửa</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="recruit_del" class="hummingbird-end-node"
                    data-id="recruit_del" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'recruit_del') }}/>
                <span class="label label-primary">Xóa</span>
            </label>
        </li>
    </ul>
</li>
