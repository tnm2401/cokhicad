<li >
    <i></i>
    <label>
        <input name=permission[] value="modsource_all"  data-id="modsource_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'modsource_all') }}/>
        <span class="label label-warning">Sửa mã nguồn</span>
    </label>

</li>
